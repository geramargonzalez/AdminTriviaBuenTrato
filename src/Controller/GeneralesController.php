<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Generales Controller
 *
 * @property \App\Model\Table\GeneralesTable $Generales
 *
 * @method \App\Model\Entity\Generale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneralesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $generales = $this->paginate($this->Generales);
        $this->set(compact('generales'));
    }
    /**
     * View method
     *
     * @param string|null $id Generale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $generale = $this->Generales->get($id, [
            'contain' => []
        ]);

        $this->set('generale', $generale);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $generale = $this->Generales->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $generale = $this->Generales->patchEntity($generale, $data);
            $generale->status = true;
            $generale->puntosTotales = $data['cantPreguntas'] * $data['puntosPorPregunta'];
            
            if ($this->Generales->save($generale)) {
                $this->Flash->success(__('The general has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The general could not be saved. Please, try again.'));
        }
        $this->set(compact('generale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Generale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $generale = $this->Generales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $generale = $this->Generales->patchEntity($generale, $this->request->getData());
            if ($this->Generales->save($generale)) {
                $this->Flash->success(__('The general has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The general could not be saved. Please, try again.'));
        }
        $this->set(compact('generale'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Generale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $generale = $this->Generales->get($id);
        $generale->status = false;
        if ($this->Generales->save($generale)) {
            $this->Flash->success(__('La configuracion general ha sido desactivada.'));
        } else {
            $this->Flash->error(__('No se ha podido realizar su peticion.'));
        }
        return $this->redirect(['action' => 'index']);
    }



}
