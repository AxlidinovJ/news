<?php


use backend\assets\AdminlteAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use common\widgets\Alert;

use yii\helpers\Url;
AdminlteAsset::register($this);
$admin = yii::$app->user->identity;
$menu = yii::$app->session->get('menu');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <title>AdminLTE 3 | Dashboard</title> -->

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <?php $this->head() ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php $this->beginBody() ?>
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src=" dist/img/AdminLTELogo.png')?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?=url::to('@web/photos/users/'.$admin->img)?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">Alexander Pierce</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

            <li class="user-header bg-primary">
              <img src="<?=url::to('@web/photos/users/'.$admin->img)?>" class="img-circle elevation-2" alt="User Image">
              <p>
               <?=$admin->name?>
                <small><?=date('d-M Y',$admin->created_at)?></small>
              </p>

            <li class="user-footer">
              <a href="<?=url::to(['/admin/user'])?>" class="btn btn-default btn-flat">Profile</a>
              <a href="<?=url::to(['/admin/logout'])?>" class="btn btn-default btn-flat float-right">Logaut</a>
            </li>
          </ul>
        </li>



        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=url::home()?>" class="brand-link">
        <img src="<?=url::to('@web/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?=url::to('@web/photos/users/'.$admin->img)?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?=url::to(['admin/user'])?>" class="d-block"><?=$admin->name?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="<?=url::to(['admin/index'])?>" class="nav-link <?=$menu=='dashbord'?'active':''?>">
                <i class="nav-icon fa fa-database"></i>
                <p>Dashbord</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=url::to(['category/index'])?>" class="nav-link <?=$menu=='category'?'active':''?>">
                <i class="nav-icon fa fa-h-square"></i>
                <p>Categorys</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=url::to(['news/index'])?>" class="nav-link <?=$menu=='news'?'active':''?>">
                <i class="nav-icon fa fa-rss" aria-hidden="true"></i>
                <p>News</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=url::to(['admin/user'])?>" class="nav-link <?=$menu=='user'?'active':''?>">
                <i class="nav-icon fa fa-user-circle" aria-hidden="true"></i>
                <p><?=$admin->name?></p>
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
      <!-- Content Header (Page header) -->

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?=$this->title?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => [
              'class' => 'float-sm-right',
            ],
          ]) ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?=$content?>

        </div><!-- /.container-fluid -->
      </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();