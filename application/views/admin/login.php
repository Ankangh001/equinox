<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Technologies | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Addressme</b></a>
  </div>
  <div class="container mt-3">
  <?php if (!empty(validation_errors())) { ?>
  <div class="alert alert-danger">
      <?= validation_errors(); ?>
  </div>
  <?php  } ?>
  <?php if (isset($msg)) { ?>
    <div class="alert alert-danger">
      <?=$msg?>
    </div>
  <?php } ?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?=form_open('admin/validate')?>
        <div class="input-group mb-3">
          <?php
          $attributes = [
            'class' => 'form-control',
            'required' => '',
            'autofocus' => '',
            'placeholder' => 'Enter Email',
          ];
          echo form_input('email', @$email, $attributes); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <?php 
          $attributes = [
            'class' => 'form-control',
            'required' => '',
            'placeholder' => 'Enter Your Password',
          ];
          echo form_password('password', '', $attributes); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?=form_submit('submit', 'Sign In', ['class' => 'btn btn-primary btn-block']);?>
          </div>
          <!-- /.col -->
        </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<script src="<?=base_url()?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>dist/js/adminlte.min.js"></script>

</body>
</html>