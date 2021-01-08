<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/resources/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/resources/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Icon -->
  <link rel="icon" type="image" href="/resources/imgs/global/logo-mobile.png">
  
  <link href="/resources/css/overlay.css" rel="stylesheet">  

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Painel</b>Master</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">

    <div class="card-body login-card-body">

      <p class="login-box-msg">Sign in to start your session</p>

      <div id="alertLoginMaster" class="alert alert-dismissible d-none fade text-left" role="alert">
        <span class="msgAlert">Msg</span>
      </div>
      
      <form id="formLoginMaster" class="formLoginMaster">

        <div class="input-group my-2">
          <input type="email" name="emailMaster" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group my-2">
          <input type="password" name="passMaster" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>

      </form>

    </div>

    <div id="overlayLoginMaster" class="bg-light overlay-site rounded d-none">
      <div class=" overlay d-flex justify-content-center align-items-center w-100 h-100">
        <i class="fas fa-2x fa-sync fa-spin"></i>
      </div>
    </div>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/resources/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/resources/admin/dist/js/adminlte.min.js"></script>

<script src="/resources/js/master_global.js"></script>

</body>
</html>
