<?php

/**
 * @var \App\View\AppView $this
 */

$this->layout = 'CakeLte.login';
?>

<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg"><?= __('Register a new membership') ?></p>

        <?= $this->Form->create() ?>
        <?= $this->Form->control('nik', [
            'placeholder' => __('nik'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>
        <?= $this->Form->control('nama', [
            'placeholder' => __('nama'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>
        <?= $this->Form->control('username', [
            'placeholder' => __('Username'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>
        <?= $this->Form->control('password', [
            'placeholder' => __('Password'),
            'label' => false,
            'append' => '<i class="fas fa-lock"></i>',
        ]) ?>
        <?= $this->Form->control('telp', [
            'placeholder' => __('telp'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>
        <?= $this->Form->control('level', [
            'type' => 'hidden',
            'value' => 'masyarakat',
        ]) ?>


        <div class="row">
            <div class="col-8">
                <?= $this->Form->control('agree_terms', [
                    'label' => 'I agree to the <a href="#">terms</a>',
                    'type' => 'checkbox',
                    'custom' => true,
                    'escape' => false,
                ]) ?>
            </div>
            <div class="col-4">
                <?= $this->Form->control(__('Register'), [
                    'type' => 'submit',
                    'class' => 'btn btn-primary btn-block',
                ]) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>

       
        <!-- /.social-auth-links -->

        <?= $this->Html->link(__('sudah punya akun'), ['action' => 'login']) ?>
    </div>
    <!-- /.register-card-body -->
</div>