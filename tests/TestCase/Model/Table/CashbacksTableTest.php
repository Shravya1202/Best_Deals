<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CashbacksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CashbacksTable Test Case
 */
class CashbacksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CashbacksTable
     */
    protected $Cashbacks;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Cashbacks',
        'app.Deals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cashbacks') ? [] : ['className' => CashbacksTable::class];
        $this->Cashbacks = $this->getTableLocator()->get('Cashbacks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cashbacks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CashbacksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CashbacksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
