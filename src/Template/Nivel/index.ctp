<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nivel[]|\Cake\Collection\CollectionInterface $nivel
 */
?>
<div class="nivel index large-9 medium-8 columns content">
    <h3><?= __('Nivel') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('IdNivel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantPregNivel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nivel as $nivel): ?>
            <tr>
                <td><?= $this->Number->format($nivel->IdNivel) ?></td>
                <td><?= h($nivel->Descripcion) ?></td>
                <td><?= $this->Number->format($nivel->cantPregNivel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nivel->IdNivel]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nivel->IdNivel]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nivel->IdNivel], ['confirm' => __('Are you sure you want to delete # {0}?', $nivel->IdNivel)]) ?>
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
