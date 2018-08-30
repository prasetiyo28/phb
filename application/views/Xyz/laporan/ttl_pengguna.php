  <div class="card card-bordered style-primary">
    <div class="card-head">
      <div class="tools">
        <div class="btn-group">
          <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
          <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
        </div>
      </div>
      <header><i class="fa fa-fw fa-tag"></i> Tabel Total Pengguna</header>
    </div><!--end .card-head -->

    <div class="card-body style-default-bright">
      <div class="table-responsive">
        <table id="tbl_pengguna1" class="table table-striped table-hover dataTable no-footer" >
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>TTL</th>
              <th>Telp</th>
              <th>Email</th>
              <th>Agama</th>
              <th>Pendidikan</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=0; foreach ($ttl_pengguna as $p): $no++;?>
            <tr>
              <td><?php echo $no ?></td>
              <td><span <?php if ($p->v_telp=='1'): ?>
                 class="text-success"
                <?php else: ?>
                   class="text-danger"
              <?php endif; ?>><?php echo $p->nik ?></span>
              </td>
              <td><?php echo $p->nama ?></td>
              <td><?php echo $p->tempat_lahir.', '.tgl_indo($p->tgl_lahir); ?></td>
              <td><span <?php if ($p->v_email=='1'): ?>
                 class="text-success"
                <?php else: ?>
                   class="text-danger"
              <?php endif; ?>><?php echo $p->telp ?></span>
                </td>
              <td><span <?php if (!empty($p->v_email)): ?>
                 class="text-success"
                <?php else: ?>
                   class="text-danger"
              <?php endif; ?>><?php echo $p->email ?></span>
                </td>
              <td><?php echo $p->agama ?></td>
              <td><?php echo $p->pendidikan ?></td>
              <td><?php echo $p->alamat ?></td>

            </tr>
          <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <hr>
      <em class="text-caption"> <span class="text-success"><i class="fa fa-circle"></i> Sudah di verifikasi</span> | <span class="text-danger"><i class="fa fa-circle"></i> Belum di verifikasi</span> </em>

    </div>
  </div>
<script type="text/javascript">
$( document ).ready(function() {

$('#tbl_pengguna1').dataTable({
  "dom": 'T<"clear">lfrtip',
     "tableTools": {
         "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
     }
        });

});
</script>
<script src="<?php echo base_url();?>assets/js/core/demo/Demo.js"></script>
