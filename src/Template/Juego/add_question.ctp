<section class="content-header">
    <h1><?= __('Cree una pregunta') ?><?= $this->Html->link('<span style="margin: 10px;"><i class="fa fa-plus-circle"></i></span>', ['controller' => 'Pregunta','action' => 'add'], ['escape' => false]) ?></h1>
</section>
<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h4 ><?= __('Necesita ' . $cantpre . ' preguntas para su juego') ?></h4>
                <h6 id='numeroDeselecciones'><?= __('') ?></h6>
            </div>
            <div class="box-body table-responsive">
              <?= $this->Form->create() ?>
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
                        <tr>
                            <td><?= $this->Html->image($pregunta->image, ['height' => 40]) ?></td>
                            <td><?= h($pregunta->txtPregunta) ?></td>
                            <td class="actions" style="white-space:nowrap">
                                <?= $this->Form->input($pregunta->idPregunta, ['type'=>'checkbox','class'=>'form-check-input checkbox','id' => $pregunta->idPregunta]); ?>                                                
                            </td>
                        </tr>
                    <?php endforeach; ?>                 
                    </tbody>
                </table>
                <input type="hidden" id="cantpre" value="<?php echo $cantpre;?>">
                 <button type="submit" class="btn btn-primary pull-right">submit</button>
                <?= $this->Form->end() ?>
            </div>
            
            <div class="paginator">
                <ul class="pagination ">
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
</section>