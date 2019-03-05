<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respuestum $respuestum
 */
?>
<div class="respuesta form large-9 medium-8 columns content">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Add Respuesta numero: ' . $cantResp) ?></legend>
        <?php
            echo $this->Form->control('txtRespuesta');
            echo $this->Form->control('correcta');
            echo $this->Form->control('IdPregunta', ['value' => $pregunta['idPregunta'] ,'label' => false, 'class' => 'form-control'] );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
