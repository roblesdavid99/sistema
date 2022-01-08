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
            <?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $repuesto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $repuesto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Repuestos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repuestos form content">
            <?= $this->Form->create($repuesto) ?>
            <fieldset>
                <legend><?= __('Editar Repuesto') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('precio');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
