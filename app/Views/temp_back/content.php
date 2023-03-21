<?= $this->extend('temp_back/main') ?>

<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="box">
          <div class="box-body" id="content">
            <?php if(isset($content)){echo view($content); }else{ echo "Content File Missing";  }; ?>
          </div>
          <?=$this->include('temp_back/loading')?>
        </div>
        <!-- /.box -->
    </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>