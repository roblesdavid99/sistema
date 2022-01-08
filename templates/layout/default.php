<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sistema';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
</head>
<body>
    <nav class="top-nav">
        <?php if(isset($current_user)): ?>
            <?php if($current_user['rol'] == 'administrador'): ?>
        <!-- <div class="top-nav-title"> -->
                <div class="top-nav-links">
                    <a href="<?= $this->Url->build('/') ?>"><span>Ini</span>cio</a>                    
                    <!-- <a rel="noopener" href="/productos/misproductos/".$userid>Productos</a> -->                    
                    <a rel="noopener" href="/productos">Productos</a>
                    <a rel="noopener" href="/repuestos">Repuestos</a>
                    <a rel="noopener" href="/orders/checkout">Orden</a>
                    <a rel="noopener" href="/users">Usuarios</a>                    
                </div>
            <?php elseif($current_user['rol'] == 'tecnico'): ?>
                <div class="top-nav-links">
                    <a href="<?= $this->Url->build('/') ?>"><span>Ini</span>cio</a>
                    <a rel="noopener" href="/productos">Productos</a>
                    <a rel="noopener" href="/repuestos">Repuestos</a>
                    <a rel="noopener" href="/orders/checkout">Orden</a>                   
                </div>
            <?php else: ?>
                <div class="top-nav-links">
                    <a href="<?= $this->Url->build('/') ?>"><span>Ini</span>cio</a>
                    <?= $this->Html->link('Mis Productos',['controller' => 'Productos', 'action' => 'misproductos', $current_user['id']]); ?>                                       
                </div>
            <?php endif; ?>
        <div class="top-nav-links">            
            <a rel="noopener" href="/users/logout">Salir</a>            
        </div>

        <?php else: ?>
            <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span></span></a>             
        </div>            
            <div class="top-nav-links">                      
            <a rel="noopener" href="/users/add">Registrarse</a>         
        </div>
        <?php endif; ?>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
