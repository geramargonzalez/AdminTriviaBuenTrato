<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preguntum $pregunta
 */
?>
<ol class="breadcrumb">
    <li class="active"><?= $this->Html->link(__('Pregunta'), ['action' => 'index']); ?></li>
    <li class="active"><?= __('View') ?></li>
</ol>
<section class="content-header">
    <p><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right', 'escape' => false]) ?></p>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box box-pwc">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= __($pregunta->txtPregunta) ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12" align="center">
                            <?= $this->Html->image($pregunta->image, ['class' => 'img-responsive']); ?>
                        </div>
                        <div class="col-md-12 col-xs-12 article-body">
                            <?= $pregunta->descripcion; ?>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-6 col-xs-6" align="left">
                            <?= __('Posted by {0}', $this->Html->tag('b', $userCreated['username'])); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


