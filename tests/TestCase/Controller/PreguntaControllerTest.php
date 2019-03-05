<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PreguntaController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\Auth\DefaultPasswordHasher;
use App\Enums\RolesEnum;

/**
 * App\Controller\PreguntaController Test Case
 */
class PreguntaControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pregunta',
        'app.Nivel',
        'app.users'
    ];
    
    public function testAddAuthenticated()
        {
            $this->session([
                'Auth' => [
                    'User' => [
                        'id' => 1,
                        'name' => 'gerado',
                        'username' => 'geranajestic',
                        'email' => 'pepe@gmail.com',
                        'password' => (new DefaultPasswordHasher)->hash('1234'),
                        'role_id' => RolesEnum::ADMINISTRATOR,
                        'image' => 'Lorem ipsum dolor sit amet'
                   ],
                ]
            ]);

        $this->get(['controller' => 'Users', 'action' => 'login']);
        $this->assertResponseCode(302);
        $this->assertRedirect('/pregunta');

    }
      
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
       //$this->get('/pregunta');
      //$this->assertResponseSuccess();
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
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
