<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto $repuesto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Regresar'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>  
            
            <?= $this->Form->create(null, ['url' => ['controller' => 'Repuestos', 'action' => 'agregarfactura']], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->input('repuesto_id', ['type' => 'hidden', 'value' => $repuesto->id]) ?>
            <?= $this->Form->select('cantidad', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10]) ?>

            <?= $this->Form->button(__('Agregar Orden')) ?>
            <?= $this->Form->end() ?>

            <!-- <?= $this->Html->link(__('Agregar a carrito'), ['action' => 'agregarfactura'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repuestos view content">
            <h3><?= h($repuesto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($repuesto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($repuesto->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= h($repuesto->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= h($repuesto->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($repuesto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creado') ?></th>
                    <td><?= h($repuesto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Editado') ?></th>
                    <td><?= h($repuesto->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
