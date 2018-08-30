<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />

  </head>
  <body>

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
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($pengguna as $p): $no++;?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $p->nik ?></td>
          <td><?php echo $p->nama ?></td>
          <td><?php echo $p->tempat_lahir.', '.tgl_indo($p->tgl_lahir); ?></td>
          <td><?php echo $p->telp ?></td>
          <td><?php echo $p->email ?></td>
          <td><?php echo $p->agama ?></td>
          <td><?php echo $p->pendidikan ?></td>
          <td><?php echo $p->alamat ?></td>

        </tr>
      <?php endforeach; ?>

      </tbody>
    </table>


    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {
    $('#tbl_pengguna').dataTable({
      "dom": 'T<"clear">lfrtip',
         "tableTools": {
             "sSwfPath": "<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?>"
         }
            });
    });
</script>
  </body>
</html>
