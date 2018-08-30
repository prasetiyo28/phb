
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

								<h3><?php echo $d->nama; $id_kab=$d->id_kab;$id_prov=$d->id_prov; $blokir=$d->blokir; $login=$d->last_login;$bidang=$d->bidang;?> <br> <small><?php echo dinas($d->bidang) ?></small></h3>
								<?php endforeach; ?>
							</div><!--end .col -->
							<div class="col-md-9 col-xs-7">
								<div class="width-3 text-center pull-right">
									<strong class="text-xl"><?php echo tampil_ttl_panen_by_id_kab($id_kab,'1',$bidang) ?></strong><br/>
									<span class="text-light opacity-75">Panen</span>
								</div>
								<div class="width-3 text-center pull-right">
									<strong class="text-xl"><?php echo tampil_ttl_panen_by_id_kab($id_kab,'2',$bidang) ?></strong><br/>
									<span class="text-light opacity-75">Gagal Panen</span>
								</div>
							</div><!--end .col -->
						</div><!--end .row -->
						<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
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
									<li class="divider"></li>
									<?php if ($blokir=="1"): ?>
										<li><a href="<?php echo base_url('Xyz/unblokir_admin').'/'.$id?>"><i class="fa fa-check text-danger"></i> Aktifkan</a></li>
									<?php else: ?>
										<li><a href="<?php echo base_url('Xyz/blokir_admin').'/'.$id?>"><i class="fa fa-ban text-danger"></i> Blokir</a></li>
								<?php endif; ?>
									<li><a href="<?php echo base_url('Xyz/hapus_admin').'/'.$id?>"><i class="fa fa-trash text-danger"></i> Hapus</a></li>
								</ul>
							</div>

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
															<li class="active"><a href="#info">INFO GRAFIS</a></li>
		                          <li><a href="#histori">HISTORI PANEN</a></li>
		                          <li><a href="#activity">AKTIFITAS</a></li>
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
													<!-- BEGIN ALERT - REVENUE -->
													<div class="col-md-6 col-sm-6">
														<div class="card">
															<div class="card-body no-padding">
																<div class="alert alert-callout alert-info no-margin">
									                <?php
									                $dt1= date('n')-1;
									                $dt2= date('n')-2;
									                $sel1 = $p_panen[$dt1];
									                $sel2 = $p_panen[$dt2];
									                if ($sel1==0 && $sel2!=0) {
									                    $treding=$sel2*100;
									                }elseif ($sel2==0 && $sel1!=0) {
									                  $treding=$sel1*100;
									                }elseif ($sel1==0 && $sel1==0) {
									                  $treding=0;
									                }else {
									                  $treding= $sel1/$sel2 *100;
									                }
									                 ?>
									                <?php if ($sel1 < $sel2): ?>
									                  <strong class="pull-right text-danger text-lg"><?php echo $treding ?>%<i class="md md-trending-down"></i></strong>
									                <?php elseif ($sel1 == $sel2): ?>
									                  <strong class="pull-right text-success text-lg"><?php echo $treding ?>% <i class="md md-trending-neutral"></i></strong>
									                  <?php else: ?>
									                    <strong class="pull-right text-success text-lg"><?php echo $treding ?>% <i class="md md-trending-up"></i></strong>
									                <?php endif; ?>
									                <strong class="text-xl"><?php echo tampil_ttl_panen_by_id_kab($id_kab,'1',$bidang) ?></strong><br/>
									                <span class="opacity-50">Total Panen</span>
									                <div class="stick-bottom-left-right">
									                  <div class="height-2 sparkline-revenue-produksi1" data-line-color="#bdc1c1"></div>
									                </div>
									              </div>
															</div><!--end .card-body -->
														</div><!--end .card -->
													</div><!--end .col -->
													<!-- END ALERT - REVENUE -->

													<!-- BEGIN ALERT - VISITS -->
													<div class="col-md-6 col-sm-6">
														<div class="card">
															<div class="card-body no-padding">
																<div class="alert alert-callout alert-warning no-margin">
																	<?php
																  $dt1= date('n')-1;
																  $dt2= date('n')-2;
																  $sel1 = $user_baru[$dt1];
																  $sel2 = $user_baru[$dt2];
																  if ($sel1==0 && $sel2!=0) {
																 		 $treding=$sel2*100;
																  }elseif ($sel2==0 && $sel1!=0) {
																 	 $treding=$sel1*100;
																  }elseif ($sel1==0 && $sel1==0) {
																 	 $treding=0;
																  }else {
																 	 $treding= $sel1/$sel2 *100;
																  }
																 	?>
																  <?php if ($sel1 < $sel2): ?>
																 	 <strong class="pull-right text-danger text-lg"><?php echo $treding ?>%<i class="md md-trending-down"></i></strong>
																  <?php elseif ($sel1 == $sel2): ?>
																 	 <strong class="pull-right text-success text-lg"><?php echo $treding ?>% <i class="md md-trending-neutral"></i></strong>
																 	 <?php else: ?>
																 		 <strong class="pull-right text-success text-lg"><?php echo $treding ?>% <i class="md md-trending-up"></i></strong>
																  <?php endif; ?>
																	<strong class="text-xl"><?php echo $total_user ?></strong><br/>
																	<span class="opacity-50">Total User</span>
																	<div class="stick-bottom-right pull-right">
																		<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
																	</div>
																</div>
															</div><!--end .card-body -->
														</div><!--end .card -->
													</div><!--end .col -->
													<!-- END ALERT - VISITS -->
														<div class="col-md-6">
															<div class="col-md-6">
																<div class="pull-right">
																	<div class="height-5 inlinesparkline-panen"></div>
																</div>
															</div>
															<div class="col-md-6 col-xs-12">
																<div class="card">
																	<div class="card-body height-5">
																			<span class="opacity-50">Legenda</span>
																			<div class="col-md-12">
										                    <label class="radio-inline radio-styled radio-warning">
										                      <input type="radio" checked=""><span>Belum Panen (<?php echo tampil_ttl_panen_by_id_kab($id_kab,'0',$bidang) ?>)</span>
										                    </label><br>
										                    <label class="radio-inline radio-styled radio-info">
										                      <input type="radio" checked=""><span>Panen (<?php echo tampil_ttl_panen_by_id_kab($id_kab,'1',$bidang) ?>)</span>
										                    </label><br>
										                    <label class="radio-inline radio-styled radio-danger">
										                      <input type="radio" checked=""><span>Gagal Panen (<?php echo tampil_ttl_panen_by_id_kab($id_kab,'2',$bidang) ?>)</span>
										                    </label>
										                  </div>
																	</div><!--end .card-body -->
																</div><!--end .card -->
															</div>
														</div>
														<div class="col-md-6">
															<div class="col-md-6">
																<div class="pull-right">
																	<div class="height-5 inlinesparkline-user"></div>
																</div>
															</div>
															<div class="col-md-6 col-xs-12">
																<div class="card">
																	<div class="card-body height-5">
																			<span class="opacity-50">Legenda</span>
																			<div class="col-md-12">
										                    <label class="radio-inline radio-styled radio-info">
										                      <input type="radio" checked=""><span>Laki-laki (<?php echo $total_user_l ?>)</span>
										                    </label><br>
										                    <label class="radio-inline radio-styled radio-danger">
										                      <input type="radio" checked=""><span>Perempuan (<?php echo $total_user_p ?>)</span>
										                    </label>
										                  </div>
																	</div><!--end .card-body -->
																</div><!--end .card -->
															</div>

														</div>
												</div><!--end .row -->

		                  </div>
		                  <div class="tab-pane" id="histori">
												<ul class="timeline collapse-lg timeline-hairline">
													<?php $no=0; foreach ($panen as $pn): ?>
														<?php if ($pn->panen_flag!='0'): $no++;?>
															<li>
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
																								<td>Harga perkiraan perkilo/ekor</td>
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
		                  <div class="tab-pane" id="activity">
		                    <ul class="timeline collapse-lg timeline-hairline">
													<?php foreach ($log as $l): ?>
														<li>
			                        <div class="timeline-circ circ-xl style-primary-dark"><i class="md md-access-time"></i></div>
			                        <div class="timeline-entry">
			                          <div class="card style-default-light">
			                            <div class="card-body small-padding">
			                              <p>
			                                <span class="text-medium"><?php echo $l->keterangan ?> pada <span class="text-primary"><?php echo date('H:i:sa', strtotime($l->date)); ?></span></span><br/>
			                                <span class="opacity-50">
			                                  <?php echo tgl_indo(date('Y-m-d', strtotime($l->date))) ?>
			                                </span>
			                              </p>
			                            </div>
			                          </div>
			                        </div><!--end .timeline-entry -->
			                      </li>
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
		                  </div><!--end #activity -->

		                </div><!--end .card-body -->

									</div><!--end .col -->
									<!-- END MESSAGE ACTIVITY -->
									<div id="lap" style="display:none;">
										<h2>Laporan</h2>

										<div class="card">
											<div class="card-body">
												<div class="col-md-12">
													<div class="col-md-3 col-xs-12">
														<select class="form-control" name="jenis1">
															<option value="1">Pengguna</option>
															<option value="2">Produksi</option>
														</select>
													</div>
													<div class="col-md-3 col-xs-12">
														<select class="form-control" name="jenis2">
															<option value="1">Bulanan</option>
															<option value="2">Tahunan</option>
															<option value="3">Semua</option>
														</select>
													</div>
													<div class="col-md-3 col-xs-12">
														<select class="form-control" name="bulan">
															<option value="01">Januari</option>
															<option value="02">Februari</option>
															<option value="03">Maret</option>
															<option value="04">April</option>
															<option value="05">Mei</option>
															<option value="06">Juni</option>
															<option value="07">Juli</option>
															<option value="08">Agustus</option>
															<option value="09">September</option>
															<option value="10">Oktober</option>
															<option value="11">November</option>
															<option value="12">Desember</option>
														</select>
													</div>
													<div class="col-md-2 col-xs-12">
														<select class="form-control" name="tahun">
															<?php $tahun = date('Y'); for ($i=0; $i <5 ; $i++) { ?>
																<option value="<?php echo $tahun-$i; ?>"><?php echo $tahun-$i; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-md-1 col-xs-6">
														<button type="button" onclick="cari_lap()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
													</div>
												</div>
											</div>
										</div>
										<div class="preload text-center" style="display:none;">
											<img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
											Memuat...
										</div>
											<div id="viewlap">

											</div>

									</div>
							</div>

							<!-- BEGIN PROFILE MENUBAR -->
							<div class="col-lg-offset-1 col-lg-3 col-md-4">
								<?php foreach ($data as $d): ?>
									<form action=" <?php echo base_url('Xyz/update_info_admin') ?>" class="form form-validate" novalidate="novalidate" method="post">
								<div class="card card-underline style-default-dark">
									<div class="card-head">
										<header class="opacity-75"><small>Personal info</small></header>
										<div class="tools">
											<a id="btn_edit" class="p btn btn-icon-toggle ink-reaction" onclick="edit_personal()" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="md md-edit"></i></a>
											<button id="btn_save" type="submit" class="o btn btn-icon-toggle ink-reaction"><i class="md md-save" data-toggle="tooltip" data-placement="top" data-original-title="Simpan"></i></button>
											<a id="btn_ccl" class="o btn btn-icon-toggle ink-reaction" onclick="batal_personal()"><i class="md md-close" data-toggle="tooltip" data-placement="top" data-original-title="Tutup"></i></a>
										</div><!--end .tools -->
									</div><!--end .card-head -->
									<div class="card-body no-padding">
										<ul class="list">

											<li class="tile">
												<a class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="fa fa-phone"></i>
													</div>
													<div class="tile-text">
														<span class="p"><?php echo $d->telp ?></span>
														<div class="o form-group">
														<input type="text" value="<?php echo $d->telp ?>" class="form-control" style="border-bottom-color: #0aa89e;color:#0aa89e;" name="telp" required data-rule-duplicatPhoneUser="true" data-rule-duplicatPhoneAdmin="true" required>
													</div>
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
														<div class="o form-group">
														<input type="text" value="<?php echo $d->email ?>" class="form-control" style="border-bottom-color: #0aa89e;color:#0aa89e;" name="email" required data-rule-email="true" required data-rule-duplicatEmailUser="true" data-rule-duplicatEmailAdmin="true">
													</div>
														<small>Email</small>
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
														<span class="p"><?php echo tampil_kab($d->id_kab) ?>, <?php echo tampil_prov($d->id_prov) ?></span>
														<div class="o form-group">
														<select class="form-control select2-list" name="id_prov" required style="border-bottom-color: #0aa89e;color:#0aa89e;">
															<option value="<?php echo $d->id_prov ?>"><?php echo tampil_prov($d->id_prov) ?></option>
															<?php foreach($prov as $row) { ?>
																<option value="<?php echo $row->id_prov; ?>"><?php echo $row->nama; ?></option>
																<?php } ?>
														</select>
													</div>
													<div class="o form-group">
														<select class="form-control select2-list" name="id_kab" required style="border-bottom-color: #0aa89e;color:#0aa89e;">
															<option value="<?php echo $d->id_kab ?>"><?php echo tampil_kab($d->id_kab) ?></option>
														</select>
													</div>

														<small>Kota</small>
														<input type="hidden" name="id_admin" value="<?php echo $d->id_admin; ?>">

													</div>
												</a>
											</li>
										</ul>
									</div><!--end .card-body -->
								</div><!--end .card -->
								</form>

								<div class="card card-underline style-default-dark">
									<div class="card-head">
										<header class="opacity-75"><small>Menu</small></header>
									</div><!--end .card-head -->
									<div class="card-body no-padding">
										<ul class="list">
											<li class="tile"  onclick="timelineOn()">
												<a href="javascript:void(0)" class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="md md-av-timer"></i>
													</div>
													<div class="tile-text">
														<span>Timeline</span>
													</div>
												</a>
											</li>
											<li class="tile"  onclick="laporanOn()">
												<a href="javascript:void(0)" class="tile-content ink-reaction">
													<div class="tile-icon">
														<i class="md md-assignment"></i>
													</div>
													<div class="tile-text">
														<span>Laporan</span>
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
			<div id="viewcanvas"></div>
			<div id="viewmodal"></div>
			<?php $this->load->view('Xyz/pengguna/modal_akun') ?>
<script type="text/javascript">
$(document).ready(function(){
	$(document.body).removeClass(' full-content');
	$('.o').hide();
	$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){
					// run our call for pagination
					var jml = $('.li').length;
					$('.preload').show();
					console.log(jml);
					$.ajax({
						type:"GET",
						url: "<?php echo base_url('Xyz/scroll_log_admin'); ?>/"+jml,
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
						url: "<?php echo base_url('Xyz/scroll_history_panen_admin'); ?>/"+jmla,
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
	$(function () {
		var points = [
			<?php $sampai = date('n'); for ($i=0; $i < $sampai ; $i++) {?>
				<?php echo $user_baru[$i] ?>,
			<?php } ?>
		];
		var parent = $('.sparkline-visits').closest('.card-body');
		var barWidth = 6;
		var spacing = (parent.width() - (points.length * barWidth)) / points.length;

		var options = $('.sparkline-visits').data();
		options.type = 'bar';
		options.barWidth = barWidth;
		options.barSpacing = spacing;
		options.height = $('.sparkline-visits').height() + 'px';
		options.fillColor = false;
		$('.sparkline-visits').sparkline(points, options);
	});

	$(function () {
		var options = $('.sparkline-revenue-produksi1').data();
		var points = [
			<?php $sampai = date('n'); for ($i=0; $i < $sampai ; $i++) {?>
				<?php echo $p_panen[$i] ?>,
			<?php } ?>
		];
		options.type = 'line';
		options.width = '100%';
		options.height = $('.sparkline-revenue-produksi1').height() + 'px';
		options.fillColor = false;
		$('.sparkline-revenue-produksi1').sparkline(points, options);
	});


	$(function () {
		var options = $('.inlinesparkline-user').data();
		var points = [<?php echo $total_user_l ?>, <?php echo $total_user_p ?>];
		options.type = 'pie';
		options.width = '100%';
		options.height = $('.inlinesparkline-user').height() + 'px';
		options.fillColor = false;
		$('.inlinesparkline-user').sparkline(points, options);
	});

	$(function () {
		var options = $('.inlinesparkline-panen').data();
		var points = [<?php echo tampil_ttl_panen_by_id_kab($id_kab,'1',$bidang) ?>,<?php echo tampil_ttl_panen_by_id_kab($id_kab,'2',$bidang) ?>,<?php echo tampil_ttl_panen_by_id_kab($id_kab,'0',$bidang) ?>];
		options.type = 'pie';
		options.width = '100%';
		options.height = $('.inlinesparkline-panen').height() + 'px';
		options.fillColor = false;
		$('.inlinesparkline-panen').sparkline(points, options);
	});

	function edit_personal() {
		$('.p').hide();
		$('.o').show();
	}
	function batal_personal() {
		$('.p').show();
		$('.o').hide();
	}

	function konfig_akun() {
			$('#modal_akun').modal('show');
	}
	function modal_foto() {
			$('#modal_foto').modal('show');
	}
	function timelineOn() {
			$('#dash').show();
			$('#lap').hide();
	}
	function laporanOn() {
			$('#dash').hide();
			$('#lap').show();
	}
	function cari_lap() {
		$('.preload').show();
		var jenis1 = $("[name='jenis1']").val();
		var jenis2 = $("[name='jenis2']").val();
		var bulan = $("[name='bulan']").val();
		var tahun = $("[name='tahun']").val();
		$.ajax(
			{
				type: "GET",
				url: "<?php echo base_url('Xyz/cari_lap'); ?>/"+jenis1+"/"+jenis2+"/"+bulan+"/"+tahun,
			}
		).done(function( data )
		{
			$('#viewlap').html(data);
			$('.preload').hide();
		});

	}
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
