<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Juego $juego
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Juego'), ['action' => 'edit', $juego->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Juego'), ['action' => 'delete', $juego->id], ['confirm' => __('Are you sure you want to delete # {0}?', $juego->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Juego'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Juego'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="juego view large-9 medium-8 columns content">
    <h3><?= h($juego->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($juego->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($juego->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($juego->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($juego->created) ?></td>
        </tr>
    </table>
</div>
