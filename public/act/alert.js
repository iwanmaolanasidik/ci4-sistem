function dangerAlert(info){
    $('#alert').html('<div class="box box-danger box-solid alert-box" style="position: absolute; bottom:0; right: 1vw; width:313px;"><div class="box-header with-border"><i class="fa fa-warning"></i><h3 class="box-title"> Peringatan</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="remove" onclick="alertClose()"><i class="fa fa-times"></i></button></div></div><div class="box-body">'+info+'</div></div>');
}

function successAlert(info){
    $('#alert').html('<div class="box box-success box-solid alert-box" style="position: absolute; bottom:0; right: 1vw; width:313px;"><div class="box-header with-border"><i class="fa fa-check"></i><h3 class="box-title"> Berhasil</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="remove" onclick="alertClose()"><i class="fa fa-times"></i></button></div></div><div class="box-body">'+info+'</div></div>');
}

function alertClose(){
    $('.alert-box').hide();
}