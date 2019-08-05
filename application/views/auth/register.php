<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemetaan Hasil Bumi - Register</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<!-- END STYLESHEETS -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/select2/select2.css?1424887856" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/wizard/wizard.css?1425466601" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />
		<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<style type="text/css">
		.map-wrapper {
		position: relative;
		height: 20em;
		width: 100%;
		}

		#map {
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		}
		</style>
		<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCz1LkOZmWBZRyC1WUJcrOqZiK-7yMuQXk&libraries=places'></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed">
		<?php if ($this->session->flashdata('sukses')==true): ?>
		<section class="section-account" id="section_message">
			<div class="spacer"></div>
			<div class="card contain-xs">
				<div class="card-head">
					<div class="img-backdrop" style="background-image: url('<?php echo base_url();?>assets/img/img16.jpg')"></div>
					<div class="clearfix">
					</div>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-xs-12">
							<br/><br/><br/>
							<h3 class="text-center">TERIMAKASIH</h3>
							<h4 class="text-center text-primary">
								<?php echo $this->session->flashdata('sukses') ?>
							</h4>
							<p class="text-justify">Anda telah terdaftar di aplikasi kami. Silahkan <a href="<?php echo base_url('Auth') ?>" class="text-primary">login</a> menggunakan email dan password yang telah di inputkan sebelumnya.</p>

						</div><!--end .col -->

							</div><!--end .row -->
						</div><!--end .card-body -->
						<div class="card-actionbar">
						</div>
					</div><!--end .card -->
				</section>
				<script type="text/javascript">
					$(function() {
						$('#section_find').hide();
						$('#section_form').hide();
					})
				</script>
			<?php endif; ?>


		<section class="section-account" id="section_find">
			<div class="spacer"></div>
			<div class="card contain-xs">
				<div class="card-head">
					<div class="img-backdrop" style="background-image: url('<?php echo base_url();?>assets/img/img16.jpg')"></div>
					<div class="clearfix">
					</div>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<br/>
							<span class="text-lg text-bold text-primary">PEMETAAN HASIL BUMI</span>
							<br/><br/><br/>
							<form class="form floating-label form-validate" novalidate="novalidate" method="post" id="form_add_user">
								<div class="form-group" id="cari_nik">
									<input type="number" value="" class="form-control" id="nik" required>
									<label for="phone">NIK</label>
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

								<div class="preload text-center" style="display:none;">
									<img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
									<p class="preload-text"></p>
								</div>

								<blockquote id="pesan_nik" style="display:none;">
								<p>Gunakan NIK ini untuk akun baru ?</p>
							</blockquote>
								<div class="row">
									<ul class="list">

											<li class="tile" id="got_user" style="display:none;">
												<a class="tile-content ink-reaction" href="#">
													<div class="tile-icon">
														<img src="<?= base_url()?>/assets/img/avatar4.jpg?1404026791" alt="">
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
								</div><!--end .row -->
							</form>

						</div><!--end .col -->

							</div><!--end .row -->
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="btn_cek" >CEK</button>
								<button type="button" class="btn btn-flat btn-danger ink-reaction" id="btn_clear" style="display:none;">BERSIHKAN</button>
								<button type="button" class="btn btn-flat btn-success ink-reaction" id="btn_next" style="display:none;">BUAT AKUN</button>
							</div>
						</div>
					</div><!--end .card -->
				</section>





		<section class="section-account" id="section_form" style="display:none;">
			<div class="spacer"></div>
			<div class="card contain-sm">
				<div class="card-body">
					<!-- BEGIN VALIDATION FORM WIZARD -->
					<div class="row">
						<div class="col-lg-12">
									<div id="rootwizard2" class="form-wizard form-wizard-horizontal" >
										<form id="form_wizard" class="form form-validation" role="form" novalidate="novalidate" method="post" action="<?php echo base_url()?>Auth/add_user" enctype="multipart/form-data" >
											<div class="form-wizard-nav">
												<div class="progress"><div class="progress-bar progress-bar-primary"></div></div>
												<ul class="nav nav-justified">
													<li class="active"><a href="#step1" data-toggle="tab"><span class="step">1</span> <span class="title">PERSONAL</span></a></li>
													<li><a href="#step2" data-toggle="tab"><span class="step">2</span> <span class="title">ALAMAT</span></a></li>
													<li><a href="#step3" data-toggle="tab"><span class="step">3</span> <span class="title">AKUN</span></a></li>
													<li><a href="#step4" data-toggle="tab"><span class="step">4</span> <span class="title">KONFIRMASI</span></a></li>
												</ul>
											</div><!--end .form-wizard-nav -->
											<br><br>
											<div class="tab-content clearfix">
												<div class="tab-pane active" id="step1">
													<div class="form-group">
														<input type="text" name="nik1" class="form-control" data-rule-minlength="16" data-rule-digits="true" required>
														<input type="hidden" name="not_api" value="0">
														<input type="hidden" name="nik" value="">
														<label for="nama" class="control-label">NIK</label>
													</div>
													<div class="form-group">
														<input type="text" name="nama" class="form-control alphaonly" data-rule-minlength="3" data-rule-badWords="true" required>
														<label for="nama" class="control-label">Nama</label>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" name="tmpt_lahir" class="form-control" data-rule-minlength="2" data-rule-badWords="true" required>
																<label for="tmpt_lahir" class="control-label">Tempat Lahir</label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" name="tgl_lahir" class="form-control" data-rule-minlength="2" data-rule-badWords="true" required>
																<label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" name="telp" class="form-control"  data-rule-badWords="true"  required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true">
																<label for="telp" class="control-label">Telepon</label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<select class="form-control select2-list" id="opt_pendidikan" name="pendidikan" required>
																	<option value="0">Tidak sekolah</option>
																	<option value="1">SD/Sederajat</option>
																	<option value="2">SLTP/Sederajat</option>
																	<option value="3">SLTA/Sederajat</option>
																	<option value="4">D3</option>
																	<option value="5">S1/Sederajat</option>
																	<option value="6">S2/Sederajat</option>
																	<option value="7">S3/Sederajat</option>
																</select>
																<label for="pendidikan" class="control-label">Pendidikan Terakhir</label>
															</div>
														</div>
													</div>
													<div>
														<label class="radio-inline radio-styled">
															<input type="radio" name="jk" value="L" checked><span>Laki-laki</span>
														</label>
														<label class="radio-inline radio-styled">
															<input type="radio" name="jk" value="P"><span>Perempuan</span>
														</label>													</div>
												</div><!--end #step1 -->
												<div class="tab-pane" id="step2">
													<br/><br/>
													<div class="form-group">
														<input type="text" name="alamat"  class="form-control" required data-rule-badWords="true">
														<label class="control-label">Alamat</label>
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
																<label class="control-label">Provinsi</label>
															</div>
															<div class="form-group">
																<select class="form-control select2-list" name="id_kab" required>
							                  </select>
																<label class="control-label">Kabupaten</label>
															</div>
															<div class="form-group">
																<select class="form-control select2-list" name="id_kec" required>
																</select>
																<label class="control-label">Kecamatan</label>
															</div>
															<div class="form-group">
																<select class="form-control select2-list" name="id_desa" required>
							                  </select>
																<label class="control-label">Kota/Desa</label>
															</div>
														</div>
														<div class="col-sm-6">
															<div id="map" class="map-wrapper"></div>
															<input type="text" name="lt" id="lat" value="">
															<input type="text" name="lg" id="lng" value="">
														</div>

													</div>


												</div><!--end #step2 -->
												<div class="tab-pane" id="step3">
													<br/><br/>
													<div class="form-group">
														<input type="email" name="email"  class="form-control" data-rule-email="true" required data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true">
														<label for="email" class="control-label">Email</label>
													</div>
													<div class="form-group">
														<input type="password" name="password1" id="password1" class="form-control" required="" data-rule-minlength="6">
														<label for="password1" class="control-label">Password</label>
													</div>
													<div class="form-group">
														<input type="password" name="password2" class="form-control" required data-rule-equalto="#password1">
														<label for="password2" class="control-label">Ulangi Password</label>
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
												</div><!--end #step3 -->
												<div class="tab-pane" id="step4">
													<br/><br/>

													<div class="row">
														<div class="col-sm-6">
															<div id="div_alert">
															<div class="form-group ">
																<center>
																	<img id="uploadPreviewsp" src="<?php echo base_url('assets/img/avatar.png')?>" class="img-responsive img-circle" style="right: 9em;" alt="User profile picture" style="max-width: 200px;max-height: 200px;">
																	<div class="btn ink-reaction btn-raised btn-primary">
																		<center>
																		<i class="fa fa-paperclip fa-lg"></i> <span id="filename">FOTO</span>
																		<input type="file" id="img" name="img" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="PreviewImagesp();" >
																	</center>
																 </div>
																 <br>
																 <span class="text-danger" id="s"></span>

															 </center>

															 <input type="hidden" id="parm" name="parm">
														 </div>
														</div>
														</div>


													<div class="col-sm-6 ">
														<div id="div_alert1">
															<div class="form-group ">
																<center>
																	<img id="uploadPreviewsp1" src="<?php echo base_url('assets/img/ktp.jpg')?>" class="img-responsive img-circle" style="right: 9em;" alt="User profile picture" style="max-width: 200px;max-height: 200px;">
																	<div class="btn ink-reaction btn-raised btn-primary">
																		<center>
																		<i class="fa fa-paperclip fa-lg"></i> <span id="filename1">KTP</span>
																		<input type="file" id="img1" name="img1" value="" style=" position: absolute;top: 0;right: 0;left: 0;bottom: 0;width: 100%;margin: 0;padding: 0;font-size: 20px;cursor: pointer;opacity: 0;filter: alpha" onchange="PreviewImagesp1();">
																	</center>
																 </div>
																 <br>
																 <span class="text-danger" id="s1"></span>

															 </center>

															 <input type="hidden" id="parm1" name="parm1">
														 </div>
														</div>
													</div>
													</div>
													<div class="form-group">
													<div class="checkbox">
														<label class="checkbox">
															<input type="checkbox" id="terms" name="terms" required onclick="submitOn()"> Saya menyetujui <a href="<?php echo base_url('Frontend/terms') ?>" class="text-primary"  target="_blank" >syarat & kebijakan</a> yang berlaku.
														</label>
													</div>
												</div>
												</div><!--end #step4 -->
											</div><!--end .tab-content -->
											<ul class="pager wizard" id="pager_wizard">
												<li class="previous first"><a class="btn-raised" href="javascript:void(0);">Awal</a></li>
												<li class="previous"><a class="btn-raised" href="javascript:void(0);">Sebelumnya</a></li>
												<!-- <li class="next last"><a class="btn-raised" href="javascript:void(0);">Last</a></li> -->
												<li class="next"><a class="btn-raised" href="javascript:void(0);">Selanjutnya</a></li>
											</ul>
											<button type="submit" class="btn btn-raised btn-primary btn-block" id="btn_submit" style="display:none;"> DAFTAR</button>
										</form>
									</div><!--end #rootwizard -->
						</div><!--end .col -->
					</div><!--end .row -->
					<!-- END VALIDATION FORM WIZARD -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script type="text/javascript">
				function PreviewImagesp() {
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("img").files[0]);
					oFReader.onload = function (oFREvent)
					{
						document.getElementById("uploadPreviewsp").src = oFREvent.target.result;
					};
					var filename = $('#img').val().replace(/.*(\/|\\)/, '');
					$('#filename').text(filename);
					if (filename!="") {
						var ext =filename.split('.').pop().toLowerCase();
						 switch(ext) {
						 case 'jpg':
						 case 'png':
						 case 'jpeg':
							$('#parm').val('1');
							$('#div_alert').removeClass('card card-outlined style-danger');
							$('#s').text('');

						 break;
						 default:
						 $('#div_alert').addClass('card card-outlined style-danger');
						 $('#s').text('Harap masukkan ekstensi yang benar.');
				 		 }

					}else {
						$('#parm').val('');
					}
				}
				function PreviewImagesp1() {
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("img1").files[0]);
					oFReader.onload = function (oFREvent)
					{
						document.getElementById("uploadPreviewsp1").src = oFREvent.target.result;
					};
					var filename = $('#img1').val().replace(/.*(\/|\\)/, '');
					$('#filename1').text(filename);
					if (filename!="") {
						var ext =filename.split('.').pop().toLowerCase();
						 switch(ext) {
						 case 'jpg':
						 case 'png':
						 case 'jpeg':
							$('#parm1').val('1');
							$('#div_alert1').removeClass('card card-outlined style-danger');
							$('#s1').text('');

						 break;
						 default:
						 $('#div_alert1').addClass('card card-outlined style-danger');
						 $('#s1').text('Harap masukkan ekstensi yang benar.');
				 		 }
					}else {
						$('#parm1').val('');
					}
				}

				function submitOn() {
					if ($('#parm').val()==''||$('#parm1').val()=='') {
						$('#div_alert').addClass('card card-outlined style-danger');
						$('#div_alert1').addClass('card card-outlined style-danger');
						$('#s').text('Isian ini harus di isi.');
						$('#s1').text('Isian ini harus di isi.');
						$( "#terms").prop('checked', false);

					}else {
						if ($('#terms').is(':checked')) {
							$('#btn_submit').show('slow');
							$('#pager_wizard').hide();
							$('#div_alert').removeClass('card card-outlined style-danger');
							$('#div_alert1').removeClass('card card-outlined style-danger');
							$('#s').text('');
							$('#s1').text('');

						}else {
							$('#btn_submit').hide();
							$('#pager_wizard').show();
						}
					}
				}
				//Set up some of our variables.
				var map; //Will contain map object.
				var marker = false; ////Has the user plotted their location marker?

				//Function called to initialize / create the map.
				//This is called when the page has loaded.
				function initMap() {

				    //The center location of our map.
						var centerOfMap = new google.maps.LatLng(-6.867428, 109.1357296);

				    //Map options.
				    var options = {
				      center: centerOfMap, //Set center.
				      zoom: 10 //The zoom value.
				    };

				    //Create the map object.
				    map = new google.maps.Map(document.getElementById('map'), options);

				    //Listen for any clicks on the map.
				    google.maps.event.addListener(map, 'click', function(event) {
				        //Get the location that the user clicked.
				        var clickedLocation = event.latLng;
				        //If the marker hasn't been added.
				        if(marker === false){
				            //Create the marker.
				            marker = new google.maps.Marker({
				                position: clickedLocation,
				                map: map,
				                draggable: true //make it draggable
				            });
				            //Listen for drag events!
				            google.maps.event.addListener(marker, 'dragend', function(event){
				                markerLocation();
				            });
				        } else{
				            //Marker has already been added, so just change its location.
				            marker.setPosition(clickedLocation);
				        }
				        //Get the marker's location.
				        markerLocation();
				    });
				}

				//This function will get the marker's current location and then add the lat/long
				//values to our textfields so that we can save the location.
				function markerLocation(){
				    //Get location.
				    var currentLocation = marker.getPosition();
				    //Add lat and lng values to a field that we can save.
				    document.getElementById('lat').value = currentLocation.lat(); //latitude
				    document.getElementById('lng').value = currentLocation.lng(); //longitude
				}


				//Load the map when the page has finished loading.
				google.maps.event.addDomListener(window, 'load', initMap);

				$(document).ready(function(){
				    $('[name="id_prov"]').change(function (){
				          var url = "<?php echo base_url('Auth/ajax_kabupaten');?>/"+$(this).val();
				          $('[name="id_kab"]').load(url);
				          return false;
				    });
						$('[name="id_kab"]').change(function (){
				          var url = "<?php echo base_url('Auth/ajax_kecamatan');?>/"+$(this).val();
				          $('[name="id_kec"]').load(url);
				          return false;
				    });
						$('[name="id_kec"]').change(function (){
				          var url = "<?php echo base_url('Auth/ajax_desa');?>/"+$(this).val();
				          $('[name="id_desa"]').load(url);
				          return false;
				    });

				});
					$(function() {
						$('[name="tgl_lahir"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});

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

						toastr.options.positionClass = 'toast-bottom-right';
						toastr.options.timeOut = 2000;
						<?php if ($this->session->flashdata('alert')==true) {
					    echo $this->session->flashdata('alert');
					  } ?>
						<?php if ($this->session->flashdata('alert_foto')==true) {
					    echo $this->session->flashdata('alert_foto');
					  } ?>
						<?php if ($this->session->flashdata('alert_ktp')==true) {
					    echo $this->session->flashdata('alert_ktp');
					  } ?>
						<?php if ($this->session->flashdata('message')==true) {
					    echo $this->session->flashdata('message');
					  } ?>
						<?php if ($this->session->flashdata('send')==true) {
					    echo $this->session->flashdata('send');
					  } ?>

						$('#btn_cek').click(function() {
					    $('#btn_cek').hide();
					    $('#btn_clear').show();
					    var nik = $('#nik').val();
							var pjg_nik = nik.length;
					    if (pjg_nik >= 16) {
									$('.preload').show();
									$('.preload-text').text('Mencari NIK...');
					      $.ajax(
					        {
					          type: "GET",
					          url: "<?php echo base_url('Auth/cek_nik'); ?>/"+nik,
					          dataType:"JSON"
					        }
					      ).done(function( data )
					      {
					        if (data.result==1) {
										$('.preload').hide();
					          $('#got_user').show();
					          $('#cari_nik').addClass('form-group has-error has-feedback');
					          $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
					          $('#cari_nik_p').text('Akun dengan NIK ini sudah ada.');
					          $('#text_nama').text(data.data.nama);
					          $('#text_email').text(data.data.email);
					          $('#btn_clear').text('BERSIHKAN');
					        }else {
					          $.ajax({
					            type:"GET",
					            url: "<?php echo base_url('Auth/api_nik'); ?>/"+nik,
					            dataType:"JSON"
					          }).done(function(data) {
					            if (data.result==1) {
												$('.preload').hide();
					              $('#got_people').show();
					              $('#cari_nik').addClass('form-group has-success has-feedback');
					              $('#cari_nik_icon').addClass('glyphicon glyphicon-ok form-control-feedback');
					              $('#cari_nik_p').text('Akun siap di buat.')
					              $('#text_nama1').text(data.data.NAMA);
					              $('#text_email1').text(data.data.ALAMAT);
					              $('#nama').val(data.data.NAMA);
					              $('#jk').val(data.data.JK);
					              $('#tmpt_lahir').val(data.data.TMPT_LHR);
					              $('#tgl_lahir').val(data.data.TGL_LHR);
					              $('#agama').val(data.data.AGAMA);
					              $('#pendidikan').val(data.data.PDDK_AKHIR);
					              $('#alamat').val(data.data.ALAMAT);
					              $('#btn_next').show();
					              $('#btn_clear').text('BERSIHKAN');
					            }else {
												$('.preload-text').text('Mencari NIK di DISDUKCAPIL Tegal...');
												$.ajax({
							            type:"GET",
							            url: "<?php echo base_url('Api_capil/get_api_capil'); ?>/"+nik,
													dataType:"JSON"
							          }).done(function(data) {
							            if (data.status=="1") {
														$('.preload').hide();
														var a = data.data.replace(/&quot;/g,'"');
														var str = a.replace(/[\r\n]+/g," ");
														var jsonObj = JSON.parse(str);
							              $('#got_people').show();
							              $('#cari_nik').addClass('form-group has-success has-feedback');
							              $('#cari_nik_icon').addClass('glyphicon glyphicon-ok form-control-feedback');
							              $('#cari_nik_p').text('Akun siap di buat.')
							              $('#text_nama1').text(jsonObj[0].NAMA);
							              $('#text_email1').text(jsonObj[0].ALAMAT);
							              $('#nama').val(jsonObj[0].NAMA);
							              $('#jk').val(jsonObj[0].JK);
							              $('#tmpt_lahir').val(jsonObj[0].TMPT_LHR);
							              $('#tgl_lahir').val(jsonObj[0].TGL_LHR);
							              $('#agama').val(jsonObj[0].AGAMA);
							              $('#pendidikan').val(jsonObj[0].PDDK_AKHIR);
							              $('#alamat').val(jsonObj[0].ALAMAT);
							              $('#btn_next').show();
							              $('#btn_clear').text('BERSIHKAN');
							            }else {
														$('.preload').hide();
							              $('#cari_nik').addClass('form-group has-error has-feedback');
							              $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
							              $('#cari_nik_p').text('NIK tidak ditemukan.');
							              $('#btn_next').show();
							              $('#pesan_nik').show();
							              $('#btn_next').text('YA');
							              $('#btn_clear').text('TIDAK');
							            }
							          });
					            }
					          });
					        }
					      });
					    }else {
					      $('#cari_nik').addClass('form-group has-error has-feedback');
					      $('#cari_nik_icon').addClass('glyphicon glyphicon-remove form-control-feedback');
					      $('#cari_nik_p').text('Input kurang dari 16 karakter.');
					      $('#btn_clear').text('BERSIHKAN');
								$('#btn_cek').show();
					    }

					  });


						$('#btn_next').click(function() {
							var txt = $("#btn_next").text();
							if (txt=="YA") {
								$('#section_find').hide();
								$('#section_form').show('slow');
								$('[name="nik1"]').prop( "disabled", true );
								$('[name="nik1"]').val($("#nik").val()).focus();
								$('[name="nik"]').val($("#nik").val());
								$('[name="not_api"]').val('1');

							}else {
								$('#section_find').hide();
								$('#section_form').show('slow');

								$('[name="nik1"]').val($("#nik").val()).prop( "disabled", true );
								$('[name="nik"]').val($("#nik").val());
								$('[name="nama"]').val($("#nama").val());
								$('[name="jk"]').val($("#jk").val()).prop('checked',true);
								$('[name="tmpt_lahir"]').val($("#tmpt_lahir").val());
								$('[name="tgl_lahir"]').val($("#tgl_lahir").val());
								$('[name="agama"]').val($("#agama").val());
								$('[name="alamat"]').val($("#alamat").val());

								var x = document.getElementById("opt_pendidikan");
						    var option = document.createElement("option");
						    option.text = $("#pendidikan").val();
						    option.value = $("#pendidikan").val();
						    option.selected="true";
						    x.add(option);
							}
						});
						$('#btn_clear').click(function() {
							$('#cari_nik').removeClass('has-error has-success has-feedback');
							$('#cari_nik_icon').removeClass('glyphicon glyphicon-remove glyphicon-ok form-control-feedback');
							$('#cari_nik_p').text('');
							$('#btn_cek').show();
							$('#btn_clear').hide();
							$('#btn_next').hide();
							$('#got_user').hide();
							$('#got_people').hide();
							$('#form_add_user')[0].reset();
							$('#pesan_nik').hide();
							$('#btn_clear').text('BERSIHKAN');
						});
					})
				</script>

				<script type="text/javascript">
					$(function() {
						$("[name='telp']").inputmask("9999-9999-9999");

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
					})

					function reset(url) { //url dari flashdata yang dikirim server php / function
						$.ajax({
				      url : url,
				      type: "GET",
				      success: function(data)
				      {
								var respon = xmlToJson(data)['response']['message']['text']
				        if (respon=='Success') {
				          toastr.info("Cek telepon anda.", "");
				        }
				      },
				      error: function (jqXHR, textStatus, errorThrown)
				      {
				          toastr.error('Error get API SMS. Coba beberapa saat lagi.', '');
				      }
				  });

					}
					function xmlToJson(xml) {

						// Create the return object
						var obj = {};

						if (xml.nodeType == 1) { // element
							// do attributes
							if (xml.attributes.length > 0) {
							obj["@attributes"] = {};
								for (var j = 0; j < xml.attributes.length; j++) {
									var attribute = xml.attributes.item(j);
									obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
								}
							}
						} else if (xml.nodeType == 3) { // text
							obj = xml.nodeValue;
						}

						// do children
						// If just one text node inside
						if (xml.hasChildNodes() && xml.childNodes.length === 1 && xml.childNodes[0].nodeType === 3) {
							obj = xml.childNodes[0].nodeValue;
						}
						else if (xml.hasChildNodes()) {
							for(var i = 0; i < xml.childNodes.length; i++) {
								var item = xml.childNodes.item(i);
								var nodeName = item.nodeName;
								if (typeof(obj[nodeName]) == "undefined") {
									obj[nodeName] = xmlToJson(item);
								} else {
									if (typeof(obj[nodeName].push) == "undefined") {
										var old = obj[nodeName];
										obj[nodeName] = [];
										obj[nodeName].push(old);
									}
									obj[nodeName].push(xmlToJson(item));
								}
							}
						}
						return obj;
					}
					$(function() {
					  $('.alphaonly').bind('keyup blur',function(){
					      var node = $(this);
					      node.val(node.val().replace(/[^a-zA-Z ]/g,'') ); }
					  );
					})
				</script>


				<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/spin.js/spin.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/select2/select2.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/App.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppNavigation.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppOffcanvas.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppCard.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppForm.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/toastr/toastr.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/wizard/jquery.bootstrap.wizard.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/demo/DemoFormWizard.js"></script>

				<script src="<?php echo base_url();?>assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/localization/messages_id.js"></script>

				<!-- END JAVASCRIPT -->

			</body>
		</html>
