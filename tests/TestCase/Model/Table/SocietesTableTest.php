<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocietesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocietesTable Test Case
 */
class SocietesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SocietesTable
     */
    public $Societes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.societes',
        'app.parcours'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Societes') ? [] : ['className' => 'App\Model\Table\SocietesTable'];
        $this->Societes = TableRegistry::get('Societes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Societes);

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
