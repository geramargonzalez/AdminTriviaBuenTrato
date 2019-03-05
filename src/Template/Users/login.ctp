<?= $this->layout('empty'); ?>
<?= $this->Form->create() ?>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="form-group has-feedback">
            <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control', 'placeholder' => __('username')]) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12">
        <div class="form-group has-feedback">
            <?= $this->Form->control('password', ['label' => false, 'class' => 'form-control', 'placeholder' => __('password')]) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-warning btn-block btn-flat']) ?>
    </div>
</div>
<?= $this->Form->end() ?>
<hr>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <?= $this->Html->link(__('Forgot your password?'), ['controller' => 'Users', 'action' => 'forgotMyPassword']) ?>
    </div>
</div>


