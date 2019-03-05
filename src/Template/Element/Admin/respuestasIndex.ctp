 <div class="row">
    <div class="col-xs-12">
        <div class="box box-pwc">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('idRespuesta') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('txtRespuesta') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('correcta') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php foreach ($respuestas as $respuesta): ?>
                        <tr>
                            <td><?= $this->Number->format($respuesta->idRespuesta) ?></td>
                            <td><?= h($respuesta->txtRespuesta) ?></td>
                            <td><?= $respuesta->correcta ? __('Yes') : ""; ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Respuesta','action' => 'view',  $respuesta->idRespuesta],['class' => 'btn btn-info btn-xs']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Respuesta','action' => 'edit', $respuesta->idRespuesta],['class' => 'btn btn-warning btn-xs']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respuesta','action' => 'delete', $respuesta->idRespuesta], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->idRespuesta),'class' => 'btn btn-danger btn-xs']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>