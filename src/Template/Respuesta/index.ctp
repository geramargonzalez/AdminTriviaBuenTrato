<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Respuestum[]|\Cake\Collection\CollectionInterface $respuesta
 */
?>
<div class="respuesta index large-9 medium-8 columns content">
    <h3><?= __('Respuesta') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idRespuesta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('txtRespuesta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correcta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IdPregunta') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respuesta as $respuesta): ?>
            <tr>
                <td><?= $this->Number->format($respuesta->idRespuesta) ?></td>
                <td><?= h($respuesta->txtRespuesta) ?></td>
                <td><?= $respuesta->correcta ? __('Yes') : ""; ?></td>
                <td><?= $this->Number->format($respuesta->IdPregunta) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respuesta->idRespuesta]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respuesta->idRespuesta]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respuesta->idRespuesta], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->idRespuesta)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
