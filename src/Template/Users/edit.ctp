<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->file('image', ['id' => 'select-file']);
            echo $this->Form->control('role_id', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
