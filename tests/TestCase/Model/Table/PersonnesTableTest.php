<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonnesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonnesTable Test Case
 */
class PersonnesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonnesTable
     */
    public $Personnes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personnes',
        'app.niveau_etudes',
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
        $config = TableRegistry::exists('Personnes') ? [] : ['className' => 'App\Model\Table\PersonnesTable'];
        $this->Personnes = TableRegistry::get('Personnes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Personnes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
