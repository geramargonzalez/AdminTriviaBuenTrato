<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Juego Controller
 *
 * @property \App\Model\Table\JuegoTable $Juego
 *
 * @method \App\Model\Entity\Juego[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JuegoController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('JuegoPregunta');

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $juego = $this->paginate($this->Juego);
        $this->set(compact('juego'));
    }
    /**
     * View method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $juego = $this->Juego->get($id, [
            'contain' => []
        ]);

        $this->set('juego', $juego);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $juego = $this->Juego->newEntity();
    
            if ($this->request->is('post')) {
                $juego = $this->Juego->patchEntity($juego, $this->request->getData());
                
                if ($this->Juego->save($juego)) {

                    $this->Flash->success(__('The juego has been saved.'));
                    return $this->redirect(['action' => 'addQuestion',$juego->id]);
                }
                $this->Flash->error(__('The juego could not be saved. Please, try again.'));

            }
        $this->set(compact('juego'));
    }  

    public function addQuestion($id){

        $table_pregunta = TableRegistry::get('Pregunta');
        $table_generales = TableRegistry::get('Generales');
        $preguntas = $table_pregunta->find('all')
                                    ->where(['Pregunta.status =' => true]);
        $total = $preguntas->count();
        $query = $table_generales->find('all');
                 $query->where(['status' => true]);
        $query->select(['id' => $query->func()->max('id')]);
        $ultimo = $query->first();
        $query = $table_generales->findById($ultimo->id);
        $general = $query->first();
        $cantpre = $general->cantPreguntas;
        if ($this->request->is('post')) {
           $data = $this->request->getData();
           while ($pregunta = current($data)) {
                $preguntaJuego = $this->JuegoPregunta->newEntity();
                if ($pregunta == 1) {
                    $array =array(
                                'idJuego' => $id,
                                'idPregunta' => key($data));
                    $juegoPreg = $this->JuegoPregunta->patchEntity($preguntaJuego,$array);
                    if ($this->JuegoPregunta->save($juegoPreg)) {
                        $cantpre = $cantpre - 1;
                        if($cantpre == 0){
                            return $this->redirect(['action' => 'index']);
                        }
                    }
                }
                next($data);
            }
        }
        $preguntas = $this->paginate($preguntas, ['limit' => $total]);
        $this->set(compact('juego','preguntas','cantpre'));
    }     


    /**
     * Edit method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $juego = $this->Juego->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $juego = $this->Juego->patchEntity($juego, $this->request->getData());
            if ($this->Juego->save($juego)) {
                $this->Flash->success(__('The juego has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The juego could not be saved. Please, try again.'));
        }
        $this->set(compact('juego'));
    } 
    /**
     * Delete method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $juego = $this->Juego->get($id);
        if ($this->Juego->delete($juego)) {
            $this->Flash->success(__('The juego has been deleted.'));
        } else {
            $this->Flash->error(__('The juego could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
