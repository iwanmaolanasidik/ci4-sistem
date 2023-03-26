
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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

<div class="row">
  <div class="col-md-3" style="float: none; margin: 20vh auto;">
    <div class="box box-solid" style="border-color: #333; border: 1px solid;">
      <div class="box-header with-border" style="background-color: #32434D; color:#fff;text-align:center;">
        <h4 class="box-title">User Login</h4>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        The body of the box
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>




<!-- jQuery 3 -->
<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>dist/js/demo.js"></script>
<script src="<?=base_url()?>act/alert.js"></script>

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
