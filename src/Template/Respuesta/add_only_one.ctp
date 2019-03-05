<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respuestum $respuestum
 */
?>
<div class="respuesta form large-9 medium-8 columns content">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Agregar una respuesta') ?></legend>
        <?php
            echo $this->Form->control('txtRespuesta');
            echo $this->Form->control('correcta');
            echo $this->Form->control('IdPregunta', ['options' => $preguntas ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
