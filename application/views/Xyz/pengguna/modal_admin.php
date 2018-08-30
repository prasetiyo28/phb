<div id="modal_add_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form class="form form-validate" id="form_add_admin" novalidate="novalidate" method="post" action="<?php echo base_url() ?>/Xyz/insert_admin">
				<div class="card">
					<div class="card-head style-primary">
						<header>Tambah admin</header>
            <div class="tools">
              <div class="btn-group">
                <a class="btn btn-icon-toggle" data-dismiss="modal"><i class="md md-close"></i></a>
              </div>
            </div>
					</div>
					<div class="card-body">
            <div class="form-group">
              <input type="text" class="form-control alphaonly" name="nama" required>
              <label for="Nama">Nama</label>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="telp" required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true">
                  <label for="Telepon">Telepon</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" required data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true" required data-rule-email="true">
                  <label for="Email">Email</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="username" required>
                  <label for="Username">Username</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="password" class="form-control" name="password" required>
                  <label for="Password">Password</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control select2-list" name="id_prov" required>
                    <option value=""></option>
                    <?php foreach($prov as $row) { ?>
                      <option value="<?php echo $row->id_prov; ?>"><?php echo $row->nama; ?></option>
                      <?php } ?>
                  </select>
                  <label for="Provinsi">Provinsi</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control select2-list" name="id_kab" required>
                  </select>
                  <label for="Kabupaten">Kabupaten</label>
                </div>
              </div>
            </div>
            <div>
              <label class="radio-inline radio-styled">
                <input type="radio" name="bidang" value="1" checked><span>Pertanian</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="bidang" value="2"><span>Perikanan</span>
              </label>
              <label class="radio-inline radio-styled">
                <input type="radio" name="bidang" value="3"><span>Peternakan</span>
              </label>

            </div>

  				</div><!--end .card-body -->
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-flat btn-primary ink-reaction">Buat Akun</button>
            </div>
          </div>
        </div><!--end .card -->
  	</form>
  </div>
</div>
