<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneralesTable Test Case
 */
class GeneralesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneralesTable
     */
    public $Generales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Generales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Generales') ? [] : ['className' => GeneralesTable::class];
        $this->Generales = TableRegistry::getTableLocator()->get('Generales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Generales);
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
