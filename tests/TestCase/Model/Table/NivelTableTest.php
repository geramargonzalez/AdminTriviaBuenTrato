<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NivelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NivelTable Test Case
 */
class NivelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NivelTable
     */
    public $Nivel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Nivel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Nivel') ? [] : ['className' => NivelTable::class];
        $this->Nivel = TableRegistry::getTableLocator()->get('Nivel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nivel);

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
