<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

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
    <?php if($current_user['rol'] == 'administrador'): ?>
        <!-- <div class="top-nav-title"> -->
                <div class="top-nav-links">
                    <a href="<?= $this->Url->build('/') ?>"><span>Ini</span>cio</a>                    
                    <a rel="noopener" href="/productos">Productos</a>
                    <a rel="noopener" href="/repuestos">Repuestos</a>
                    <a rel="noopener" href="/orders/checkout">Orden</a>
                    <a rel="noopener" href="/users">Usuarios</a> 
                </div>
            <?php elseif($current_user['rol'] == 'tecnico'): ?>
                <div class="top-nav-links">
                    <a href="<?= $this->Url->build('/') ?>"><span>Ini</span>cio</a>
                    <?php $userid = $current_user['id']; ?>
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
        
    </nav>

    <header>
        <div class="container text-center">            
            <h2>Bienvenido! <?= $current_user['nombre'] . ' ' . $current_user['apellido'] ?></h2>
            <h3><?= $current_user['rol'] ?></h3>
        </div>
    </header>

    <footer>
    </footer>
</body>
</html>
