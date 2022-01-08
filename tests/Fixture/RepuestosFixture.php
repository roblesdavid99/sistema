<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RepuestosFixture
 */
class RepuestosFixture extends TestFixture
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
                'nombre' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 'Lorem ipsum dolor sit amet',
                'precio' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-10-25 23:20:02',
                'modified' => '2021-10-25 23:20:02',
            ],
        ];
        parent::init();
    }
}
