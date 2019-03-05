<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nivel Controller
 *
 * @property \App\Model\Table\NivelTable $Nivel
 *
 * @method \App\Model\Entity\Nivel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NivelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $nivel = $this->paginate($this->Nivel);
        $this->set(compact('nivel'));
    }
    /**
     * View method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nivel = $this->Nivel->get($id, [
            'contain' => []
        ]);
        $this->set('nivel', $nivel);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nivel = $this->Nivel->newEntity();
        if ($this->request->is('post')) {
            $nivel = $this->Nivel->patchEntity($nivel, $this->request->getData());
            if ($this->Nivel->save($nivel)) {
                $this->Flash->success(__('The nivel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nivel could not be saved. Please, try again.'));
        }
        $this->set(compact('nivel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nivel = $this->Nivel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nivel = $this->Nivel->patchEntity($nivel, $this->request->getData());
            if ($this->Nivel->save($nivel)) {
                $this->Flash->success(__('The nivel has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nivel could not be saved. Please, try again.'));
        }
        $this->set(compact('nivel'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Nivel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nivel = $this->Nivel->get($id);
        if ($this->Nivel->delete($nivel)) {
            $this->Flash->success(__('The nivel has been deleted.'));
        } else {
            $this->Flash->error(__('The nivel could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
