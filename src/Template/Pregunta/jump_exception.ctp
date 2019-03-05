<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $preguntum
 */
?>

<section class="content-header">
    <p><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="box">
        <?= $this->Form->create() ?>
        <div class="col-md-offset-4 col-md-4 box-header with-border">
            <h3><?= __('Ingese un numero') ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-xs-12">
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Ingrese un numero'); ?></strong></label>
                        <?= $this->Form->control('number', ['label' => false, 'class' => 'form-control', 'placeholder' => __('Numero menor a 5 para que salte la excepcion')]); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-xs-12">
                    <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-default btn-block']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>