<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreguntaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreguntaTable Test Case
 */
class PreguntaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PreguntaTable
     */
    public $Pregunta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pregunta',
        'app.Users'
    ];
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Pregunta = TableRegistry::getTableLocator()->get('Pregunta');
    }
    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pregunta);
        parent::tearDown();
    }
    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $data = ['idPregunta' => 30,
                'txtPregunta' => 'Quien es Miles Morales?',
                'descripcion' => 'La pregunta 30',
                'IdNivel' => 1,
                'user_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 2,
                'status' => 1
            ];
        $pregunta = $this->Pregunta->newEntity($data);
        $this->assertEmpty($pregunta->GetErrors()); 
    }

    
   // public function testNumeroExpected(){
     //   $number = 5;
        //$result = $this->Pregunta->numeroExpected($number);
       // $this->assertEquals(5, $result);
    //}
    public function testFindStatus()
    {
        $query = $this->Pregunta->find('status');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            [
                'idPregunta' => 30,
                'txtPregunta' => 'Quien es Miles Morales?',
                'descripcion' => 'La pregunta 30',
                'IdNivel' => 1,
                'user_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 2,
                'status' => 1
            ],
             [
                'idPregunta' => 31,
                'txtPregunta' => 'Quien es Clark Kent?',
                'descripcion' => 'La pregunta 31',
                'IdNivel' => 1,
                'user_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 3,
                'status' => 1
            ],
             [
                'idPregunta' => 32,
                'txtPregunta' => 'Quien es Pato lucas',
                'descripcion' => 'La pregunta 32',
                'IdNivel' => 1,
                'user_id' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'cantRespuestas' => 3,
                'status' => 1
            ],
        ];
        $this->assertEquals($expected, $result);
    }
    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $table = TableRegistry::get('Pregunta');
        $pregunta = $this->Pregunta->newEntity([
                                'idPregunta' => 34,
                                'txtPregunta' => 'Quien es Bruce Wayne',
                                'descripcion' => 'La pregunta 32',
                                'IdNivel' => 1,
                                'user_id' => 10,
                                'image' => 'Lorem ipsum dolor sit amet',
                                'cantRespuestas' => 3,
                                'status' => 1
                            ]);
        $result = $table->checkRules($pregunta);
        $this->assertFalse($result);
        }
}
