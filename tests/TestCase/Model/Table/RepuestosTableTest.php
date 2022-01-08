<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepuestosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepuestosTable Test Case
 */
class RepuestosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepuestosTable
     */
    protected $Repuestos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Repuestos') ? [] : ['className' => RepuestosTable::class];
        $this->Repuestos = $this->getTableLocator()->get('Repuestos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Repuestos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RepuestosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
