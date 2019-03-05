<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Generale $generale
 */
?>
<div class="generales form large-9 medium-8 columns content">
    <?= $this->Form->create($generale) ?>
    <fieldset>
        <legend><?= __('Edit opciones generales de juego') ?></legend>
        <?php
            echo $this->Form->control('puntosPorPregunta');
            echo $this->Form->control('fallo');
            echo $this->Form->control('puntosTotales');
            echo $this->Form->control('time');
            echo $this->Form->control('cantPreguntas');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
