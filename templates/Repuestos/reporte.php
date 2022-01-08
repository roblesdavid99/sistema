<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto[]|\Cake\Collection\CollectionInterface $repuestos
 */
?>
<div class="repuestos index content">
    <?= $this->Html->link(__('Nuevo Repuesto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Repuestos') ?></h3>    
    <h3><?= __('Buscar por fechas y cantidad') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->date('key2', ['label' => 'Fecha inicio', 'value' => $this->request->getQuery('key2'), 'autocomplete' => 'off'])?>
    <?= $this->Form->date('key3', ['label' => 'Fecha fin', 'value' => $this->request->getQuery('key3'), 'autocomplete' => 'off'])?>
    <?= $this->Form->control('key4', ['label' => 'Cantidad', 'value' => $this->request->getQuery('key4'), 'autocomplete' => 'off'])?>
    <?= $this->Form->submit('Filtrar por fecha y cantidad mayor') ?>
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <!-- <th><?= $this->Paginator->sort('modified') ?></th> -->
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($repuestos as $repuesto): ?>
                <tr>
                    <td><?= $this->Number->format($repuesto->id) ?></td>
                    <td><?= h($repuesto->nombre) ?></td>
                    <td><?= h($repuesto->descripcion) ?></td>
                    <td><?= h($repuesto->cantidad) ?></td>
                    <td><?= h($repuesto->precio) ?></td>
                    <td><?= h($repuesto->created) ?></td>
                    <!-- <td><?= h($repuesto->modified) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $repuesto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $repuesto->id]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $repuesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repuesto->id)]) ?>
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
