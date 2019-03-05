<?php if(!empty($user_session)){ ?>
<ul class="sidebar-menu">
  <li class="treeview">
    <?= $this->Html->link('
    <i class="glyphicon glyphicon-knight" aria-hidden="true"></i>'.
    '<span>' . __('Juego') . '</span><span class="fa fa-angle-left pull-right-container"></span>',
    ['controller' => 'Juego','action' => 'index'], ['escape' => false]); ?>
    <ul class="treeview-menu" style="display: none;">
       <li><?= $this->Html->link(__('Todos'), ['controller' => 'Juego','action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Juego','action' => 'add']) ?> </li>
      
    </ul>
    </li>
  <li class="treeview">
    <?= $this->Html->link('
    <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>'.
    '<span>' . __('Generales') . '</span><span class="fa fa-angle-left pull-right-container"></span>',
    ['controller' => 'Generales','action' => 'index'], ['escape' => false]); ?>
    <ul class="treeview-menu" style="display: none;">
       <li><?= $this->Html->link(__('Todos'), ['controller' => 'Generales','action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Generales','action' => 'add']) ?> </li>
      
    </ul>
    </li>
  <li class="treeview">
   <?= $this->Html->link('
    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>'.
    '<span>' . __('Nivel') . '</span><span class="fa fa-angle-left pull-right-container"></span>',
    ['controller' => 'Nivel','action' => 'index'], ['escape' => false]); ?>
  <ul class="treeview-menu" style="display: none;">
    <li><?= $this->Html->link(__('Todos'), ['controller' => 'Nivel','action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Nivel','action' => 'add']) ?></li>
     
  </ul>
  </li>
  <li class="treeview">
    <?= $this->Html->link('
    <i class="glyphicon glyphicon-education" aria-hidden="true"></i>'.
    '<span>' . __('Pregunta') . '</span><span class="fa fa-angle-left pull-right-container"></span>',
    ['controller' => 'Pregunta', 'action' => 'index'], ['escape' => false]); ?>

  <ul class="treeview-menu" style="display: none;">
     <li><?= $this->Html->link(__('Todos'), ['controller' => 'Pregunta', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Pregunta', 'action' => 'add']) ?></li>
   
  </ul>
  </li>
  <li class="treeview">
    <?= $this->Html->link('
    <i class="glyphicon glyphicon-book" aria-hidden="true"></i>'.
    '<span>' . __('Respuestas') . '</span><span class="fa fa-angle-left pull-right-container"></span>',
    ['controller' => 'Respuesta','action' => 'index'], ['escape' => false]); ?>
    <ul class="treeview-menu" style="display: none;">
      <li><?= $this->Html->link(__('Todos'), ['controller' => 'Respuesta','action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Respuesta','action' => 'addOnlyOne']) ?> </li>
    </ul>
  </li>   
</ul>
<?php } ?>
