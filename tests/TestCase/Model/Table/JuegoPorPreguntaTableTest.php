<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JuegoPorPreguntaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JuegoPorPreguntaTable Test Case
 */
class JuegoPorPreguntaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JuegoPorPreguntaTable
     */
    public $JuegoPorPregunta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.JuegoPorPregunta'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('JuegoPorPregunta') ? [] : ['className' => JuegoPorPreguntaTable::class];
        $this->JuegoPorPregunta = TableRegistry::getTableLocator()->get('JuegoPorPregunta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JuegoPorPregunta);

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
        $this->markTestIncomplete('Not implemented yet.');
    }
}
