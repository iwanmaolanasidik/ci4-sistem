
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi</title>
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
        <a href="<?=base_url()?>login" style="color:#fff; font-weight:bold; font-size:16px;">
         <i class="fa fa-address-card"></i> &nbsp; LOGIN
        </a>
      </li>
    </div>

  </div>
</nav>


<div id="alert">

</div>

<!-- login or register -->
<div class="login-box" style="">

    <div class="login-logo">
    </div>

    <div class="login-box-body" id="content">

        <p class="login-box-msg">Registrasi</p>

        <form id="form-registrasi" action="javascript:registrasi()" url="<?=base_url()?>proses_registrasi">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Nama" name="name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype Password" name="password2">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                  <a href="#" style="color:#777;" id="show-password">
                    <span class="glyphicon glyphicon-eye-open"></span> Show password
                  </a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" id="btn-registrasi" class="btn btn-primary btn-block btn-flat"><i class="fa fa-refresh fa-spin"></i> Register</button>
                </div>
                <!-- /.col -->
            </div> 
        </form>

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

  // hide spinner di btn-registrasi
  $('.fa-spin').hide()

  // registrasi
  function registrasi(){
    var url = $('#form-registrasi').attr('url');

    var name = $('input[name="name"]').val();
    var username = $('input[name="username"]').val();
    var email = $('input[name="email"]').val();
    var password = $('input[name="password"]').val();
    var password2 = $('input[name="password2"]').val();
    // console.log(name+" "+username+" "+email+" "+password+" "+password2);
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'JSON',
      data: {
        name: name, username: username, email: email, password: password, password2: password2 
      },
      beforeSend: function(){
        $('.fa-spin').show();
        $('#btn-registrasi').attr('disabled', 'disabled');
      },
      success: function(res){
        if(res.error){
          $.each(res.error, function(key, value){
            // console.log(key+" - "+value);
            if(!value){
              $('input[name="'+key+'"]').removeClass('invalid');
            }else{
              $('input[name="'+key+'"]').addClass('invalid');
            }
          })
          dangerAlert(res.info);
          $('.fa-spin').hide();
          $('#btn-registrasi').removeAttr('disabled', 'disabled');
        }else{
          successAlert(res["info"]);
          setTimeout(() => {window.location.href = '<?= base_url() ?>login'; $('.fa-spin').hide(); $('#btn-registrasi').removeAttr('disabled', 'disabled');}, 3000);
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

  function alertClose(){
    $('.alert-box').hide();
  }

  $(document).on({
      mouseenter: function () {
        $('input[name="password"]').removeAttr('type','password');
        $('input[name="password"]').attr('type','text');
        $('input[name="password2"]').removeAttr('type','password');
        $('input[name="password2"]').attr('type','text');
        $('#show-password').css('color','#367fa9');
      },

      mouseleave: function () {
        $('input[name="password"]').removeAttr('type','text');
        $('input[name="password"]').attr('type','password');
        $('input[name="password2"]').removeAttr('type','text');
        $('input[name="password2"]').attr('type','password');
        $('#show-password').css('color','#777');

      }
  }, '#show-password');

  // function showPassword(){
  //   $('input[name="password"]').removeAttr('type','password');
  //   $('input[name="password"]').removeAttr('type','text');
  // }
</script>

</body>
</html>
