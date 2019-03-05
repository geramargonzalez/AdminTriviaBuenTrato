<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $preguntum
 */
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Juego'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('View') ?></li>
</ol>
<section class="content-header">
    <p><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="title-generales col-md-offset-3 col-md-6">
         <?= $this->Form->create($juego) ?>
        <div class="box-header">
            <h1><?= __('Cree un juego tematico') ?></h1>
            <h6><?= __('El sistema va elegir a este juego por defecto.') ?></h6>
        </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Nombre del juego'); ?></strong></label>
                        <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Descripcion'); ?></strong></label>
                        <?= $this->Form->control('description', ['label' => false, 'class' => 'form-control', 'placeholder' => __('Descripcion')]); ?>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12">
                <?= $this->Form->button(__('Crear'), ['class' => 'btn btn-warning btn-block']) ?>
            </div>
        </div>
        
        <?= $this->Form->end() ?>
    </div>
</div>
