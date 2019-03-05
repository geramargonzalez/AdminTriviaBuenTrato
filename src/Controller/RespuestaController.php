<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Respuesta Controller
 *
 * @property \App\Model\Table\RespuestaTable $Respuesta
 *
 * @method \App\Model\Entity\Respuestum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RespuestaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $respuesta = $this->paginate($this->Respuesta);
        $this->set(compact('respuesta'));
    }
    /**
     * View method
     *
     * @param string|null $id respuesta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respuesta = $this->Respuesta->get($id, [
            'contain' => [],
             'order' => ['idRespuesta' => 'ASC']
        ]);
        $this->set('respuesta', $respuesta);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    { 
        $cantResp = $this->getRequest()->getSession()->read('cantResp');
        $respuesta = $this->Respuesta->newEntity();
        $query = $this->Respuesta->Pregunta->find('all', [
                    'order' => ['Pregunta.idPregunta' => 'DESC']
        ]);
        $pregunta = $query->first();
        if($cantResp < 1 ){ 
            $cantResp = $pregunta['cantRespuestas'];
        }
        if ($this->request->is('post')) {
            $respuesta = $this->Respuesta->patchEntity($respuesta, $this->request->getData());           
            if ($this->Respuesta->save($respuesta)) {
                $this->Flash->success(__('The respuesta has been saved.'));
                $cantResp = $cantResp - 1;
                $this->getRequest()->Session()->write('cantResp',$cantResp);   
                if( $cantResp > 0){
                    return $this->redirect(['action' => 'add']);
                } else { 
                    $cantResp = 0;
                    $this->getRequest()->Session()->write('cantResp',$cantResp);
                    $query = $this->Respuesta->find('all', [
                            'conditions' => ['Respuesta.idPregunta =' => $pregunta->idPregunta, 'Respuesta.correcta =' => 1]
                            ]);
                    $number = $query->count();
                    if($number < 1){
                         $this->Flash->error(__('The answers should be one correct. Edit the correct answer.'));
                    }
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('respuesta','pregunta','cantResp'));
    }   


    public function addOnlyOne()
    { 
        $respuesta = $this->Respuesta->newEntity();
        $query = $this->Respuesta->Pregunta->find('list',[
            'keyField' => 'idPregunta',
            'valueField' => 'txtPregunta',
        ]);
        $preguntas = $query->toArray();
        if ($this->request->is('post')) {
            $respuesta = $this->Respuesta->patchEntity($respuesta, $this->request->getData());           
            if ($this->Respuesta->save($respuesta)) {
                $query = $this->Respuesta->Pregunta->find('all', [
                'order' => ['Pregunta.idPregunta' => 'DESC']
                ]);
                $pregunta = $query->first();
                $pregunta->cantRespuestas++;
                if($this->Respuesta->Pregunta->save($pregunta)){  
                    
                    $this->Flash->success(__('The respuesta has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }    
            }
             $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('respuesta','preguntas'));
    }  


    /**
     * Edit method
     *
     * @param string|null $id respuesta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respuesta = $this->Respuesta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respuesta = $this->Respuesta->patchEntity($respuesta, $this->request->getData());
            if ($this->Respuesta->save($respuesta)) {
                $this->Flash->success(__('The respuesta has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('respuesta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id respuesta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respuesta = $this->Respuesta->get($id);
        $query = $this->Respuesta->Pregunta->find('all', [
        'order' => ['Pregunta.idPregunta' => 'DESC']
        ]);
        $pregunta = $query->first();
        $pregunta->cantRespuestas--;
        if($this->Respuesta->Pregunta->save($pregunta)){
          if ($this->Respuesta->delete($respuesta)) {
            $this->Flash->success(__('The respuesta has been deleted.'));
            } else {
                $this->Flash->error(__('The respuesta could not be deleted. Please, try again.'));
            } 
        }
        return $this->redirect(['action' => 'index']);
    }
}
