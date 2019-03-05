  <?php
  use Cake\Core\Configure;

  $file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

  if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
  } else {
    ?>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- user_session Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?= !empty($user_session) && isset($user_session['image']) ? $this->Html->image($user_session['image'], ['class' => 'user-image', 'alt' => '']) : '' ?>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li class="user-header">
                <?= !empty($user_session) && isset($user_session['image']) ? $this->Html->image($user_session['image'], ['class' => 'img-circle']) : '' ?>
                <?php if(!empty($user_session)) : ?>
                  <p>
                    <?= !empty($user_session) ? $user_session['username'] : 'username'?>
                    <small><?= !empty($user_session) ? $user_session['email'] : 'email' ?></small>
                    <small><?= $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'change_password', $user_session['id']], ['class' => 'label label-warning']) ?></small>
                  </p>
                <?php endif;?>
              </li>
              <li class="user_session-footer">
                <?php if(!empty($user_session)) : ?>
                  <div class="pull-left">
                    <?=$this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'view', $user_session['id']], ['class' => 'btn btn-default btn-flat']) ?>
                  </div>
                  <div class="pull-right">
                    <?= $this->Html->link(__('Sing Out'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat']) ?>
                  </div>
                <?php endif; ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

<?php } ?>



