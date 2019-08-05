<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pemataan Hasil Bumi</title>
  <?php $this->load->view('frontend/header') ?>
</head>
<body class="menubar-hoverable header-fixed">

		<!-- BEGIN HEADER-->
    <?php $this->load->view('frontend/navbar') ?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base" style="padding-left: unset;">

			<!-- BEGIN OFFCANVAS LEFT -->
      <div id="viewcanvas-kiri">
        <div class="offcanvas">

        </div><!--end .offcanvas-->

      </div>
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content" style="padding-top:unset" >
        <div class="hidden-xs" style="padding-top:64px"></div>

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
										</div>
									</div>
                  <input type="hidden" id="lt" value="<?php echo $d->lt; ?>">
                  <input type="hidden" id="lg" value="<?php echo $d->lg; ?>">
                  <input type="hidden" id="icon" value="<?php echo $d->pekerjaan; ?>">
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
							</div>
					</div><!--end .section-body -->
				</section>
				<!-- END PROFILE HEADER  -->

				<section>
					<div class="section-body no-margin">
						<div class="row">
							<div class="col-md-8">
								<div id="dash">

								<h2>Timeline</h2>

								<!-- BEGIN ENTER MESSAGE -->
								<form class="form">
									<div class="card no-margin">
											<div class="card-head">
												<ul class="nav nav-tabs nav-justified" data-toggle="tabs">
													<li class="active"><a href="#histori">HISTORI PANEN</a></li>
												</ul>
											</div><!--end .card-head -->
										</div><!--end .card -->
								</form>

								<!-- BEGIN ENTER MESSAGE -->
								<!-- BEGIN MESSAGE ACTIVITY -->

								<div class="tab-content">
									<div class="tab-pane active" id="histori">
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

							<!-- BEGIN PROFILE MENUBAR -->
							<div class="col-lg-offset-1 col-lg-3 col-md-4">
								<?php foreach ($data as $d): ?>
								<div class="card card-underline style-default-dark">
									<div class="card-head">
										<header class="opacity-75"><small>Personal info</small></header>
									</div><!--end .card-head -->
									<div class="card-body no-padding">
										<ul class="list">
											<li class="tile">

												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<?php if ($d->jk=='L'): ?>
														<i class="fa fa-mars"></i>
														<?php else: ?>
														<i class="fa fa-venus"></i>
													<?php endif; ?>
													</div>
													<div class="tile-text">
														<?php if ($d->jk=='L'): ?>
															<span class="p">Laki - laki</span>
														<?php else: ?>
															<span class="p">Perempuan</span>
													<?php endif; ?>

														<small>Jenis Kelamin</small>
													</div>
												</a>


											</li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="md md-account-box"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->tempat_lahir ?>, <?php echo tgl_indo($d->tgl_lahir) ?></span>
														<small>Tempat & Tanggal Lahir</small>
													</div>
												</a>
											</li>
											<li class="divider-inset"></li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="fa fa-phone"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->telp ?></span>
														<small>Telepon</small>
													</div>
												</a>
											</li>
											<li class="divider-inset"></li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="fa fa-envelope"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->email ?></span>
														<small>Email</small>
													</div>
												</a>
											</li>
											<li class="divider-inset"></li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="fa fa-mortar-board"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->pendidikan ?></span>
														<small>Pendidikan</small>
													</div>
												</a>
											</li>
											<li class="divider-inset"></li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="md md-location-on"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->alamat ?></span>
														<small>Alamat</small>
													</div>
												</a>
											</li>
											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon"></div>
													<div class="tile-text">
														<span class="p"><?php echo tampil_kab($d->id_kab) ?></span>
														<small>Kota</small>

														<div class="col-md-12 height-3">
															<div id="map"></div>
														</div>

													</div>
												</a>
											</li>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
								<?php endforeach; ?>
							</div><!--end .col -->
							<!-- END PROFILE MENUBAR -->

						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<!-- END MENUBAR -->

			<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS SEARCH -->
				<div id="offcanvas-search" class="offcanvas-pane width-8">
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS SEARCH -->

				<!-- BEGIN OFFCANVAS CHAT -->
				<div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS CHAT -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->

		</div><!--end #base-->
		<!-- END BASE -->

    <!-- BEGIN JAVASCRIPT -->
    <?php $this->load->view('frontend/footer') ?>
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
    					$('.preload').show();
    					var jmla = $('.li-history').length;
    					console.log("histori"+jmla);
    					$.ajax({
    						type:"GET",
    						url: "<?php echo base_url('Frontend/scroll_history_panen'); ?>/"+jmla,
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
    					zoom: 10 //The zoom value.
    				};

    				//Create the map object.
    				map = new google.maps.Map(document.getElementById('map'), options);

    				var image = " <?php echo base_url('assets/uploads/icon'); ?>/"+$('#icon').val()+".png";
    				var marker2 = new google.maps.Marker({
    				    position: centerOfMap,
    						icon:image,
    				});

    				// To add the marker to the map, call setMap();
    				marker2.setMap(map);


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


      })


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
    </script>

	</body>
</html>
