<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $preguntum
 */
?>

<!-- <= $this->Html->script('wysihtml5', ['block' => 'script']); ?> -->
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Pregunta'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Editar') ?></li>
</ol>

<section class="content-header">
    <p><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="box box-pwc">
        <?= $this->Form->create($pregunta, ['type' => 'file']) ?>
        <div class="box-header with-border">
            <h3><?= __('Edit pregunta') ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <?= $this->Html->image($pregunta->image, ['id' => 'show-file', 'class' => 'img-responsive']); ?>
                        <?= $this->Form->file('image', ['id' => 'select-file']); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Titulo'); ?></strong></label>
                        <?= $this->Form->control('txtPregunta', ['label' => false, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => __('Title')]); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Estado'); ?></strong></label>
                        <?= $this->Form->control('status', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Nivel'); ?></strong></label>
                        <?= $this->Form->control('IdNivel', ['label' => false, 'class' => 'form-control select2', 'options' => $nivel] ); ?>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('descripcion'); ?></strong></label>
                        <?= $this->Form->control('descripcion', ['label' => false, 'type' => 'textarea', 'class' => 'form-control wysihtml5', 'placeholder' => __('descripcion'), 'rows' => 15]); ?>
                    </div>
                </div>
            </div>
        <?= $this->element('Admin/respuestasindex'); ?>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-md-offset-9 col-md-3 col-xs-12">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-warning btn-block']) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
</section>
