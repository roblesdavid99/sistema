<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersListum Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $repuesto_id
 * @property int $cantidad
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Repuesto $repuesto
 */
class OrdersListum extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'order_id' => true,
        'repuesto_id' => true,
        'cantidad' => true,
        'order' => true,
        'repuesto' => true,
        'nombre' => true,
        'precio' => true,
    ];
}
