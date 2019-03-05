<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum[]|\Cake\Collection\CollectionInterface $pregunta
 */

// Search for ask - by categories / by respuestas
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Configuracion general'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Index') ?></li>
</ol>
<section class="content-header">
    <h1><?= __('Configuracion general de la trivia') ?><?= $this->Html->link('<span style="margin: 10px;"><i class="fa fa-plus-circle"></i></span>', ['action' => 'add'], ['escape' => false]) ?></h1>
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
                                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Puntos por pregunta') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fallos permitidos') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Puntos totales de la partida') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tiempo por pregunta') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Cantidad de preguntas totales') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Estado de la configuracion') ?></th>
                                <th scope="col" class="actions"><?= __('Actiones') ?></th>
                            </tr>
                         </thead>
                        <tbody>
                         <?php foreach ($generales as $generale): ?>
                              <?php if ($generale->status != false){ ?>
                            <tr>
                                <td><?= $this->Number->format($generale->id) ?></td>
                                <td><?= h($generale->puntosPorPregunta) ?></td>
                                <td><?= h($generale->fallo) ?></td>
                                <td><?= h($generale->puntosTotales) ?></td>
                                <td><?= h($generale->time) ?></td>
                                <td><?= h($generale->cantPreguntas) ?></td>
                                <td><?= $generale->status ? __('Activo') : ""; ?></td>
                                <td class="actions" style="white-space:nowrap">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $generale->id], ['class' => 'btn btn-info btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $generale->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $generale->id], ['confirm' => __('Confirm to delete this Generale'), 'class' => 'btn btn-danger btn-xs']) ?>
                                </td>
                            </tr>
                              <?php } ?>
                        <?php endforeach; ?>
                        </tbody>
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




