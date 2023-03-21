</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

<script type="text/javascript">
    $(document).off("click",".menuclick").on("click",".menuclick",function (event, messages) {
        event.preventDefault()
        var url = $(this).attr("href");
        var title = $(this).attr("title");
        var target = $(this).attr("target");
        if(url=="<?= site_url('logout')?>")
        {
            window.location.href=url;
        }
        if(target=="_blank")
        {
            window.open(url, '_blank');
            return false;
        }  
        $(this).parent().addClass('active').siblings().removeClass('active');
        //$("#content").html(load_content);
        //var param = {[csrfName]: csrfHash, ajax:"yes"};
        $.ajax({
            type: "POST",dataType: "json",data: '', url: url,
            success: function(val){
                //csrfHash=val[csrfName];
                //$('.modal.aside').remove();
                history.replaceState(title, title, url);
                $(".uri").val(url);
                //$('title').html(title);
                $("#content").html(val["data"]);
                //activemenu();
            }
        });		
    })
</script> 

</body>
</html>