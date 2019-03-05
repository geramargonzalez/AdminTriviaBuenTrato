<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respuestum $respuestum
 */
?>
<div class="respuesta view large-9 medium-8 columns content">
    <h3><?= h($respuesta->idRespuesta) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TxtRespuesta') ?></th>
            <td><?= h($respuesta->txtRespuesta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdRespuesta') ?></th>
            <td><?= $this->Number->format($respuesta->idRespuesta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPregunta') ?></th>
            <td><?= $this->Number->format($respuesta->IdPregunta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correcta') ?></th>
            <td><?= $respuesta->correcta ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
