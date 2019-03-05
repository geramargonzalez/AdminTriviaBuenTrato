<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login-Admin Un Trato por el buen trato</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <?= $this->Html->css('AdminLTE./bootstrap/css/bootstrap.min'); ?>
    <?= $this->Html->css('AdminLTE.AdminLTE.min'); ?>
    <?= $this->Html->css('login'); ?>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <?= $this->Flash->render(); ?>
        <div class="login-box-body">
            <div class="login-logo">
                <?= $this->Html->image('logo.png', ['height' => 200]); ?>
            </div>
            <?= $this->Flash->render('auth'); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <?= $this->Html->script('AdminLTE./plugins/jQuery/jquery-2.2.3.min'); ?>
    <?= $this->Html->script('AdminLTE./bootstrap/js/bootstrap.min'); ?>
</body>
</html>
