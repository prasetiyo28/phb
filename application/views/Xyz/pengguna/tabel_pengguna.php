<div class="card">
  <div class="card-body">
    <div style="overflow-x:auto;">
      <table id="tbl_pengguna" class="table table-striped table-hover dataTable no-footer" >
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
            <th>Dibuat</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach ($pengguna as $p): $no++;?>
          <tr>
            <td><?php echo $no ?></td>
            <td><span <?php if ($p->v_ktp=='1'): ?>
               class="text-success"
              <?php else: ?>
                 class="text-danger"
            <?php endif; ?>><?php echo $p->nik ?></span>
            </td>
            <td><?php echo $p->nama ?></td>
            <td><?php echo $p->tempat_lahir.', '.tgl_indo($p->tgl_lahir); ?></td>
            <td><span <?php if ($p->v_telp=='1'): ?>
               class="text-success"
              <?php else: ?>
                 class="text-danger"
            <?php endif; ?>><?php echo $p->telp ?></span>
              </td>
            <td><span <?php if ($p->v_email=='1'): ?>
               class="text-success"
              <?php else: ?>
                 class="text-danger"
            <?php endif; ?>><?php echo $p->email ?></span>
              </td>
            <td><?php echo $p->agama ?></td>
            <td><?php echo $p->pendidikan ?></td>
            <td><?php echo $p->alamat ?></td>
            <td><?php echo tgl_indo(date('Y-m-d', strtotime($p->cdate))) ?> <br><?php echo date('H:i:sa', strtotime($p->cdate)); ?> </td>

          </tr>
        <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<em class="text-caption"> <span class="text-success"><i class="fa fa-circle"></i> Sudah di verifikasi</span> | <span class="text-danger"><i class="fa fa-circle"></i> Belum di verifikasi</span> </em>
<script type="text/javascript">
$( document ).ready(function() {

$('#tbl_pengguna').dataTable({
  "dom": 'T<"clear">lfrtip',
     "tableTools": {
         "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
     }
        });

});
</script>
