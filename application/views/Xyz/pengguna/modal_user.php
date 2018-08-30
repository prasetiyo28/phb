<div id="modal_add_user2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/Xyz/insert_user">
				<div class="card">
					<div class="card-head style-primary">
						<header>Tambah pengguna</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
          <div class="card-body">
              <input type="hidden" name="not_api" value="0">
              <input type="hidden" class="form-control" name="nik">
              <input type="hidden" class="form-control" name="jk">
              <input type="hidden" class="form-control" name="nama">
              <input type="hidden" class="form-control" name="tmpt_lahir">
              <input type="hidden" class="form-control" name="tgl_lahir">
              <input type="hidden" class="form-control" name="pendidikan">
              <input type="hidden" class="form-control" name="alamat">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="telp" required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true">
                  <label for="Nama">Telepon</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" required data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true" required data-rule-email="true">
                  <label for="Nama">Email</label>
                </div>
              </div>
            </div>
            <div>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="1" checked><span>Petani</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="2"><span>Petambak</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="3"><span>Peternak</span>
              </label>

            </div>

  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="button" class="btn btn-flat btn-warning ink-reaction" onclick="batal()">BATAL</button>
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">Buat Akun</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>



<div id="modal_add_user1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/Xyz/insert_user">
				<div class="card">
					<div class="card-head style-primary">
						<header>Tambah pengguna</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class="form-group">
              <input type="hidden" name="not_api" value="1">
              <input type="text" class="form-control" name="nik" readonly="true">
              <label for="Nama">NIK</label>
            </div>
            <div>
              <label class="radio-inline radio-styled">
                <input type="radio" name="jk" value="L" checked><span>Laki-laki</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="jk" value="P"><span>Perempuan</span>
              </label>
            </div>
            <br>
            <div class="form-group">
              <input type="text" class="form-control alphaonly" name="nama" required>
              <label for="Nama">Nama</label>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="tmpt_lahir" required>
                  <label for="Nama">Tempat Lahir</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group" >
                  <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir1" required>
                  <label for="Nama">Tanggal Lahir</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="number" class="form-control" name="telp" required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true">
                  <label for="Nama">Telepon</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" required data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true" required data-rule-email="true">
                  <label for="Nama">Email</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <select class="form-control" id="opt_pendidikan" name="pendidikan" required>
                <option value="0">Tidak sekolah</option>
                <option value="1">SD/Sederajat</option>
                <option value="2">SLTP/Sederajat</option>
                <option value="3">SLTA/Sederajat</option>
                <option value="4">D3</option>
                <option value="5">S1/Sederajat</option>
                <option value="6">S2/Sederajat</option>
                <option value="7">S3/Sederajat</option>
              </select>
              <label for="Nama">Pendidikan Terakhir</label>
            </div>
            <div class="form-group">
              <textarea name="alamat" class="form-control" required ></textarea>
              <label for="Nama">Alamat</label>
            </div>
            <div>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="1" checked><span>Petani</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="2"><span>Petambak</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="pekerjaan" value="3"><span>Peternak</span>
              </label>

            </div>

  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="button" class="btn btn-flat btn-warning ink-reaction" onclick="batal()">BATAL</button>
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">Buat Akun</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>

<div id="modal_add_user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
        <form class="form form-validate" method="post" id="form_add_user">
									<div class="card">
										<div class="card-body">
                      <div class="form-group" id="cari_nik">
												<input type="number" class="form-control" id="nik">
												<label for="nik">Masukkan NIK</label>
												<span class="" id="cari_nik_icon"></span>
                        <p class="help-block" id="cari_nik_p"></p>

                        <input type="hidden" id="nama" value="">
                        <input type="hidden" id="jk" value="">
                        <input type="hidden" id="tmpt_lahir" value="">
                        <input type="hidden" id="tgl_lahir" value="">
                        <input type="hidden" id="agama" value="">
                        <input type="hidden" id="pendidikan" value="">
                        <input type="hidden" id="alamat" value="">
											</div>

                      <div class="preload1 text-center" style="display:none;">
      									<img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
      									<p class="preload-text"></p>
      								</div>
                      <blockquote id="pesan_nik" style="display:none;">
											<p>Gunakan NIK ini untuk akun baru ?</p>
										</blockquote>

                      <div>
                        <ul class="list">

      											<li class="tile" id="got_user" style="display:none;">
      												<a class="tile-content ink-reaction" href="#">
      													<div class="tile-icon">
                                  <img id="uploadPreviewsp2" src="<?= base_url()?>/assets/img/avatar4.jpg?1404026791" alt="">
      													</div>
                                <div class="tile-text" >
                                  <h4 class="text-bold" id="text_nama"></h4>
                                  <small id="text_email"></small>
                                </div>
                              </a>
      											</li>

                            <li class="tile" id="got_people"  style="display:none;">
      												<a class="tile-content ink-reaction">
      													<div class="tile-icon">
      														<i class="fa fa-user"></i>
      													</div>
      													<div class="tile-text">
                                  <h4 class="text-bold" id="text_nama1"></h4>
                                  <small id="text_email1"></small>
      													</div>
      												</a>
      											</li>
										    </ul>
                      </div>

										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                        <button type="button" class="btn btn-flat btn-warning ink-reaction" onclick="batal()">BATAL</button>
												<button type="button" class="btn btn-flat btn-primary ink-reaction" id="btn_cek" >CEK</button>
                        <button type="button" class="btn btn-flat btn-danger ink-reaction" id="btn_clear" style="display:none;">BERSIHKAN</button>
                        <button type="button" class="btn ink-reaction btn-raised btn-primary" id="btn_next" style="display:none;">BUAT AKUN</button>
											</div>
										</div><!--end .card-actionbar -->
									</div><!--end .card -->
								</form>
</div>
</div>
