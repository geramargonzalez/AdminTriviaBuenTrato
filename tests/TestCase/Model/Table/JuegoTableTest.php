<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JuegoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JuegoTable Test Case
 */
class JuegoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JuegoTable
     */
    public $Juego;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Juego'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Juego') ? [] : ['className' => JuegoTable::class];
        $this->Juego = TableRegistry::getTableLocator()->get('Juego', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Juego);

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
