
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Var -->
  <script>
    var load_content = '<i class="fa fa-refresh fa-spin"></i>';
  </script>

  <style>
    .invalid{
      border-color:red;
    }
  </style>
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

<div id="alert">

</div>

<div class="row">
  <div class="col-md-3" style="float: none; margin: 20vh auto;">
    <div class="box box-solid" style="border: 1px solid #3c8dbc;">
      <div class="box-header with-border" style="background-color: #3c8dbc; color:#fff;text-align:center;">
        <h4 class="box-title">User Login</h4>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <br>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
        <br>
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        </div>
      </div>
      <div class="box-body">
        <button class="btn bg-orange btn-flat pull-right" onclick="proses_login()" id="btn-login"><i class="fa fa-sign-in"></i><i class="fa fa-refresh fa-spin"></i>&nbsp; Login</button>
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
<script>
  // hide spinner di btn-login
  $('.fa-spin').hide()

  function proses_login(){
    var username = $('input[name="username"]').val();
    var password = $('input[name="password"]').val();
    //console.log(username+" "+password);
    $.ajax({
      type: 'POST',
      dataType: 'JSON',
      url: '<?=base_url()?>proses_login',
      data: {
        username: username,
        password: password
      },
      beforeSend: function(){
        $('.fa-spin').show();
        $('#btn-login').attr('disabled', 'disabled');
        $('.fa-sign-in').hide()
      },
      success: function(res){
        if(res.login == true){
          successAlert(res["info"]);
          setTimeout(() => {window.location.href = '<?= base_url() ?>'; $('.fa-spin').hide();$('.fa-sign-in').show(); $('#btn-login').removeAttr('disabled', 'disabled');}, 3000);
        }else{
          $('input[name="'+res["gagal"]+'"]').addClass('invalid');
          dangerAlert(res["info"]);
        }
      }
    })
  }

  function dangerAlert(info){
    $('#alert').html('<div class="box box-danger box-solid alert-box" style="position: absolute; bottom:0; right: 1vw; width:313px;"><div class="box-header with-border"><i class="fa fa-warning"></i><h3 class="box-title"> Peringatan</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="remove" onclick="alertClose()"><i class="fa fa-times"></i></button></div></div><div class="box-body">'+info+'</div></div>');
  }

  function successAlert(info){
    $('#alert').html('<div class="box box-success box-solid alert-box" style="position: absolute; bottom:0; right: 1vw; width:313px;"><div class="box-header with-border"><i class="fa fa-check"></i><h3 class="box-title"> Berhasil</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="remove" onclick="alertClose()"><i class="fa fa-times"></i></button></div></div><div class="box-body">'+info+'</div></div>');
  }

  function removeClass(){
    $('input[name="name"]').removeClass('invalid');
  }

  function alertClose(){
    $('.alert-box').hide();
  }
</script>

</body>
</html>
