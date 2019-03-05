<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RespuestaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RespuestaTable Test Case
 */
class RespuestaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RespuestaTable
     */
    public $Respuesta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Respuesta'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Respuesta') ? [] : ['className' => RespuestaTable::class];
        $this->Respuesta = TableRegistry::getTableLocator()->get('Respuesta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Respuesta);

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
