
<!-- BEGIN CONTENT-->
<div id="content">

	<!-- BEGIN PROFILE HEADER -->
	<section class="full-bleed">
		<div class="section-body style-default-dark force-padding text-shadow">
			<div class="img-backdrop" style="background-image: url('<?php echo base_url() ?>assets/img/img16.jpg')"></div>
			<div class="overlay overlay-shade-top stick-top-left height-3"></div>
			<div class="row">
				<div class="col-md-3 col-xs-5">
					<?php foreach ($data as $d): ?>
						<div class="container">
							<img class="img-circle border-#0aa89e border-xl img-responsive auto-width" style="max-width:125px;" src="<?php echo base_url('assets/uploads').'/'.$d->foto ?>" alt="" />
							<div style="position: absolute;left: 40%;transform: translate(-20%, -120%);-ms-transform: translate(-20%, -120%);">
								<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Ganti Foto" onclick="modal_foto()"><i class="fa fa-camera" ></i></a>
							</div>
						</div>

						<h3><?php echo $d->nama; $nik = $d->nik; $blokir= $d->blokir;$login=$d->last_login;?> <br> <small><?php echo pekerjaan($d->pekerjaan) ?></small></h3>
					<?php endforeach; ?>
				</div><!--end .col -->
				<div class="col-md-9 col-xs-7">
					<div class="width-3 text-center pull-right">
						<strong class="text-xl"><?php echo tampil_ttl_panen_by_id_user($id,'1') ?></strong><br/>
						<span class="text-light opacity-75">Panen</span>
					</div>
					<div class="width-3 text-center pull-right">
						<strong class="text-xl"><?php echo tampil_ttl_panen_by_id_user($id,'2') ?></strong><br/>
						<span class="text-light opacity-75">Gagal Panen</span>
					</div>
				</div><!--end .col -->
			</div><!--end .row -->
			<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
				<small class="text-light opacity-75">NIK : <?php echo $nik ?></small> <br>
				<small class="text-light opacity-75"> <?php if ($login==null) {
					echo "Belum pernah login";
				}else {
					echo "Login pada ".waktu_lalu2($login);
				}  ?></small> |
				<small class="text-light opacity-75">
					<?php if ($blokir=="1"): ?>
						Diblokir
						<?php else: ?>
							Aktif
							<?php endif; ?></small>
							<div class="btn-group">
								<button type="button" class="btn btn-icon-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i>
								</button>
								<ul class="dropdown-menu animation-slide" role="menu" style="right:0;left:unset;">
									<li><a  href="javascript:avoid(0)" onclick="konfig_akun()" > Konfigurasi Akun</a></li>
								</ul>
							</div>
						</div>
					</div><!--end .section-body -->
				</section>
				<!-- END PROFILE HEADER  -->

				<section>
					<div class="section-body no-margin">
						<div class="row">
							<div class="col-md-12">
								<div id="dash">

									<h2>Catatan Keuangan</h2>

									<!-- BEGIN ENTER MESSAGE -->
									<form class="form">
										<div class="card no-margin">
											<div class="card-head">
												<ul class="nav nav-tabs nav-justified" data-toggle="tabs">
													<li class="active"><a href="#info">Catatan Keuangan</a></li>
													

												</ul>
											</div><!--end .card-head -->
										</div><!--end .card -->
									</form>

									<!-- BEGIN ENTER MESSAGE -->
									<!-- BEGIN MESSAGE ACTIVITY -->

									<div class="tab-content">

										<div class="tab-pane active" id="info">

											<br>
											<div class="row">
												<div class="col-lg-12">
													<h4>Catatan Keuangan</h4>
												</div><!--end .col -->
												<div class="col-lg-2 col-md-3">
													<article class="margin-bottom-xxl">
														<ul class="list-divided">
															<li>
																Berikut adalah Catatan Keuangan anda 
															</li>
														</ul>
													</article>
												</div><!--end .col -->
												<div class="col-lg-offset-1 col-md-3 col-sm-6">
													<form class="form form-validate" novalidate="novalidate" method="post" id="form_hadiah" action="<?php echo base_url('User/tambah_catatan') ?>">
														<div class="card">
															<div class="card-body">
																<div class="form-group">
																	<select class="form-control" required name="id_produksi" >
																		<option value="" selected disabled=>-Pilih Produksi-</option>
																		<?php foreach ($produksi_select as $p): ?>

																			<option value="<?php echo $p->id_produksi ?>"><?php echo $p->jenis_produksi ?></option>
																		<?php endforeach ?>
																	</select>
																	<label for="value1">Produksi</label>
																</div>
																<div class="form-group">
																	<select required class="form-control" name="catatan" id="catatan" onchange='CheckCatatan(this.value);'>
																		<option value="" selected disabled="">-Pilih Catatan-</option>
																		<option>Sewa Lahan</option>
																		<option>Bali Pakan / Obat</option>
																		<option value="other">Lainnya...</option>
																	</select>
																	<input id="catatan2" style="display: none;" type="text" id="catatan2" name="catatan2" class="form-control" placeholder="isi catatan keuangan">
																	<label for="value1">Catatan</label>
																</div>
																<div class="form-group">
																	<input type="number" min="0" class="form-control" id="pengeluaran" placeholder="Rp..." name="pengeluaran" required>
																	<label for="pengeluaran">Pengeluaran</label>
																</div>
															</div><!--end .card-body -->
															<div class="card-actionbar">
																<div class="card-actionbar-row">
																	<input type="hidden" name="hal" value="1">
																	<button type="submit" id="btn_simpan_hadiah" class="btn btn-flat btn-primary ink-reaction">Simpan</button>
																	<button type="button" id="btn_batal_hadiah" class="btn btn-flat btn-danger ink-reaction" style="display:none;">Batal</button>
																</div>
															</div>
														</div><!--end .card -->
													</form>
												</div><!--end .col -->
												<div class="col-md-6 col-sm-6">
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
																<table id="datatable3" class="table table-striped table-hover no-margin">
																	<thead>
																		<tr>
																			<th class="sort-numeric">No</th>
																			<th>Nama Produksi</th>
																			<th>Catatan</th>
																			<th>Pengeluaran</th>
																			<th>Tanggal</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php $no=0; foreach ($catatan as $g): $no++;?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $g->jenis_produksi ?></td>
																			<td><?php echo $g->catatan ?></td>
																			<td>Rp. <?php echo $g->pengeluaran ?></td>
																			<td><?php echo $g->tanggal ?></td>
																			

																			<td>
																				<button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" onclick="edit_hadiah(<?php echo $g->id_catatan; ?>)" ><i class="fa fa-pencil"></i></button>
																				<button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="delete_catatan(<?php echo $g->id_catatan; ?>)"><i class="fa fa-trash"></i></button>
																			</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>

														</div>
													</div><!--end .card-body -->
												</div><!--end .card -->
											</div><!--end .col -->
										</div><!--end .row -->
										<!-- END BASIC ELEMENTS -->

									</div>
									<div class="tab-pane" id="histori">

										<ul class="timeline collapse-lg timeline-hairline" id="scroll_history_panen">
											<?php $no=0; foreach ($panen as $pn): ?>
											<?php if ($pn->panen_flag!='0'): $no++;?>
												<li class="li-history">
													<div class="timeline-circ circ-xl <?php  if ($pn->panen_flag=='1') {echo 'style-primary';$p='Panen';$t='text-primary';}else {echo 'style-danger';$p='Gagal Panen';$t='text-danger';} ?>"><i class="md md-event"></i></div>
													<div class="timeline-entry">
														<div class="panel-group" id="accordion3">
															<div class="card style-default-light panel">

																<div class="card-body small-padding">
																	<div class="collapsed" data-toggle="collapse" data-parent="#accordion3" data-target="#accordion3-<?php echo $no ?>">
																		<p>
																			<img src="<?php echo base_url('assets/uploads/icon/'.$pn->icon) ?>" class="img-circle img-responsive pull-left">
																			<span class="text-medium"><span class="<?php echo $t ?>"><?php echo $p ?></span> </span>
																			<a class="btn btn-icon-toggle pull-right"><i class="fa fa-angle-down"></i></a>
																			<br/>
																			<span class="opacity-50">
																				<?php echo tgl_indo($pn->tgl_panen) ?> <br>
																			</span>
																			Milik <?php echo tampil_nama_user_by_id($pn->id_user) ?>
																		</p>
																	</div>
																	<div id="accordion3-<?php echo $no ?>" class="collapse">
																		<table class="a table table-responsive table-banded">
																			<tbody>
																				<tr>
																					<td>Produksi</td>
																					<td><?php echo $pn->jenis_produksi ?></td>
																				</tr>
																				<tr>
																					<td>Tanggal Tanam</td>
																					<td><?php echo tgl_indo($pn->tgl_tanam) ?></td>
																				</tr>
																				<tr>
																					<td>Perkiraan Tanggal Panen</td>
																					<td><?php echo tgl_indo($pn->tgl_kira_panen) ?></td>
																				</tr>
																				<tr>
																					<td>Tanggal Panen</td>
																					<td><?php echo tgl_indo($pn->tgl_panen) ?></td>
																				</tr>
																				<tr>
																					<td>Jumlah Bibit</td>
																					<td><?php echo $pn->jml_bibit ?> kg/ekor</td>
																				</tr>
																				<tr>
																					<td>Perkiraan Jumlah Panen</td>
																					<td><?php echo $pn->jml_kira_panen ?> kg/ekor</td>
																				</tr>
																				<tr>
																					<td>Jumlah Panen</td>
																					<td><?php echo $pn->jml_panen ?> kg/ekor</td>
																				</tr>
																				<tr>
																					<td>Jumlah Pupuk</td>
																					<td><?php echo $pn->jml_pupuk ?> kg/ekor</td>
																				</tr>
																				<tr>
																					<td>Harga Perkiraan Perkilo/ekor</td>
																					<td><?php echo $pn->harga_kira_perkilo ?></td>
																				</tr>
																				<tr>
																					<td>Nilai Panen</td>
																					<td><?php echo $pn->nilai_panen?></td>
																				</tr>
																				<tr>
																					<td>Luas Lahan</td>
																					<td><?php echo $pn->luas ?> m<sup>2</sup></td>
																				</tr>
																				<tr>
																					<td>Status Lahan</td>
																					<td><?php if ($pn->status_lahan=='1'): ?>
																					Milik Sendiri
																					<?php else: ?>
																						Sewa
																						<?php endif; ?></td>
																					</tr>
																					<tr>
																						<td>Lokasi</td>
																						<td><?php echo $pn->lokasi ?></td>
																					</tr>
																					<?php if ($pn->bidang=='2'): ?>
																						<tr>
																							<td>Jenis Tambak</td>
																							<td><?php if ($pn->jenis_tambak=='1'): ?>
																							Air Tawar
																							<?php else: ?>
																								Air Payau
																								<?php endif; ?></td>
																							</tr>
																						<?php endif; ?>
																						<tr>
																							<td>Keterangan</td>
																							<td><?php echo $pn->ket ?></td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																</div>
															</div><!--end .timeline-entry -->
														</li>
													<?php endif; ?>
												<?php endforeach; ?>
											</ul>
											<div class="preload text-center" style="display:none;">
												<img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
												Memuat...
											</div>
											<div class="preload-end text-center" style="display:none;">
												<div class="alert alert-success" role="alert">
													<strong>Halaman akhir !</strong> Semua data sudah ditampilkan.
												</div>
											</div>
										</div>


									</div><!--end .card-body -->

								</div><!--end .col -->
								<!-- END MESSAGE ACTIVITY -->
							</div>
							<!-- END MESSAGE ACTIVITY -->


						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->
			<div id="viewcanvas"></div>
			<div id="viewmodal"></div>
			<?php $this->load->view('User/pengguna/modal_peta') ?>
			<?php $this->load->view('User/pengguna/modal_akun') ?>
			<?php $this->load->view('User/pengguna/modal_produksi') ?>

			<script type="text/javascript">


				$(document).ready(function(){


					$(document.body).removeClass(' full-content');
					$('.o').hide();
					$('#tbl1').dataTable({
						"dom": 'T<"clear">lfrtip',
						"tableTools": {
							"sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
						}
					});
					$(window).scroll(function(){
						if  ($(window).scrollTop() == $(document).height() - $(window).height()){
	        // run our call for pagination
	        var jml = $('.li').length;
	        $('.preload').show();
	        console.log(jml);
	        $.ajax({
	        	type:"GET",
	        	url: "<?php echo base_url('User/scroll_log'); ?>/"+jml,
	        }).done(function(data) {
	        	if (data==0) {
	        		$('.preload-end-log').show();
	        		$('.preload').hide();
	        	}else {
	        		var myhtml=$('#log_scroll').html()+data;
	        		$('#log_scroll').html(myhtml);
	        		$('.preload').hide();
	        	}
	        });


	        var jmla = $('.li-history').length;
	        console.log("histori"+jmla);
	        $.ajax({
	        	type:"GET",
	        	url: "<?php echo base_url('User/scroll_history_panen'); ?>/"+jmla,
	        }).done(function(data1) {
	        	if (data1==0) {
	        		$('.preload-end').show();
	        		$('.preload').hide();
	        	}else {
	        		var myhtml1=$('#scroll_history_panen').html()+data1;
	        		$('#scroll_history_panen').html(myhtml1);
	        		$('.preload').hide();
	        	}
	        });
	    }
	});
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
					$('[name="tgl_lahir"]').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});

				});
				$(function() {

					var map,map2;
		var marker = false; ////Has the user plotted their location marker?

		//Function called to initialize / create the map.
		//This is called when the page has loaded.
		function initMap() {

				//The center location of our map.
				var centerOfMap = new google.maps.LatLng($('#lt').val(), $('#lg').val());

				//Map options.
				var options = {
					center: centerOfMap, //Set center.
					zoom: 14 //The zoom value.
				};

				//Create the map object.
				map = new google.maps.Map(document.getElementById('map'), options);
				map2 = new google.maps.Map(document.getElementById('mapi'), options);

				var image = " <?php echo base_url('assets/uploads/icon'); ?>/"+$('#icon').val()+".png";
				var marker2 = new google.maps.Marker({
					position: centerOfMap,
					icon:image,
				});

				// To add the marker to the map, call setMap();
				marker2.setMap(map);

				//Listen for any clicks on the map.2
				google.maps.event.addListener(map2, 'click', function(event) {
						//Get the location that the user clicked.
						var clickedLocation = event.latLng;
						//If the marker hasn't been added.
						if(marker === false){
								//Create the marker.
								marker = new google.maps.Marker({
									position: clickedLocation,
									map: map2,
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

				var tegalLayer = new google.maps.KmlLayer({
		         // url: '<?php echo base_url("assets/tegal.kml") ?>',
		         url: 'http://arif.slice-pro.com/tegal.kml',
		         map: map,
		         suppressInfoWindows:true,
		     });
				var tegalLayer2 = new google.maps.KmlLayer({
		        //  url: '<?php echo base_url("assets/tegal.kml") ?>',
		        url: 'http://arif.slice-pro.com/tegal.kml',
		        map: map2,
		        suppressInfoWindows:true,
		        preserveViewport: true
		    });
			}
			function markerLocation(){
				//Get location.
				var currentLocation = marker.getPosition();
				//Add lat and lng values to a field that we can save.
				document.getElementById('lat').value = currentLocation.lat(); //latitude
				document.getElementById('lng').value = currentLocation.lng(); //longitude
			}


		//Load the map when the page has finished loading.
		google.maps.event.addDomListener(window, 'load', initMap);





		$.validator.addMethod("duplicatUser", function(value,element) {
			var balik1;
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
			data.append('id', '<?php echo $id ?>');
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
function edit_personal() {
	$('.p').hide();
	$('.o').show();
}
function batal_personal() {
	$('.p').show();
	$('.o').hide();
}
function modal_ktp(foto,id,par) {
	$.ajax({
		type:"GET",
		url: "<?php echo base_url('User/modal_ktp'); ?>/"+foto+"/"+id+"/"+par,
	}).done(function(data) {
		$('#viewmodal').html(data);
		$('#modal_ktp').modal('show');
	});
}
function modal_produksi(id,str) {
	if (str==1) {
		$('#modal_produksi_panen').modal('show');
		$('[name="id_produksi"]').val(id);
	}else {
		$('#modal_produksi_gagal').modal('show');
		$('[name="id_produksi1"]').val(id);

	}
}
function modal_peta(id) {
	$('#id').val(id);
	$('#modal_peta').modal('show');
}
function konfig_akun() {
	$('#modal_akun').modal('show');
}
function modal_foto() {
	$('#modal_foto').modal('show');
}
function modal_vemail(str) {
	if (str!=1) {
		$('#modal_vemail').modal('show');
	}else {
		toastr.info("Email sudah di verifikasi.", "");
	}

}
function modal_vtelp(str) {
	if (str!=1) {
		$('#modal_vtelp').modal('show');
	}else {
		toastr.info("Nomor Telepon sudah di verifikasi.", "");
	}

}
function selamat() {
	$('#modal_selamat_panen').modal('show');
}
function sedih() {
	$('#modal_sedih_panen').modal('show');
}

$(function() {
	toastr.options.positionClass = 'toast-bottom-left';
	<?php if ($this->session->flashdata('alert')==true) {
		echo $this->session->flashdata('alert');
	} ?>
	<?php if ($this->session->flashdata('gagal')==true) {
		echo $this->session->flashdata('alert');
	} ?>
	<?php if ($this->session->flashdata('selamat')==true) {
		echo $this->session->flashdata('selamat');
	} ?>
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
</script>


<script type="text/javascript">
	function CheckCatatan(val){
		var element=document.getElementById('catatan2');
		if(val=='other')
			element.style.display='block';
		else  
			element.style.display='none';
	}

</script>
