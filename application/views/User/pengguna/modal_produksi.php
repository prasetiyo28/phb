<div id="modal_produksi_panen" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url('User/konfirmasi_panen') ?>">
				<div class="card">
					<div class="card-head style-primary">
						<header>Konfirmasi Panen</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class=" alert alert-callout alert-info" role="alert">
                <img src="<?php echo base_url() ?>assets/img/tepuk.gif" alt="" style="width:60px;">
                <div class="col-sm-10">
                  <strong>SELAMAT!</strong> Akhirnya hari yang di tunggu sudah tiba! Isi form di bawah untuk menyelesaikan panen anda.
                </div>
    				</div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="hidden" name="id_produksi">
                  <input type="text" class="form-control" name="tgl_panen" required>
                  <label>Tanggal Panen</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="jml_panen" required required data-rule-digits="true">
                      <label>Jumlah Panen</label>
                    </div>
                    <span class="input-group-addon">Kg</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="harga_perkilo_panen" required required data-rule-digits="true">
                      <label>Harga Panen perkilo / ekor</label>
                    </div>
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="nilai_panen" required required data-rule-digits="true">
                      <label>Total Hasil Panen</label>
                    </div>
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <textarea name="ket" class="form-control" required data-rule-badWords="true"></textarea>
              <label>Keterangan</label>
            </div>

  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">KIRIM</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>

<div id="modal_produksi_gagal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url('User/konfirmasi_gagal') ?>">
				<div class="card">
					<div class="card-head style-primary">
						<header>Konfirmasi Panen</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class=" alert alert-callout alert-info" role="alert">
                <img src="<?php echo base_url() ?>assets/img/masa.gif" alt="" style="width:60px;">
                <div class="col-sm-10">
                  <strong>Yakin?</strong> Apa anda yakin panen telah gagal?. Ceritakan alasan anda di bawah ini.
                </div>
    				</div>
            <div class="form-group">
              <textarea name="ket" class="form-control" rows="3" required data-rule-badWords="true"></textarea>
              <label>Ceritakan alasannya</label>
            </div>
            <h4>Pada akhirnya apa yang didapat?</h4>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="hidden" name="id_produksi1">
                  <input type="text" class="form-control" name="tgl_panen" required>
                  <label>Tanggal Panen</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="jml_panen" required required data-rule-digits="true">
                      <label>Jumlah Panen</label>
                    </div>
                    <span class="input-group-addon">Kg</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="harga_perkilo_panen" required required data-rule-digits="true">
                      <label>Harga Panen perkilo / ekor</label>
                    </div>
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <div class="input-group-content">
                      <input type="text" class="form-control" name="nilai_panen" required required data-rule-digits="true">
                      <label>Total Hasil Panen</label>
                    </div>
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
            </div>



  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">KIRIM</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>

<div id="modal_selamat_panen" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
				<div class="card">
          <div class="card-head style-primary">
						<header class="text-center">SELAMAT PRODUKSI ANDA TELAH PANEN ! </header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class="text-center">
              <img src="<?php echo base_url() ?>assets/img/selamat.gif" alt="" width="200px">
            </div>
            <br>
            <blockquote>
							<p>Semoga hasil panen yang di dapat menjadi barokah dan panen mendatang akan lebih baik dari panen ini.</p>
							<footer>Admin</footer>
						</blockquote>

  				</div><!--end .card-body -->
        </div><!--end .card -->
  </div>
</div>
<div id="modal_sedih_panen" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
				<div class="card">
          <div class="card-head style-primary">
						<header class="text-center">TURUT BERDUKA</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class="text-center">
              <img src="<?php echo base_url() ?>assets/img/sedih.gif" alt="" width="200px">
            </div>
            <br>
            <blockquote>
							<p>Semoga panen mendatang akan lebih baik dari panen ini. Tetap semangat ! Kehidupan kita seperti roda, kadang diatas kadang dibawah, serahkan saja semuanya kepada Tuhan YME.</p>
							<footer>Admin</footer>
						</blockquote>

  				</div><!--end .card-body -->
        </div><!--end .card -->
  </div>
</div>

<script type="text/javascript">
$(function () {
  $('[name="tgl_panen"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
})
</script>
