<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Generale $generale
 */
?>
<div class="generales view large-9 medium-8 columns content">
    <h3><?= h($generale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PuntosPorPregunta') ?></th>
            <td><?= h($generale->puntosPorPregunta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fallo') ?></th>
            <td><?= h($generale->fallo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PuntosTotales') ?></th>
            <td><?= h($generale->puntosTotales) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($generale->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CantPreguntas') ?></th>
            <td><?= h($generale->cantPreguntas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($generale->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $generale->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
