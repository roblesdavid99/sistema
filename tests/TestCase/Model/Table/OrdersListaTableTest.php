<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersListaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersListaTable Test Case
 */
class OrdersListaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersListaTable
     */
    protected $OrdersLista;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OrdersLista',
        'app.Orders',
        'app.Repuestos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OrdersLista') ? [] : ['className' => OrdersListaTable::class];
        $this->OrdersLista = $this->getTableLocator()->get('OrdersLista', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OrdersLista);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OrdersListaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OrdersListaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
