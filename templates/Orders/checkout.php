<div class="facturas index content">   
    <h3><?= __('Repuestos utilizados') ?></h3>
    <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Agregar más repuestos'), ['controller' => 'Repuestos', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Ver registro de órdenes'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'side-nav-item']) ?>

        </div>
    <div class="table-responsive">
    <?= $this->Form->create($order) ?>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('producto') ?></th>
                    <th><?= $this->Paginator->sort('precio unitario') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 7;
                foreach ($listaRepuestos as $repuesto):
                    $total += $repuesto['repuesto']['precio'] * $repuesto['cantidad'];
                ?>
                <tr>                    
                    <td><?= ($repuesto['repuesto']['nombre']) ?></td>
                    <td><?= ($repuesto['repuesto']['precio']) ?></td>
                    <td><?= ($repuesto['cantidad']) ?></td>
                    <td><?= ($repuesto['repuesto']['precio'] * $repuesto['cantidad']) ?></td> 
                                                                         
                </tr>
                <?php endforeach; ?>
                <tr>              
                    <td>Mano de obra</td>
                    <td>7.00</td>       
                </tr>
                <tr>              
                    <td><label>Total <span><?= $total ?> $</span></label> </td>                    
                </tr>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('correo');
                    echo $this->Form->control('producto_id', ['options' => $productos]);   
                ?>
            </tbody>
        </table>
        <?= $this->Form->submit('Guardar Orden', ['class' => 'button float-right']) ?>
    <?= $this->Form->end() ?>
    </div>       
</div>
