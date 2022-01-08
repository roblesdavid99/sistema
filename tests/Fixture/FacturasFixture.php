<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FacturasFixture
 */
class FacturasFixture extends TestFixture
{
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
                'detalle' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 'Lorem ipsum dolor sit amet',
                'precioUnidad' => 'Lorem ipsum dolor sit amet',
                'precioTotal' => 'Lorem ipsum dolor sit amet',
                'subtotal' => 'Lorem ipsum dolor sit amet',
                'iva' => 'Lorem ipsum dolor sit amet',
                'total' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-10-29 15:35:47',
                'modified' => '2021-10-29 15:35:47',
            ],
        ];
        parent::init();
    }
}
