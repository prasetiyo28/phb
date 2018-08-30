<div id="modal_ktp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="card">
      <div class="card-body">
        <strong>NIK</strong> <br>
        <?php echo $nik ?>
      </div>
    </div>

    <center>
    <img src=" <?php echo base_url('assets/uploads').'/'.$foto_ktp ?> " class="img-responsive" alt="">
    </center>
    <br>
    <?php if ($par==""): ?>
      <div class="col-md-12">
        <a type="button" href=" <?php echo base_url('Admin/verifikasi_ktp').'/'.$id; ?> " class="btn ink-reaction btn-raised btn-block btn-primary text-center"> <i class="fa fa-check"></i> Verifikasi</a>
      </div>
    <?php endif; ?>
  </div>
</div>
