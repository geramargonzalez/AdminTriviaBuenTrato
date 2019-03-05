<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum[]|\Cake\Collection\CollectionInterface $pregunta
 */
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Juegos'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Index') ?></li>
</ol>
<section class="content-header">
    <h1><?= __('Historial de juegos') ?><?= $this->Html->link('<span style="margin: 10px;"><i class="fa fa-plus-circle"></i></span>', ['action' => 'add'], ['escape' => false]) ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                           <tr>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody> 
                        <body>
                            <?php foreach ($juego as $juego): ?>
                            <tr>
                                <td><?= h($juego->name) ?></td>
                                <td><?= h($juego->description) ?></td>
                                <td><?= h($juego->created) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $juego->id],['class' => 'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $juego->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $juego->id], ['confirm' => __('Are you sure you want to delete # {0}?', $juego->id),'class' => 'btn btn-danger btn-xs']) ?>
                                </td>
                            </tr>
                              <?php endforeach ?>
                       
                    </table>
                </div>
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
            </div>
        </div>
    </div>
</section>





