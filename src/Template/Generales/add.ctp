<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $preguntum
 */
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('General'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('View') ?></li>
</ol>
<section class="content-header">
    <p><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="title-generales col-md-offset-3 col-md-6">
         <?= $this->Form->create($generale) ?>
        <div class="box-header">
            <h3><?= __('Ingrese una configuracion nueva de juego') ?></h3>
            <h6><?= __('Por defecto va ser la configuracion del proximo juego.') ?></h6>
        </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Cantidad de preguntas por partida'); ?></strong></label>
                        <?= $this->Form->control('cantPreguntas', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                    <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Puntos por pregunta'); ?></strong></label>
                        <?= $this->Form->control('puntosPorPregunta', ['label' => false, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => __('Title')]); ?>
                    </div>
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Cantidad de fallos por partida'); ?></strong></label>
                        <?= $this->Form->control('fallo', ['label' => false, 'class' => 'form-control']); ?>
                    </div>
                     <div class="form-group has-feedback input-group col-md-12 col-xs-12">
                        <label><strong><?= __('Tiempo por pregunta'); ?></strong></label>
                        <?= $this->Form->control('time', ['label' => false, 'class' => 'form-control']); ?>
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