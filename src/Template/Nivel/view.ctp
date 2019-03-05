<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nivel $nivel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nivel'), ['action' => 'edit', $nivel->IdNivel]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nivel'), ['action' => 'delete', $nivel->IdNivel], ['confirm' => __('Are you sure you want to delete # {0}?', $nivel->IdNivel)]) ?> </li>
        <li><?= $this->Html->link(__('List Nivel'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nivel'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nivel view large-9 medium-8 columns content">
    <h3><?= h($nivel->IdNivel) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($nivel->Descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdNivel') ?></th>
            <td><?= $this->Number->format($nivel->IdNivel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CantPregNivel') ?></th>
            <td><?= $this->Number->format($nivel->cantPregNivel) ?></td>
        </tr>
    </table>
</div>
