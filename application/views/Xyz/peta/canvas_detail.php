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
        <form class=" form form-validate" id="form_update_produksi" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/Xyz/update_produksi">
        <div class="pull-right">
          <a id="btn_edit" class="a btn btn-icon-toggle ink-reaction" onclick="edit_produksi()" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="md md-edit"></i></a>
          <button id="btn_save" type="submit" class="b btn btn-icon-toggle ink-reaction"><i class="md md-save" data-toggle="tooltip" data-placement="top" data-original-title="Simpan"></i></button>
          <a id="btn_ccl" class="b btn btn-icon-toggle ink-reaction" onclick="batal_produksi()"><i class="md md-close" data-toggle="tooltip" data-placement="top" data-original-title="Tutup"></i></a>
        </div>
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

              <div class="b card-body">
                    <div class="form-group">
                      <input type="text" class="form-control" name="jenis_produksi" placeholder="Padi, Lele, Sapi dll." data-rule-badWords="true" required value="<?php echo $a->jenis_produksi ?>" >
                      <label >Produksi</label>
                    </div>
                  <div id="formgrup_icon1">
                    <div class="form-group" >
                      <div class="btn-group open">
                        <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                          <i class="fa fa-caret-down text-default-light"></i>
                        </button>
                        <div class="dropdown-menu animation-slide" role="menu" style="width:280px">
                          <?php
                          $no=0;
                          for ($i=1; $i <= 3 ; $i++) {
                            $no++;
                          ?>
                          <div class="col-sm-12">

                          <?php if ($i=='1'): $c="c-tani";?>
                              <h4 class="text-caption text-lg text-success <?php echo $c ?>" style="margin-bottom: 1px;">Pertanian</h4>
                              <hr style="margin-top: 0px;" class="<?php echo $c ?>">
                          <?php elseif ($i=='2'): $c="c-ikan";?>
                              <h4 class="text-caption text-lg text-info <?php echo $c ?>" style="margin-bottom: 1px;">Perikanan</h4>
                              <hr style="margin-top: 0px;" class="<?php echo $c ?>">
                          <?php else: $c="c-ternak";?>
                              <h4 class="text-caption text-lg text-warning <?php echo $c ?>" style="margin-bottom: 1px;">Peternakan</h4>
                              <hr style="margin-top: 0px;" class="<?php echo $c ?>">
                          <?php endif; ?>
                          </div>
                            <?php foreach ($icon as $ic): ?>

                            <?php if ($ic->bidang==$i): ?>
                              <div class="col-sm-2 <?php echo $c ?>">
                                <button type="button" class="btn btn-lg ink-reaction btn-icon-toggle btn-primary" onclick="pilih_icon1('<?php echo $ic->id_icon ?>','<?php echo $ic->icon ?>','<?php echo $ic->nama ?>')"><img src="<?php echo base_url('assets/uploads/icon/'.$ic->icon) ?>" alt=""></button>
                                <em class="text-caption"><?php echo $ic->nama ?> </em>
                              </div>
                            <?php endif;?>
                            <?php endforeach; }?>
                        </div>
                      </div>
                        <img id="img_icon1" alt="" src="<?php echo base_url('assets/uploads/icon/'.tampil_icon($a->id_icon,'1')) ?>"> <span id="nama_icon1"><?php echo tampil_icon( $a->id_icon,'2') ?></span>
                      <input type="hidden" name="id_icon1" value="<?php echo $a->id_icon ?>">
                      <label >Icon</label>
                    </div>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-content">
                          <input type="text" class="form-control" name="luas" data-rule-digits="true" required value="<?php echo $a->luas ?>">
                          <label>Luas lahan</label>
                        </div>
                        <span class="input-group-addon">m<sup>2</sup> </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <select class="form-control select2-list" name="status_lahan" required>
                        <option value=""></option>
                        <option <?php if ($a->status_lahan=='1') {echo "selected";} ?> value="1">Milik Sendiri</option>
                        <option <?php if ($a->status_lahan=='2') {echo "selected";} ?> value="2">Sewa</option>
                      </select>
                      <label >Status lahan</label>
                    </div>

                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-content">
                            <input type="text" class="form-control" name="jumlah_bibit" data-rule-digits="true" required value="<?php echo $a->jml_bibit ?>">
                            <label>Jumlah Bibit</label>
                          </div>
                          <span class="input-group-addon">kg/ekor</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-content">
                            <input type="text" class="form-control" name="jumlah_panen" data-rule-digits="true" required value="<?php echo $a->jml_kira_panen ?>">
                            <label>Perkiraan Jumlah Panen</label>
                          </div>
                          <span class="input-group-addon">kg/ekor</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control" name="tgl_tanam1"  required value="<?php echo $a->tgl_tanam ?>">
                        <label >Tanggal Tanam</label>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="tgl_panen1" required value="<?php echo $a->tgl_kira_panen ?>">
                        <label >Perkiraan Tanggal Panen</label>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="harga" data-rule-digits="true" required value="<?php echo $a->harga_kira_perkilo ?>">
                        <label>Harga perkiraan perkilo/ekor</label>
                      </div>
                      <?php if ($a->bidang=='2'): ?>
                        <div class="form-group">
                          <select class="form-control select2-list" name="jenis_tambak" required>
                            <option value=""></option>
                            <option <?php if ($a->jenis_tambak=='1') {echo "selected";} ?> value="1">Air Tawar</option>
                            <option <?php if ($a->jenis_tambak=='2') {echo "selected";} ?> value="2">Air Payau</option>
                          </select>
                          <label >Jenis Tambak</label>
                        </div>
                      <?php endif; ?>
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="lokasi"  required value="<?php echo $a->lokasi ?>" disabled>
                            <label >Lokasi</label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" onclick="modal_peta()" style="margin-top:15px"class="btn btn-sm ink-reaction btn-floating-action btn-danger"> <i class="fa fa-map-marker"></i></button>
                        </div>
                      </div>

                  <input type="hidden" name="lat1" value="<?php echo $a->lt ?>">
                  <input type="hidden" name="lon1" value="<?php echo $a->lg ?>">
                  <input type="hidden" name="icon_lama" value="<?php echo $a->icon ?>">
                  <input type="hidden" name="id_produksi" value="<?php echo $a->id_produksi ?>">
                  <input type="hidden" name="bidang1" value="<?php echo $a->bidang; ?>">
              </div><!--end .card-body -->
        </form>

    </div>
  </div>
  <!-- END OFFCANVAS DEMO LEFT -->
<?php endforeach; ?>

</div><!--end .offcanvas-->
<script src="<?php echo base_url();?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?php echo base_url();?>assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">

  $(function() {
    var bid= $('[name="bidang1"]').val();
    if (bid=='1') {
      $('.c-ternak').hide();
      $('.c-ikan').hide();
      $('.c-tani').show();
    }else if (bid=='2') {
      $('.c-ternak').hide();
      $('.c-ikan').show();
      $('.c-tani').hide();
    }else {
      $('.c-ternak').show();
      $('.c-ikan').hide();
      $('.c-tani').hide();
    }

    $('[name="tgl_tanam1"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
    $('[name="tgl_panen1"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
    $("#form_update_produksi").validate();
    $('.b').hide();
  })
  function modal_peta() {
    var centerOfMap = new google.maps.LatLng($('[name="lat1"]').val(), $('[name="lon1"]').val());
    var options = {
      center: centerOfMap, //Set center.
      zoom: 10 //The zoom value.
    };
    var image = " <?php echo base_url('assets/uploads/icon'); ?>/"+$('[name="icon_lama"]').val();
    var marker2 = new google.maps.Marker({
        position: centerOfMap,
        icon:image,
    });
    marker2.setMap(map2);
    $("#form_peta").removeAttr("action");
    $("#form_peta").attr('action',"<?php echo base_url('Xyz/update_peta_produksi'); ?>");
    $('#modal_peta').modal('show');
    $('#id').val($('[name="id_produksi"]').val());
    $('#btn_submit_peta').hide();
  }
  function edit_produksi() {
    $('.a').hide();
    $('.b').show();
  }
  function batal_produksi() {
    $('.b').hide();
    $('.a').show();
  }
  function pilih_icon1(id,val,nama) {
    $('[name="id_icon1"]').val(id);
    $('#img_icon1').attr('src',"<?php echo base_url('assets/uploads/icon/')?>"+val);
    $('#nama_icon1').text(nama);
    $('#img_icon1').show();
    $('#nama_icon1').show();
  }
</script>
