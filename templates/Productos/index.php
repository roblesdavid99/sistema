<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $productos
 */
?>
<div class="productos index content">
    <!-- <?= $this->Html->link(__('Nuevo Producto'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Productos') ?></h3>

    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key'), 'autocomplete' => 'off']) ?>
    <?= $this->Form->submit('Buscar') ?>
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('modelo') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('num_serie') ?></th>
                    <th><?= $this->Paginator->sort('falla') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>                    
                    <th><?= $this->Paginator->sort('estado') ?></th>
                    <!-- <th><?= $this->Paginator->sort('created') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('modified') ?></th> -->
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $this->Number->format($producto->id) ?></td>
                    <td><?= h($producto->nombre) ?></td>
                    <td><?= h($producto->modelo) ?></td>
                    <td><?= h($producto->marca) ?></td>
                    <td><?= h($producto->num_serie) ?></td>
                    <td><?= h($producto->falla) ?></td>
                    <td><?= h($producto->user_id) ?></td>
                    <td><?= h($producto->estado) ?></td>
                    <!-- <td><?= h($producto->created) ?></td> -->
                    <!-- <td><?= h($producto->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $producto->id]) ?>
                        <?php if($current_user['rol'] == 'tecnico' || $current_user['rol'] == 'administrador' ): ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $producto->id]) ?>
                        <?php elseif($current_user['rol'] == 'administrador'): ?>
                            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?>
                        <?php endif; ?> 
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
