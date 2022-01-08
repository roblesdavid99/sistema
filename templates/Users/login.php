<div class="users form">
    <?= $this->Flash->render('Auth') ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __( singular: 'Ingresar correo electrónico y contraseña') ?></legend>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__( singular: 'Iniciar Sesión')); ?>
    <?= $this->Form->end() ?>

    <!-- <?= $this->Html->link("Registrarse", ['action' => 'add']) ?> -->
</div>