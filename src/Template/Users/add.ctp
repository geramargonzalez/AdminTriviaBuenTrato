<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $preguntum
 */
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Usuarios'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Agregar') ?></li>
</ol>
<section class="content-header">
    <p><?= $this->Html->link(__('Atras'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="box box-pwc">
         <?= $this->Form->create($user,['type' => 'file']) ?>
        <div class="box-header with-border">
            <h3><?= __('Agregar') ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <?= $this->Html->image('background.jpg', ['id' => 'show-file', 'class' => 'img-responsive']); ?>
                        <?= $this->Form->file('image', ['id' => 'select-file']); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Nombre'); ?></strong></label>
                        <?= $this->Form->control('name', ['label' => false, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => __('Nombre de usuario')]); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Username'); ?></strong></label>
                        <?= $this->Form->control('username', ['label' => false, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => __('Elija un nickname')]); ?>
                    </div>
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Email'); ?></strong></label>
                        <?= $this->Form->control('email', ['label' => false, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => __('Elija un email')]); ?>
                    </div>
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Password'); ?></strong></label>
                        <?= $this->Form->control('password', ['label' => false, 'type' => 'password', 'class' => 'form-control', 'placeholder' => __('Elija un password')]); ?>
                    </div>
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Role'); ?></strong></label>
                        <?= $this->Form->control('role_id', ['label' => false, 'class' => 'form-control select2', 'options' => $roles] ); ?>
                    </div>   
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-offset-9 col-md-3 col-xs-12">
                    <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>