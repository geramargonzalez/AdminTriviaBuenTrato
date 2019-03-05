<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum[]|\Cake\Collection\CollectionInterface $pregunta
 */
// Search for ask - by categories / by respuestas
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Pregunta'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Index') ?></li>
</ol>
<section class="content-header">
    <h1><?= __('Pregunta') ?><?= $this->Html->link('<span style="margin: 10px;"><i class="fa fa-plus-circle"></i></span>', ['action' => 'add'], ['escape' => false]) ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="<?php echo $this->Url->build(); ?>" method="POST">
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <div class="no-padding col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <?= $this->Form->control('search_nivel', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'placeholder' => __('Por nivel')]); ?>
                                    </div>
                                </div>
                                <div class="no-padding col-md-1 col-xs-12">
                                    <div class="form-group">
                                        <?= $this->Form->button(__('Filtrar'), ['type' => 'submit', 'class' => 'btn btn-success filter']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <div class="no-padding col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <?= $this->Form->control('search_user', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'placeholder' => __('Por usuario')]); ?>
                                    </div>
                                </div>
                                <div class="no-padding col-md-1 col-xs-12">
                                    <div class="form-group">
                                        <?= $this->Form->button(__('Filtrar'), ['type' => 'submit', 'class' => 'btn btn-warning filter']); ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Imagen') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Acciones') ?></th>
                            </tr>
                         </thead>
                        <tbody>
                        <?php foreach ($preguntas as $pregunta): ?>
                              <?php if ($pregunta->status != false){ ?>
                                <tr>
                                    <td><?= $this->Html->image($pregunta->image, ['height' => 40]) ?></td>
                                    <td><?= h($pregunta->txtPregunta) ?></td>
                                    <td class="actions" style="white-space:nowrap">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $pregunta->idPregunta], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pregunta->idPregunta], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pregunta->idPregunta], ['confirm' => __('Confirm to delete this Pregunta'), 'class' => 'btn btn-danger btn-xs']) ?>
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