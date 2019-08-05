<div class="offcanvas">
<?php foreach ($data as $a): ?>

  <!-- BEGIN OFFCANVAS DEMO LEFT -->
  <div id="offcanvas-demo-left1" class="offcanvas-pane width-9" style="z-index:1000;">
    <div class="offcanvas-head style-info">
      <header>Produksi Bidang <?php echo bidang($a->bidang); ?></header>
      <div class="offcanvas-tools">
        <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
          <i class="md md-close"></i>
        </a>
      </div>
    </div>
    <div class="offcanvas-body">
      <h4>Pemilik</h4>
      <hr style="margin-top: 0px;">
        <div class="hbox-column width-2">
          <img class="img-circle img-responsive pull-left" src="<?php echo base_url() ?>/assets/uploads/<?php echo $a->foto ?>" alt="Foto"  />
        </div><!--end .hbox-column -->
        <div class="hbox-column v-top">
          <div class="clearfix">
            <div class="col-lg-12 margin-bottom-lg">
              <a class="text-lg text-medium nama" onclick="profil('<?php echo $a->id_user ?>')" href="javascript:void(0)"><?php echo $a->nama ?></a>
            </div>
          </div>
          <div class="clearfix opacity-75">
            <div class="col-md-12">
              <span class="glyphicon glyphicon-phone text-sm"></span> &nbsp;<?php echo $a->telp ?><br>
              <span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;<?php echo $a->email ?>
            </div>
          </div>
        </div>
        <br>
        <form class=" form form-validate" id="form_update_produksi" novalidate="novalidate" method="post" >
        <h4>Detail Produksi</h4>
        <hr style="margin-top: 0px;">

        <table class="a table table-responsive table-banded">
          <tbody>
            <tr>
              <td>Produksi</td>
              <td><?php echo $a->jenis_produksi ?></td>
            </tr>
            <tr>
              <td>Tanggal Tanam</td>
              <td><?php echo tgl_indo($a->tgl_tanam) ?></td>
            </tr>
            <tr>
              <td>Perkiraan Tanggal Panen</td>
              <td><?php echo tgl_indo($a->tgl_kira_panen) ?></td>
            </tr>
            <tr>
              <td>Jumlah Bibit</td>
              <td><?php echo $a->jml_bibit ?> kg/ekor</td>
            </tr>
            <tr>
              <td>Perkiraan Jumlah Panen</td>
              <td><?php echo $a->jml_kira_panen ?> kg/ekor</td>
            </tr>
            <tr>
              <td>Harga perkiraan perkilo/ekor</td>
              <td><?php echo $a->harga_kira_perkilo ?></td>
            </tr>
            <tr>
              <td>Luas Lahan</td>
              <td><?php echo $a->luas ?> m<sup>2</sup></td>
            </tr>
            <tr>
              <td>Status Lahan</td>
              <td><?php if ($a->status_lahan=='1'): ?>
                Milik Sendiri
                <?php else: ?>
                  Sewa
              <?php endif; ?></td>
            </tr>
            <tr>
              <td>Lokasi</td>
              <td><?php echo $a->lokasi ?></td>
            </tr>
            <?php if ($a->bidang=='2'): ?>
              <tr>
                <td>Jenis Tambak</td>
                <td><?php if ($a->jenis_tambak=='1'): ?>
                    Air Tawar
                  <?php else: ?>
                    Air Payau
                <?php endif; ?></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
        </form>

    </div>
  </div>
  <!-- END OFFCANVAS DEMO LEFT -->
<?php endforeach; ?>

</div><!--end .offcanvas-->
<script src="<?php echo base_url();?>assets/js/core/source/AppOffcanvas.js"></script>
