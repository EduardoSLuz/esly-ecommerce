<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Master | Painel</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/resources/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="/resources/admin/plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="/resources/admin/plugins/jsgrid/jsgrid-theme.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/resources/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/resources/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/resources/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/resources/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/resources/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/resources/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/resources/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/resources/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="icon" type="image" href="/resources/imgs/global/logo-mobile.png">
  <!-- Divers -->
  <link href="/resources/css/admin.css" rel="stylesheet">  
  <link href="/resources/css/overlay.css" rel="stylesheet">  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse scroll-null">

  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/master/home/" class="nav-link">Home</a>
      </li>
    </ul>

    <?php if( 0==1 ){ ?>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <?php } ?>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <?php if( 0==1 ){ ?>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/resources/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/resources/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="/resources/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <?php } ?>


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <?php if( 0==1 ){ ?>

        
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <i id="notificationsStores2">
            <?php if( isset($notifications) && $notifications["total"] > 0 ){ ?>

            <span class="badge badge-primary navbar-badge">
              <?php echo htmlspecialchars( $notifications["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

            </span>
            <?php } ?>

          </i>
        </a>

        <div id="notificationsStores" class="dropdown-menu dropdown-menu-lg dropdown-menu-right" data-play="<?php echo htmlspecialchars( $notifications["play"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-href="<?php echo htmlspecialchars( $notifications["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div id="alertNotifcations" data-alert="<?php echo htmlspecialchars( $notifications["alert"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></div>

          <?php if( isset($notifications) && $notifications["total"] > 0 ){ ?>

          
          <span id="notteste" class="dropdown-item dropdown-header">
            <?php echo htmlspecialchars( $notifications["total"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Notificações
          </span>

          <?php $counter1=-1;  if( isset($notifications["details"]) && ( is_array($notifications["details"]) || $notifications["details"] instanceof Traversable ) && sizeof($notifications["details"]) ) foreach( $notifications["details"] as $key1 => $value1 ){ $counter1++; ?>

          <?php if( $value1["qtd"] > 0 && $value1["status"] != 2 ){ ?>

          <div class="dropdown-divider"></div>
          <a id="optionNot<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="dropdown-item">
            <i class="<?php echo htmlspecialchars( $value1["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mr-2"></i> 
            <?php echo htmlspecialchars( $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["desc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

            <?php if( 0==1 ){ ?> <span class="float-right text-muted text-sm">3 mins</span> <?php } ?>

          </a>
          <?php } ?>

          <?php } ?>

          
          <?php }else{ ?>

          <span class="dropdown-item dropdown-header">
            Sem Notificações
          </span>
          <?php } ?>


        </div>

        <?php } ?>

        
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/" class="brand-link">
      <img src="/resources/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Master Console</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/resources/imgs/global/userDefault.png" class="img-circle elevation-2 bg-secondary" alt="User Image">
        </div>
        <div class="info">
          <a href="/master/home/" class="d-block">User Master</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">GERAL</li>
          
          <?php if( 0==1 ){ ?>

          <li class="nav-item has-treeview">
            
            <a href="/admin/stores/" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Lojas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/admin/stores/1/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loja 01</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/admin/stores/2/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loja 02</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
          <?php } ?>


          <li class="nav-item">
            <a href="/master/home/" class="nav-link">
              <i class="fas fa-clock nav-icon"></i>
              <p>/*Em Desenvolvimento*/</p>
            </a>
          </li>

          <li class="nav-item my-2" style="border-top: 1px solid #4f5962;"></li>

          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="fas fa-door-open nav-icon"></i>
              <p>Sair</p>
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