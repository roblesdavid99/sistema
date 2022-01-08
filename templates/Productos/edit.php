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
            <?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $producto->id],
                ['confirm' => __('¿Estás seguro que quieres borrar el producto # {0}?', $producto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productos form content">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend><?= __('Editar Producto') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('modelo');
                    echo $this->Form->control('marca');
                    echo $this->Form->control('num_serie');
                    echo $this->Form->control('falla');                   
                    echo $this->Form->control('estado', [
                        'options' => ['ingresado' => 'Ingresado', 'en revision' => 'En revisión', 'reparando' => 'Reparando', 'listo' => 'Listo para retirar']
                    ]);
                    echo $this->Form->control('comentarios');                
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
