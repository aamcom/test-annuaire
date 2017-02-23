<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NiveauEtudesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NiveauEtudesTable Test Case
 */
class NiveauEtudesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NiveauEtudesTable
     */
    public $NiveauEtudes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.niveau_etudes',
        'app.personnes',
        'app.parcours',
        'app.societes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NiveauEtudes') ? [] : ['className' => 'App\Model\Table\NiveauEtudesTable'];
        $this->NiveauEtudes = TableRegistry::get('NiveauEtudes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NiveauEtudes);

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
