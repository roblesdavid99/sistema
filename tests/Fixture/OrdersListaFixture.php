<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersListaFixture
 */
class OrdersListaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'orders_lista';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'order_id' => 1,
                'repuesto_id' => 1,
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
