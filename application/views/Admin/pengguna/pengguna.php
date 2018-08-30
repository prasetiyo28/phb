<div id="content">
  <section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li class="active">Pengguna</li>
						</ol>
					</div>
					<div class="section-body">
						<div class="card">

							<!-- BEGIN SEARCH HEADER -->
							<div class="card-head style-primary">
								<div class="tools pull-left">
									<form class="navbar-search" role="search" method="post" id="form_cari1">
										<div class="form-group">
											<input type="text" class="form-control" id="value_cari1" name="value_cari1" placeholder="Cari Nama">
										</div>
										<button type="button" class="btn btn-icon-toggle ink-reaction" id="search1"><i class="fa fa-search"></i></button>
									</form>

								</div>
								<div class="tools">
									<a class="btn btn-floating-action btn-default-light" href="javascript:void(0)" data-toggle="modal" data-target="#modal_add_user" id="btn_add_user"><i class="fa fa-plus"></i></a>
								</div>
							</div><!--end .card-head -->
							<!-- END SEARCH HEADER -->
              <div class="card-body">
								<div class="row">
              <!-- BEGIN SEARCH NAV -->
									<div class="col-sm-4 col-md-3 col-lg-2">
										<ul class="nav nav-pills nav-stacked">
											<li><small>Kategori</small></li>
											<li id="user"><a href="javascript:void(0)" >Pengguna <small class="pull-right text-bold opacity-75"><?php echo total_user_foradmin() ?></small></a></li>
											<li class="hidden-xs"><small>Keterangan</small></li>
											<li class="hidden-xs">
												<ul class="nav nav-pills nav-stacked nav-icon">
                          <li><a href="#"><i class="fa fa-dot-circle-o text-info"></i>Baru</a></li>
                          <li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i>Diblokir</a></li>
												</ul>
											</li>
										</ul>
									</div><!--end .col -->
									<!-- END SEARCH NAV -->

									<div class="col-sm-8 col-md-9 col-lg-10">

										<!-- BEGIN SEARCH RESULTS LIST -->
                    <div class="preload text-center" style="display:none;">
                      <br><br><br>
                      <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
                      Memuat...
                    </div>
                    <div id="viewdata" style="display:none;">

                    </div>
										<!-- BEGIN SEARCH RESULTS PAGING -->
									</div><!--end .col -->
								</div><!--end .row -->
							</div><!--end .card-body -->
							<!-- END SEARCH RESULTS -->

						</div><!--end .card -->
					</div><!--end .section-body -->
				</section>
</div>

<div id="viewcanvas"></div>

<?php $this->load->view('Admin/pengguna/modal_user'); ?>
<script type="text/javascript">
var sort;
var find;
var find_value;

$(document).ready(function(){
    $('[name="id_prov"]').change(function (){
          var url = "<?php echo base_url('Admin/ajax_kabupaten');?>/"+$(this).val();
          $('[name="id_kab"]').load(url);
          return false;
        });

});

$(function() {
  toastr.options.positionClass = 'toast-bottom-left';
  <?php if ($this->session->flashdata('alert')==true) {
    echo $this->session->flashdata('alert');
  } ?>

  $('#tgl_lahir1').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
  $('.preload').show();
  loadUser(1,0,0);
  $('#user').click(function() {
    $('.preload').show();
    $("#viewdata").hide();
    loadUser(1,0,0);
    $('#form_cari1').show();
    $('#form_cari2').hide();
    $('#btn_add_user').show();
    $('#btn_add_admin').hide();
  });
  $('#btn_add_user').click(function() {
  $('#form_add_user')[0].reset();
  $('#cari_nik').removeClass('has-error has-success has-feedback');
  $('#cari_nik_icon').removeClass('glyphicon glyphicon-remove glyphicon-ok form-control-feedback');
  $('#cari_nik_p').text('');
  $('#btn_cek').show();
  $('#btn_clear').hide();
  $('#btn_next').hide();
  $('#got_user').hide();
  $('#got_people').hide();
  $('#pesan_nik').hide();
  $('#btn_clear').text('BERSIHKAN');
  });
});
function loadUser(a,b,c) {
$('.preload').show();
$('#user').addClass("active");
$('#admin').removeClass();
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/user'); ?>"
    }
  ).done(function( data )
  {
    sort= a;
    find = b;
    find_value = c;
    $('#viewdata').html(data);
    $("#viewdata").show('slow');
    $('.preload').hide();
  });
}
$(function() {
  $("[name='telp']").inputmask("9999-9999-9999");

  $.validator.addMethod("duplicatPhoneUser", function(value,element) {
    var balik6;
    var data = new FormData();
    data.append('text', value);
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
  $.validator.addMethod("duplicatEmailAdmin", function(value,element) {
    var balik4;
    var data = new FormData();
    data.append('text', value);
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
    //return this.optional(element) || /^-?\d+$/.test(value);
    return balik4;

  }, $.validator.format("Email sudah digunakan."));
  $.validator.addMethod("duplicatEmailUser", function(value,element) {
    var balik5;
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
            balik5= false;
          }else {
            balik5= true;
          }
        },
      error:function(data)
     {alert("Terjadi kesalahan!!! Coba lagi. Cek setiap inputan");}
    });
    //return this.optional(element) || /^-?\d+$/.test(value);
    return balik5;

  }, $.validator.format("Email sudah digunakan."));

})
</script>
