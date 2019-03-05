<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum[]|\Cake\Collection\CollectionInterface $pregunta
 */

// Search for ask - by categories / by respuestas
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Usuario'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('Index') ?></li>
</ol>
<section class="content-header">
    <h1><?= __('Usuario') ?><?= $this->Html->link('<span style="margin: 10px;"><i class="fa fa-plus-circle"></i></span>', ['action' => 'add'], ['escape' => false]) ?></h1>
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
                                <th scope="col"><?= $this->Paginator->sort('Imagen') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Nick') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Rol') ?></th>
                                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                            </tr>
                         </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                             <?php if($user->status !=  false && $user->id != $user_session['id']){ ?>
                                <tr>
                                    <td><?= $this->Html->image($user->image, ['height' => 40]) ?></td>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                                    
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-info btn-xs']) ?>
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger btn-xs']) ?>
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


