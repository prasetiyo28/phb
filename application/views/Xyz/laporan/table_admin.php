<div id="content">


  <section>
  <div class="section-body">
      <h2 class="text-light text-center">Laporan<br/><small class="text-primary"><?php echo $laporan ?></small></h2>
      <br/>

		<h4> <i class="fa fa-circle-o text-primary"></i> Tabel Admin</h4>
      <div class="card">
        <div class="card-body">
          <table id="tbl_pengguna" class="table table-striped table-hover dataTable no-footer" >
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Total pengguna</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=0; foreach ($pengguna as $p): $no++;?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $p->nama ?></td>
                <td><?php echo $p->telp ?></td>
                <td><?php echo $p->email ?></td>
                <td><?php echo tampil_prov($p->id_prov) ?></td>
                <td><?php echo tampil_kab($p->id_kab) ?></td>
                <td>
                  <button type="button" class="btn btn-sm ink-reaction btn-floating-action btn-primary" onclick="tampil_ttl_pengguna(<?php echo $p->id_kab ?>)"><?php echo tampil_total_pengguna($p->id_kab) ?></button>
                </td>
              </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
      <em class="text-caption"> <span class="text-success"><i class="fa fa-circle"></i> Sudah di verifikasi</span> | <span class="text-danger"><i class="fa fa-circle"></i> Belum di verifikasi</span> </em>

      <div id="div_ttl_pengguna">

      </div>

  </div><!--end .section-body -->
</section>
</div>


<div id="viewcanvas"></div>

<script type="text/javascript">
$( document ).ready(function() {

$('#tbl_pengguna').dataTable({
  "dom": 'T<"clear">lfrtip',
     "tableTools": {
         "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
     }
        });

});

function tampil_ttl_pengguna(id) {
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/get_ttl_pengguna'); ?>/"+id,
    }
  ).done(function( data )
  {
    $('#div_ttl_pengguna').html(data);

  });
}

</script>
