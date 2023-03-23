
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/square/blue.css">
  <!-- jQuery 3 -->
  <script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Var -->
    <script>
      var load_content = '<i class="fa fa-refresh fa-spin"></i>';
    </script>
</head>
<body class="hold-transition login-page">

<nav class="navbar navbar-default" style="background-color:#3c8dbc; border-radius:0; height:60px;">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="padding: 8px 15px; color:white; font-weight:bold;">
      <div class="row" style="margin-left:3px">
        <img alt="Brand" src="<?=base_url()?>images/logo-sd.png" style="width:35px"> &nbsp; SEKOLAH DANGDUT
        </div>
      </a>
    </div>

    <ul class="nav navbar-nav navbar-right" style="margin-right:1px; padding-top:2px;">
      <li>
        <a href="<?=base_url()?>registrasi" title="Registrasi" class="menuclick"  style="color:#fff; font-weight:bold; font-size:16px;">
         <i class="fa fa-address-card"></i> &nbsp; REGISTRASI
        </a>
      </li>
    </div>

  </div>
</nav>

<!-- login or register -->
<div class="login-box">

    <div class="login-logo">
    </div>

    <div class="login-box-body" id="content">

        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?=base_url()?>index2.html" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div> 
        </form>

        <hr/>
        <a href="#">I forgot my password</a><br>

    </div>

</div>
<!-- login or register -->


<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>