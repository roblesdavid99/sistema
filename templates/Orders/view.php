<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <!-- <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?> -->
            <!-- <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?> -->
            <?php if($current_user['rol'] == 'administrador' || $current_user['rol'] == 'tecnico' ): ?>                
                <?= $this->Html->link(__('Lista de Ordenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php else: ?>
                <?= $this->Html->link(__('Mis Productos'), ['controller' => 'Productos', 'action' => 'misproductos', $current_user['id']], ['class' => 'side-nav-item']) ?>
            <!-- <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?> -->
            <?php endif; ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($order->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($order->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($order->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto reparado Id') ?></th>
                    <td><?= h($order->producto_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($order->created) ?></td>
                </tr>                
            </table>
            <div class="related">
                <h4><?= __('Detalles de la orden') ?></h4>
                <?php if (!empty($order->orders_lista)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <!-- <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th> -->
                            <th><?= __('Repuesto Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio') ?></th>                        
                        </tr>
                        <?php 
                        $total = 7;
                        foreach ($order->orders_lista as $ordersLista) : 
                            $total += $ordersLista['precio'] * $ordersLista['cantidad'];
                        ?>
                        <tr>
                            <!-- <td><?= h($ordersLista->id) ?></td>
                            <td><?= h($ordersLista->order_id) ?></td> -->
                            <td><?= h($ordersLista->repuesto_id) ?></td>
                            <td><?= h($ordersLista->nombre) ?></td>
                            <td><?= h($ordersLista->cantidad) ?></td>
                            <td><?= h($ordersLista->precio) ?></td>                            
                        </tr>
                        <?php endforeach; ?>
                        <tr>                            
                            <td></td>
                            <td>Mano de obra</td>
                            <td></td>
                            <td>7.00</td>                     
                        </tr>
                        <tr>                            
                            <td><label>Total <span><?= $total ?> $</span></label> </td>                    
                        </tr>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
