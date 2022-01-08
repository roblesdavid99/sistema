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
            <?php if($current_user['rol'] == 'administrador' || $current_user['rol'] == 'tecnico'): ?>
                <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php else: ?>
                <?= $this->Html->link('Regresar',['controller' => 'Productos', 'action' => 'misproductos', $current_user['id']]); ?>
            <?php endif; ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productos form content">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend><?= __('Nuevo Producto') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('modelo');
                    echo $this->Form->control('marca');
                    echo $this->Form->control('num_serie');
                    echo $this->Form->control('falla');
                    // echo $this->Form->control('user_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Ingresar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
