<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Addressme</title>

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/adminlte.min.css">
  
  <link href="<?=base_url()?>dist/css/styles.css" rel="stylesheet" />
  
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/favicon.ico" sizes="32x32"/>
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('admin/logout')?>" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3 mx-auto">-->
    <!--  <div class="input-group input-group-sm">-->
    <!--    <input class="form-control form-control-navbar" type="search" placeholder="Search user" aria-label="Search">-->
    <!--    <div class="input-group-append">-->
    <!--      <button class="btn btn-navbar" type="submit">-->
    <!--        <i class="fas fa-search"></i>-->
    <!--      </button>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</form>-->

    <!--<ul class="navbar-nav ml-auto">-->
    <!--  <li class="nav-item d-none d-sm-inline-block">-->
    <!--    <a href="https:// technologies.com/contact/" target="_blank" class="nav-link">Contact</a>-->
    <!--  </li>-->
    <!--</ul>-->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-align:center; font-family:'Caveat', cursive" href="/" class="brand-link">
      
      <span  class="brand-text font-weight-light">Addressme</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=ucwords($_SESSION['admin']['name'])?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <?php if(empty($this->uri->segment(1))) { $dashClass = 'active';} ?>
            <a href="<?=base_url()?>admin/home" class="nav-link <?=@$dashClass?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li><div class="sb-sidenav-menu-heading text-white"><i>USERS</i></div></li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user/new_user" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                New User
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                User Details
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user/verification" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Verification Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user/request" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Wallet Address Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user/transaction" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Transaction Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($this->uri->segment(1) == 'openings') { $openingClass = 'active';} ?> 
            <a href="<?=base_url()?>admin/user/notification" class="nav-link  <?=@$openingClass?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Notification
              </p>
            </a>
          </li>
          
          
          
          
          <li><div class="sb-sidenav-menu-heading text-white"><i>ADMIN</i></div></li>
          <li class="nav-item">
            <?php if($this->uri->segment(1) == 'add-user') { $addUserClass = 'active';} ?>
            <a href="<?=base_url()?>admin/add-admin" class="nav-link <?=@$addUserClass?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <?php if($this->uri->segment(1) == 'users' || $this->uri->segment(1) == 'update-user' || $this->uri->segment(1) == 'change-password') { $userClass = 'active';} ?>
            <a href="<?=base_url()?>admin/admin" class="nav-link <?=@$userClass?>">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Admin Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">