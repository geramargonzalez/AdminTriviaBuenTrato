<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nivel $nivel
 */
?>
<div class="nivel form large-9 medium-8 columns content">
    <?= $this->Form->create($nivel) ?>
    <fieldset>
        <legend><?= __('Add Nivel') ?></legend>
        <?php
            echo $this->Form->control('Descripcion');
            echo $this->Form->control('cantPregNivel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
