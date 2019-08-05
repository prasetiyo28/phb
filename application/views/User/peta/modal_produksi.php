<div id="modal_add_produksi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="form form-validate" id="form_produksi" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/User/insert_produksi">
				<div class="card">
					<div class="card-head style-primary">
						<header id="headname">Tambah Produksi</header>
            <div class="tools">
							<div class="btn-group">
								<a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
							</div>
						</div>
					</div>
					<div class="card-body">
            <div>
              <label class="radio-inline radio-styled" style="display:none;">
                <input type="radio" id="p1" name="bidang" value="1" ><span>Pertanian</span>
              </label>
              <label class="radio-inline radio-styled" style="display:none;">
                <input type="radio" id="p2" name="bidang" value="2"><span>Perikanan</span>
              </label>
              <label class="radio-inline radio-styled" style="display:none;">
                <input type="radio" id="p3" name="bidang" value="3"><span>Peternakan</span>
              </label>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="nama" disabled value="<?php echo $this->session->userdata('nama') ?>">
                  <label>Pemilik</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="nik" disabled value="<?php echo $this->session->userdata('nik') ?>">
                  <label>NIK</label>
                </div>
              </div>
            </div>

            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id') ?>">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="jenis_produksi" placeholder="Padi, Lele, Sapi dll." data-rule-badWords="true" required>
                  <label >Produksi</label>
                </div>
              </div>
              <div class="col-sm-6" id="formgrup_icon">
                <div class="form-group" >
                  <div class="btn-group open">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-caret-down text-default-light"></i>
                    </button>
                    <div class="dropdown-menu animation-slide" role="menu" style="width:430px">
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
                            <button type="button" class="btn btn-lg ink-reaction btn-icon-toggle btn-primary" onclick="pilih_icon('<?php echo $ic->id_icon ?>','<?php echo $ic->icon ?>','<?php echo $ic->nama ?>')"><img src="<?php echo base_url('assets/uploads/icon/'.$ic->icon) ?>" alt=""></button>
                            <em class="text-caption"><?php echo $ic->nama ?> </em>
                          </div>
                        <?php endif;?>
                        <?php endforeach; }?>
                    </div>
                  </div>
                    <img id="img_icon" alt="" style="display:none;"> <span id="nama_icon" style="display:none;"></span>
                  <input type="hidden" name="id_icon" value="">
                  <label >Icon</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="luas" data-rule-digits="true" required>
                      <label>Luas lahan</label>
                    </div>
                    <span class="input-group-addon">m<sup>2</sup></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control select2-list" name="status_lahan" required>
                    <option value=""></option>
                    <option value="1">Milik Sendiri</option>
                    <option value="2">Sewa</option>
                  </select>
                  <label >Status lahan</label>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-content">
                        <input type="text" class="form-control" name="jumlah_bibit" data-rule-digits="true" required>
                        <label>Jumlah Bibit</label>
                      </div>
                      <span class="input-group-addon">kg/ekor</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-content">
                        <input type="text" class="form-control" name="jumlah_panen" data-rule-digits="true" required>
                        <label>Perkiraan Jumlah Panen</label>
                      </div>
                      <span class="input-group-addon">kg/ekor</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="tgl_tanam"  required>
                    <label >Tanggal Tanam</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="tgl_panen" required>
                    <label >Perkiraan Tanggal Panen</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="harga" data-rule-digits="true" required>
                    <label>Harga Perkilo/ekor</label>
                  </div>
                </div>
                <div class="col-sm-6" id="div_jenis_tambak" style="display:none;">
                  <div class="form-group">
                    <select class="form-control select2-list" name="jenis_tambak" required>
                      <option value=""></option>
                      <option value="1">Air Tawar</option>
                      <option value="2">Air Payau</option>
                    </select>
                    <label >Jenis Tambak</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="lokasi_lahan" name="lokasi" data-rule-badWords="true" required>
                <label >Lokasi</label>
              </div>
              <input type="hidden" id="lat1" name="lt" value="">
              <input type="hidden" id="lng1" name="lg" value="">

  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>

<script type="text/javascript">
$(function() {
  $("#form_produksi").submit(function(e) {
    if ($('[name="id_icon"]').val()=='') {
      $('#formgrup_icon').addClass('card card-outlined style-danger');
      $('#nama_icon').show();
      $('#nama_icon').text('Icon diperlukan.');
      $('#nama_icon').addClass('text-danger');
      e.preventDefault();
      return false;
    }else {
        $('#formgrup_icon').removeClass('card card-outlined style-danger');
        $('#nama_icon').text('');
        $('#nama_icon').hide();
        $('#nama_icon').removeClass('text-danger');
    }
   });
  $('[name="tgl_tanam"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
  $('[name="tgl_panen"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
  $.validator.addMethod("badWords", function(value,element) {
    var balik;
    var data = new FormData();
    data.append('text', value);
    $.ajax(
      {
        type: "POST",
        data: data,
        async: false,
        processData: false,
        contentType: false,
        url: "<?php echo base_url('Auth/find_bad_words/'); ?>",
        success: function(data)
      {
        if (data=="1") {
            balik= false;
          }else {
            balik= true;
          }
        },
      error:function(data)
     {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
    });
    //return this.optional(element) || /^-?\d+$/.test(value);
    return balik;

  }, $.validator.format("Terdapat kata yang tidak pantas, harap benarkan kolom ini."));


var pekerjaan = '<?php echo $this->session->userdata('pekerjaan') ?>';
        if (pekerjaan=='1') {
          $('#p1').prop('checked',true);
          $('#p2').prop('checked',false);
          $('#p3').prop('checked',false);
          $('#headname').text('Tambah Produksi Pertanian');
          $('#div_jenis_tambak').hide();
          $('.c-ternak').hide();
          $('.c-ikan').hide();
          $('.c-tani').show();
        }else if (pekerjaan=='2') {
          $('#p1').prop('checked',false);
          $('#p2').prop('checked',true);
          $('#p3').prop('checked',false);
          $('#headname').text('Tambah Produksi Perikanan');
          $('#div_jenis_tambak').show();
          $('.c-ternak').hide();
          $('.c-ikan').show();
          $('.c-tani').hide();
        }else {
          $('#p1').prop('checked',false);
          $('#p2').prop('checked',false);
          $('#p3').prop('checked',true);
          $('#headname').text('Tambah Produksi Peternakan');
          $('#div_jenis_tambak').hide();
          $('.c-ternak').show();
          $('.c-ikan').hide();
          $('.c-tani').hide();
        }
})


  function pilih_icon(id,val,nama) {
    $('[name="id_icon"]').val(id);
    $('#img_icon').attr('src',"<?php echo base_url('assets/uploads/icon/')?>"+val);
    $('#nama_icon').text(nama);
    $('#img_icon').show();
    $('#nama_icon').show();
  }

</script>
