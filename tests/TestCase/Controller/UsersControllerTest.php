<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
        'app.Roles'
    ];

    /*public function testAddAuthenticated()
        {
            // Set session data
            $this->session([
                'Auth' => [
                    'User' => [
                        'id' => 1,
                        'name' => 'gerado',
                        'username' => 'geranajestic',
                        'email' => 'pepe@gmail.com',
                        'password' => '1234',
                        'role_id' => 1,
                        'image' => 'Lorem ipsum dolor sit amet'
                    ],
                ]
            ]);

        }*/

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
      $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $Users = TableRegistry::get('Users');
        $record = $Users->find()->first();
        $id = $record->id;
        $role = $record->role_id;
        $session = ['Auth' => ['User' => ['id' => $id, 'role_id' => $role]]];
        $this->session($session);
        $this->get(['controller' => 'Users', 'action' => 'edit']);
        $this->assertResponseCode(200);
        $this->assertNoRedirect();
    }



    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $Users = TableRegistry::get('Users');
        $record = $Users->find()->first();
        $id = $record->id;
        $session = ['Auth' => ['Users' => ['id' => $id, 'role_id' => 1]]];
        $this->session($session);
        $this->post(['controller' => 'Account', 'action' => 'delete']);
        $this->assertResponseCode(302);
        $this->assertRedirect();
        $record = $Users->find()->where(['id' => $id])->first();
        $this->assertEmpty($record);
    }
}
