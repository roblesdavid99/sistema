<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <!-- <?= $this->Html->link(__('Editar'), ['action' => 'edit', $producto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id), 'class' => 'side-nav-item']) ?> -->
            <?php if($current_user['rol'] == 'administrador' || $current_user['rol'] == 'tecnico'): ?>
                <?= $this->Html->link(__('Lista de Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $producto->id], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
            <?php if($current_user['rol'] == 'cliente'): ?>
                <?= $this->Html->link(__('Nuevo Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productos view content">
            <h3><?= h($producto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($producto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modelo') ?></th>
                    <td><?= h($producto->modelo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= h($producto->marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Número de Serie') ?></th>
                    <td><?= h($producto->num_serie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Falla') ?></th>
                    <td><?= h($producto->falla) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id del usuario') ?></th>
                    <td><?= h($producto->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id del producto') ?></th>
                    <td><?= $this->Number->format($producto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($producto->estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comentarios') ?></th>
                    <td><?= h($producto->comentarios) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ingresado') ?></th>
                    <td><?= h($producto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actualizado') ?></th>
                    <td><?= h($producto->modified) ?></td>
                </tr>                
            </table>
            <div class="related">
                <h4><?= __('Detalles de la orden') ?></h4>
                <?php if (!empty($producto->orders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Apellido') ?></th>
                            <th><?= __('Correo') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>                                                  
                        </tr>
                        <?php 
                        
                        foreach ($producto->orders as $order) :                             
                        ?>
                        <tr>
                            <td><?= h($order->id) ?></td>
                            <td><?= h($order->nombre) ?></td>
                            <td><?= h($order->apellido) ?></td>
                            <td><?= h($order->correo) ?></td> 
                            <td><?= h($order->created) ?></td>
                            <td class="actions">
                            <!-- <?= $this->Html->link(__('Ver detalle'), ['action' => 'view', $order->id]) ?> -->
                            <?= $this->Html->link(__('Ver detalle'), ['controller' => 'Orders', 'action' => 'view', $order->id]) ?>                            
                    </td>                                                      
                        </tr>
                        <?php endforeach; ?>                        
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
