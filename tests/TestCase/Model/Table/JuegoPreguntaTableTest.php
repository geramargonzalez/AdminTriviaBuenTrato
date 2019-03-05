<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JuegoPreguntaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JuegoPreguntaTable Test Case
 */
class JuegoPreguntaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JuegoPreguntaTable
     */
    public $JuegoPregunta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.JuegoPregunta'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('JuegoPregunta') ? [] : ['className' => JuegoPreguntaTable::class];
        $this->JuegoPregunta = TableRegistry::getTableLocator()->get('JuegoPregunta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JuegoPregunta);

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
