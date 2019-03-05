<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Exception\MissingPreguntaException;
/**
 * Pregunta Controller
 *
 * @property \App\Model\Table\PreguntaTable $Pregunta
 *
 * @method \App\Model\Entity\Preguntum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreguntaController extends AppController
{  
    public function initialize() {
        parent::initialize();
        $this->loadComponent('FileUpload');
        $this->LoadModel('Respuesta');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $qry = $this->Pregunta->find('all')->order(['idPregunta' => 'ASC',]);
        
        if($this->request->is('post')){
            if (!empty($this->request->data['search_nivel'])){
               $search = $this->request->data['search'];
                $qry = $this->applyFilters($preguntas, $search);
            }
            if (!empty($this->request->data['search_user'])){
               $search = $this->request->data['search'];
                $qry = $this->applyFiltersUsers($preguntas, $search);
            }
        }
        $preguntas = $this->paginate($qry, ['limit' => 15]);
        $this->set(compact('preguntas'));
    }
    
    private function applyFilters($qry, $search) {   
        return $qry->where(['Pregunta.IdNivel =' => $search]);
    }
    private function applyFiltersUsers($qry, $search) {   
        return $qry->where(['Pregunta.user_id =' => $search]);
    }
    /**
     * View method
     *
     * @param string|null $id Preguntum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pregunta = $this->Pregunta->get($id, [
            'contain' => ['Nivel']
        ]);
        $query = $this->Pregunta->Users->findById($pregunta->user_id);
        $userCreated = $query->first();
        $this->set(compact('pregunta','userCreated'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pregunta = $this->Pregunta->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $pregunta = $this->Pregunta->patchEntity($pregunta,$data);
            $user = $this->request->getSession()->read('Auth');
            $pregunta->user_id =  $user['User']['id'];
            $pregunta->status = true;
            if(!empty($data['image']['name'])){
                $result = $this->FileUpload->fileUpload($data['image'], 'preguntas');
                $pregunta->image = PREGUNTA_IMG_PATH . DS . $result['file_name'];
            } else {
                $tmp_img = PREGUNTA_IMG_PATH . DS . "default.jpeg";
                if($pregunta->image == null){
                    $pregunta->image = $tmp_img;
                }  
            }
            if ($this->Pregunta->save($pregunta)) {

                $this->Pregunta->getEventManager()->on('Model.Pregunta.save', function ($event) {
                        Log::write(
                            'info',
                            'A new pregunta was placed with id: ' . $event->getSubject()->id
                        );
                    });
                $this->Flash->success(__('The pregunta has been saved.'));
                return $this->redirect(['controller' =>'Respuesta','action' => 'add']);
            } 
            $this->Flash->error(__('The pregunta could not be saved. Please, try again.'));
            }
            $nivel = $this->Pregunta->Nivel->find('list',[
                    'keyField' => 'IdNivel',
                    'valueField' => 'Descripcion',
            ]);
            $this->set(compact('pregunta', 'nivel'));
    }
    /**
     * Edit method
     *
     * @param string|null $id pregunta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pregunta = $this->Pregunta->get($id, [
            'contain' => []
        ]);
        $respuesta = TableRegistry::get('Respuesta');
        if ($this->request->is(['patch', 'post', 'put'])) {
           
            $data = $this->request->getData();
            $pregunta = $this->Pregunta->patchEntity($pregunta,$data);
            $resp_count = $respuesta->find();
                          $resp_count->select(['count' => $resp_count->func()->count('*')])
                                    ->where(['Respuesta.idPregunta =' => $pregunta->idPregunta]);
            $pregunta->cantRespuestas = $resp_count;
            $user = $this->request->getSession()->read('Auth');
            if(!$pregunta->has('user_id')){
                $pregunta->user_id = $user['User']['id'];
            }
            if(!empty($data['image']['name'])){
                $result = $this->FileUpload->fileUpload($data['image'], 'preguntas');
                $user->image = PREGUNTA_IMG_PATH . DS . $result['file_name'];
            } else {
                $tmp_img = PREGUNTA_IMG_PATH . DS . "default.jpeg";
                if($pregunta->image == null){
                    $pregunta->image = $tmp_img;
                }  
            }
            if ($this->Pregunta->save($pregunta)) {
                $this->Flash->success(__('The pregunta has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pregunta could not be saved. Please, try again.'));
        }
        $nivel = $this->Pregunta->Nivel->find('list',[
                'keyField' => 'IdNivel',
                'valueField' => 'Descripcion',
        ]);
        $users = $this->Pregunta->Users->find('list', ['limit' => 200]);
        $respuestas = $respuesta->find('all')
                                ->where(['Respuesta.idPregunta =' => $pregunta->idPregunta]);
        $this->set(compact('pregunta', 'nivel','respuestas','users'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Preguntum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pregunta = $this->Pregunta->get($id);                 
        $pregunta->status = false;
        if ($this->Pregunta->save($pregunta)) {
            $this->Flash->success(__('The pregunta has been deleted.'));
        } else {
            $this->Flash->error(__('The pregunta could not be deleted. Please, try again.'));
        }
         return $this->redirect(['action' => 'index']);
    }

    public function game(){

    }



}
