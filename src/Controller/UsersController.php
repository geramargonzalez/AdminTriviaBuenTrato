<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('FileUpload');
        $this->Auth->allow(['add']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if (empty($user)) {
            throw new NotFoundException(__('Usuario no existe'));
        }
        $this->set('user', $user);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();    
            $user = $this->Users->patchEntity($user,  $data);
            if(!empty($data['image']['name'])){
             $result = $this->FileUpload->fileUpload($data['image'], 'users');
             $user->image = USER_IMG_PATH . DS . $result['file_name'];
            } else {
                $tmp_img = USER_IMG_PATH . DS . "avatar.jpg";
                if($user->image == null){
                    $user->image = $tmp_img;
                }  
            }
            $user->status = true;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $img =  $user->image;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);
            if(!empty($data['image']['name'])){
                $result = $this->FileUpload->fileUpload($data['image'], 'users');
                $user->image = USER_IMG_PATH . DS . $result['file_name'];
            } else {
                $user->image = $img;
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user_delete = $this->Users->get($id);
        $user = $this->Auth->user();      
        if($user_delete->id != $user['id']){
              $user_delete->status = false;
            if ($this->Users->save($user_delete)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }
        } else {
             $this->Flash->error(__('El usuario loggeado no se puede borrar.'));
        }
       return $this->redirect(['action'=>'index']);
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function login()
    {
       
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action'=>'index']);
            } else {
        
              $this->Flash->error(__('Username or password is incorrect'));
            }

        }
        
    }
}
