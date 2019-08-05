<div id="content">


  <section>
  <div class="section-body">
    <br><br><br><br>
        <div class="container">
          <div class="col-md-12 col-xs-12">
            <div class="card">
              <img class="img-circle img-responsive auto-width" style="max-width:125px;left: 50%; transform: translate(-50%,0); position: absolute; z-index: 10;top: -80px;border: 5px solid #ffffff;" src="<?php echo base_url('assets/uploads').'/'.$foto ?>" alt="" />
              <div style="position: absolute;left: 53%; z-index: 20;">
                <a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Ganti Foto" onclick="modal_foto()"><i class="fa fa-camera" ></i></a>
              </div>
              <div class="card-body">
                <h2 class="text-center">Profil</h2>
                <br><br>
                <div class="col-md-6">
                  <h4>Personal Info</h4>
                  <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo base_url('Admin/update_info_profil') ?>">
                    <div class="form-group">
                      <input type="text" value="<?php echo $data->nama ?>" class="form-control alphaonly"  name="nama"  required >
                      <label>Nama</label>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" value="<?php echo $data->telp ?>" class="form-control"  name="telp" required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true">
                      <label>Telepon</label>
                    </div>
                    <div class="form-group">
                      <input type="text" value="<?php echo $data->email ?>" class="form-control"  name="email" required data-rule-email="true" data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true">
                      <label>Email</label>
                    </div>
                    <div class="form-group">
                      <select class="form-control select2-list" name="id_prov" required >
                        <option value="<?php echo $data->id_prov ?>"><?php echo tampil_prov($data->id_prov) ?></option>
                        <?php foreach($prov as $row) { ?>
                          <option value="<?php echo $row->id_prov; ?>"><?php echo $row->nama; ?></option>
                          <?php } ?>
                      </select>
                      <label for="Password">Provinsi</label>
                    </div>
                    <div class="form-group">
                      <select class="form-control select2-list" name="id_kab" required >
                        <option value="<?php echo $data->id_kab ?>"><?php echo tampil_kab($data->id_kab) ?></option>
                      </select>
                      <label for="Password">Kota</label>
                    </div>
                    <button  type="submit" class="btn ink-reaction btn-raised btn-primary btn-block"><i class="md md-save" ></i> Simpan</button>

                  </form>

                </div>
                <div class="col-md-6">
                  <h4>Konfigurasi Akun</h4>

                  <form class="form form-validate" novalidate="novalidate" method="post" action="<?php echo $url ?>">
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="text" class="form-control" name="username" required value="<?php echo $username ?>" data-rule-minlength="6" required data-rule-duplicatUser="true" required data-rule-duplicatAdmin="true">
                      <label for="Username">Username</label>
                    </div>
                    <div class="form-group">
                      <input type="password" id="password1" class="form-control" name="password" data-rule-minlength="6">
                      <label for="Password">Password</label>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password1" data-rule-equalTo="#password1">
                      <label for="Password">Ketik Ulang Password</label>
                    </div>
                    <button  type="submit" class="btn ink-reaction btn-raised btn-primary btn-block"><i class="md md-save" ></i> Simpan</button>

                	</form>
                </div>

              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
          <div class="col-md-12 col-xs-12">
            <div class="card">
              <div class="card-body">
                <h2 class="text-center">Log Aktifitas</h2>
                <br><br>
                <table id="tbl_pengguna" class="table table-striped table-hover dataTable no-footer" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>
                      <th>Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach ($log as $p): $no++;?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $p->keterangan ?></td>
                      <td><?php echo $p->date ?></td>
                    </tr>
                  <?php endforeach; ?>

                  </tbody>
                </table>

              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
        </div>




  </div><!--end .section-body -->
</section>
</div>


<div id="viewcanvas"></div>
<?php $this->load->view('Admin/pengguna/modal_akun') ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#tbl_pengguna').dataTable({
    "dom": 'T<"clear">lfrtip',
       "tableTools": {
           "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
       }
  });

		$('[name="id_prov"]').change(function (){
					var url = "<?php echo base_url('Auth/ajax_kabupaten');?>/"+$(this).val();
					$('[name="id_kab"]').load(url);
					return false;
		});
});
$(function() {

  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>
  <?php if ($this->session->flashdata('gagal')==true) {
    echo $this->session->flashdata('alert');
  } ?>



        $.validator.addMethod("duplicatUser", function(value,element) {
          var balik1;
          var data = new FormData();
          data.append('text', value);
          $.ajax(
            {
              type: "POST",
              data: data,
              async: false,
              processData: false,
              contentType: false,
              url: "<?php echo base_url('Auth/find_username_duplicat_user/'); ?>",
              success: function(data)
            {
              if (data=="1") {
                  balik1= false;
                }else {
                  balik1= true;
                }
              },
            error:function(data)
           {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
          });
          return balik1;

        }, $.validator.format("Username sudah digunakan."));

        $.validator.addMethod("duplicatAdmin", function(value,element) {
          var balik2;
          var data = new FormData();
          data.append('text', value);
          data.append('id', '<?php echo $id ?>');

          $.ajax(
            {
              type: "POST",
              data: data,
              async: false,
              processData: false,
              contentType: false,
              url: "<?php echo base_url('Auth/find_username_duplicat_admin/'); ?>",
              success: function(data)
            {
              if (data=="1") {
                  balik2= false;
                }else {
                  balik2= true;
                }
              },
            error:function(data)
           {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
          });
          return balik2;

        }, $.validator.format("Username sudah digunakan."));

        $.validator.addMethod("duplicatEmailUser", function(value,element) {
          var balik3;
          var data = new FormData();
          data.append('text', value);
          $.ajax(
            {
              type: "POST",
              data: data,
              async: false,
              processData: false,
              contentType: false,
              url: "<?php echo base_url('Auth/find_duplicat_email_user/'); ?>",
              success: function(data)
            {
              if (data=="1") {
                  balik3= false;
                }else {
                  balik3= true;
                }
              },
            error:function(data)
           {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
          });
          return balik3;

        }, $.validator.format("Email sudah digunakan."));
        $.validator.addMethod("duplicatEmailAdmin", function(value,element) {
          var balik4;
          var data = new FormData();
          data.append('text', value);
          data.append('id', '<?php echo $id ?>');

          $.ajax(
            {
              type: "POST",
              data: data,
              async: false,
              processData: false,
              contentType: false,
              url: "<?php echo base_url('Auth/find_duplicat_email_admin/'); ?>",
              success: function(data)
            {
              if (data=="1") {
                  balik4= false;
                }else {
                  balik4= true;
                }
              },
            error:function(data)
           {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
          });
          return balik4;

        }, $.validator.format("Email sudah digunakan."));
})
$(function() {
  $("[name='telp']").inputmask("9999-9999-9999");

  $.validator.addMethod("duplicatPhoneUser", function(value,element) {
    var balik6;
    var data = new FormData();
    data.append('text', value);
    data.append('id', '<?php echo $id ?>');
    $.ajax(
      {
        type: "POST",
        data: data,
        async: false,
        processData: false,
        contentType: false,
        url: "<?php echo base_url('Auth/find_duplicat_phone_user/'); ?>",
        success: function(data)
      {
        if (data=="1") {
            balik6= false;
          }else {
            balik6= true;
          }
        },
      error:function(data)
     {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
    });
    //return this.optional(element) || /^-?\d+$/.test(value);
    return balik6;

  }, $.validator.format("Nomor telepon sudah digunakan."));
  $.validator.addMethod("duplicatPhoneAdmin", function(value,element) {
    var balik7;
    var data = new FormData();
    data.append('text', value);
    data.append('id', '<?php echo $id ?>');
    $.ajax(
      {
        type: "POST",
        data: data,
        async: false,
        processData: false,
        contentType: false,
        url: "<?php echo base_url('Auth/find_duplicat_phone_Admin/'); ?>",
        success: function(data)
      {
        if (data=="1") {
            balik7= false;
          }else {
            balik7= true;
          }
        },
      error:function(data)
     {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
    });
    //return this.optional(element) || /^-?\d+$/.test(value);
    return balik7;

  }, $.validator.format("Nomor telepon sudah digunakan."));


})

function modal_foto() {
    $('#modal_foto').modal('show');
}
</script>
