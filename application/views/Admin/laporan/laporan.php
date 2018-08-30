<div id="content">


  <section>
  <div class="section-body">
      <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Pengguna dalam angka</small></h2>

      <center>
      <a href="<?php echo base_url('Admin/print_laporan/') ?>" target="_blank" type="button" class="btn ink-reaction btn-floating-action btn-primary"><i class="fa fa-print"></i></a>
    </center>
      <br/>
      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <div id="user-baru" class="flot height-6" data-title="User Baru" data-color="#9C27B0,#22c46d,#2196f3"></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Pendaftaran</em>
        </div><!--end .col -->
        <div class="col-md-2">
          <div class="card ">
            <div class="card-head text-center">
              <header>Legenda</header>
            </div>
            <div class="card-body">
              <div class="height-4">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="radio-inline radio-styled radio-accent">
                      <input type="radio" checked=""><span>Total</span>
                    </label><br>
                    <label class="radio-inline radio-styled radio-success">
                      <input type="radio" checked=""><span>Laki-laki</span>
                    </label><br>
                    <label class="radio-inline radio-styled radio-info">
                      <input type="radio" checked=""><span>Perempuan</span>
                    </label><br>
                  </div>

                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div>
      </div>

      <div class="col-md-12">
            <div class="height-6">
              <div id="map" style="position: absolute;top: 0;bottom: 0;right: 0;left: 0;"></div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-md-12">
          <div class="card style-primary">
            <div class="card-body">
              <h1>Total User</h1>
              <h2><span class="text-xxxxl"><?php echo $total_user ?></span></h2>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-head text-center">
              <header>
                Laki-laki
              </header>
            </div>
            <div class="card-body text-center">
              <div class="knob knob-success knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_l?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-head text-center">
              <header>
                Perempuan
              </header>
            </div>
            <div class="card-body text-center">
              <div class="knob knob-info knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_p ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-head text-center">
              <header>
                Total Pengguna Aktif
              </header>
            </div>
            <div class="card-body text-center">
              <div class="knob knob-accent knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_aktif ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-head text-center">
              <header>
                Total Pengguna Diblokir
              </header>
            </div>
            <div class="card-body text-center">
              <div class="knob knob-danger knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_blokir ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- BEGIN PRICING CARDS 2 -->
      <h2 class="text-center"><small class="text-primary">Produksi dalam angka</small></h2>
      <br/>

      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <div id="admin-baru" class="flot height-6" data-title="User Baru" data-color="#22c46d,#0aa89e,#f44336"></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Pendaftaran</em>
        </div><!--end .col -->
        <div class="col-md-2">
          <div class="card ">
            <div class="card-head text-center">
              <header>Legenda</header>
            </div>
            <div class="card-body">
              <div class="height-4">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="radio-inline radio-styled radio-success">
                      <input type="radio" checked=""><span>Panen</span>
                    </label><br>
                    <label class="radio-inline radio-styled radio-info">
                      <input type="radio" checked=""><span>Belum panen</span>
                    </label><br>
                    <label class="radio-inline radio-styled radio-danger">
                      <input type="radio" checked=""><span>Gagal panen</span>
                    </label>
                  </div>

                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div>
      </div>


      <div class="row text-center">
        <div class="col-md-12">
          <div class="card style-primary">
            <div class="card-body">
              <h1>Total Panen</h1>
              <h2><span class="text-xxxxl"><?php echo tampil_ttl_panen_by_id_kab($this->session->userdata('id_kab'),'1',$this->session->userdata('bidang')) ?></span></h2>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body no-padding">
              <div class="alert alert-callout alert-success no-margin">
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
                <strong class="text-xl"><?php echo $total_panen ?></strong><br/>
                <span class="opacity-50">Sudah Panen</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi1" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body no-padding">
              <div class="alert alert-callout alert-info no-margin">
                <?php
                $dt1= date('n')-1;
                $dt2= date('n')-2;
                $seli1 = $p_belum_panen[$dt1];
                $seli2 = $p_belum_panen[$dt2];
                if ($seli1==0 && $seli2!=0) {
                    $tredingi=$seli2*100;
                }elseif ($seli2==0 && $seli1!=0) {
                  $tredingi=$seli1*100;
                }elseif ($seli1==0 && $seli1==0) {
                  $tredingi=0;
                }else {
                  $tredingi= $seli1/$seli2 *100;
                }
                 ?>
                <?php if ($seli1 < $seli2): ?>
                  <strong class="pull-right text-danger text-lg"><?php echo $tredingi ?>%<i class="md md-trending-down"></i></strong>
                <?php elseif ($seli1 == $seli2): ?>
                  <strong class="pull-right text-success text-lg"><?php echo $tredingi ?>% <i class="md md-trending-neutral"></i></strong>
                  <?php else: ?>
                    <strong class="pull-right text-success text-lg"><?php echo $tredingi ?>% <i class="md md-trending-up"></i></strong>
                <?php endif; ?>
                <strong class="text-xl"><?php echo $total_belum_panen ?></strong><br/>
                <span class="opacity-50">Mulai Tanam</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi2" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body no-padding">
              <div class="alert alert-callout alert-danger no-margin">
                <?php
                $dt1= date('n')-1;
                $dt2= date('n')-2;
                $sela1 = $p_gagal_panen[$dt1];
                $sela2 = $p_gagal_panen[$dt2];
                if ($sela1==0 && $sela2!=0) {
                    $tredinga=$sela2*100;
                }elseif ($sela2==0 && $sela1!=0) {
                  $tredinga=$sela1*100;
                }elseif ($sela1==0 && $sela1==0) {
                  $tredinga=0;
                }else {
                  $tredinga= $sela1/$sela2 *100;
                }
                 ?>
                <?php if ($sela1 < $sela2): ?>
                  <strong class="pull-right text-danger text-lg"><?php echo $tredinga ?>%<i class="md md-trending-down"></i></strong>
                <?php elseif ($sela1 == $sela2): ?>
                  <strong class="pull-right text-success text-lg"><?php echo $tredinga ?>% <i class="md md-trending-neutral"></i></strong>
                  <?php else: ?>
                    <strong class="pull-right text-success text-lg"><?php echo $tredinga ?>% <i class="md md-trending-up"></i></strong>
                <?php endif; ?>
                <strong class="text-xl"><?php echo $total_gagal_panen ?></strong><br/>
                <span class="opacity-50">Gagal Panen</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi3" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->


      <div class="row">
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-success">
              <h2 class="text-light" style="margin-bottom: 0px;">Produksi</h2>
              <small class="text-light"> Panen bulan ini</small>
              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_panen[$dt1] ?></span></h2> <span>x Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-info">
              <h2 class="text-light" style="margin-bottom: 0px;">Produksi</h2>
              <small class="text-light"> Panen bulan ini</small>

              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_belum_panen[$dt1] ?></span></h2> <span>x Mulai tanam</span>
              </div>
              <br/>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-warning">
              <h2 class="text-light" style="margin-bottom: 0px;">Produksi</h2>
              <small class="text-light"> Panen bulan ini</small>

              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_gagal_panen[$dt1] ?></span></h2> <span>x Gagal Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END PRICING CARDS 2 -->

      <hr>
      <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Dalam Tabel</small></h2>
      <br/>
      <div id="lap">
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
              <div class="col-md-1 col-xs-12">
                <button type="button" onclick="cari_lap()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
              </div>
            </div>
          </div>
        </div>
        <div class="preload1 text-center" style="display:none;">
          <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
          <p class="preload-text"></p>
        </div>
          <div id="viewlap">

          </div>

      </div>

      <h3>Berdasarkan Tanaman / Hewan</h2>
      <div class="col-lg-offset-3 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12">
              <div class="col-md-5">
                <select class="form-control" name="icon1">
                  <option value="">-pilih-</option>
                  <?php foreach ($icon as $ic):
                    ?>
                    <option  value="<?php echo $ic->id_icon ?>"> <?php echo $ic->nama ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-5">
                <select class="form-control" name="tahun1">
                  <?php $tahun = date('Y'); for ($i=0; $i <5 ; $i++) { ?>
                    <option value="<?php echo $tahun-$i; ?>"><?php echo $tahun-$i; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-2">
                <button type="button" onclick="cari_lap_pericon()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-12">
        <div class="preload3 text-center" style="display:none;">
          <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
          <p class="preload-text"></p>
        </div>
        <div id="viewlapicon">

        </div>
      </div>




      <div class="col-md-12">
        <hr>
        <h2 class="text-light text-center">Grafik<br/><small class="text-primary">Indeks Harga,tanam, panen dan gagal panen</small></h2>
        <br/>
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <div class="col-md-3 col-xs-12">
                  <select class="form-control" name="iconi">
                    <option value="">-pilih-</option>
                    <?php foreach ($icon as $ic):
                      ?>
                      <option  value="<?php echo $ic->id_icon ?>"> <?php echo $ic->nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3 col-xs-12">
                  <select class="form-control" name="jenisi">
                    <option value="1">Harga</option>
                    <option value="2">Tanam</option>
                    <option value="3">Panen</option>
                    <option value="4">Gagal Panen</option>
                  </select>
                </div>
                <div class="col-md-3 col-xs-12">
                  <select class="form-control" name="tahuni">
                    <?php $tahun = date('Y'); for ($i=0; $i <5 ; $i++) { ?>
                      <option value="<?php echo $tahun-$i; ?>"><?php echo $tahun-$i; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-3 col-xs-12">
                  <button type="button" onclick="cari_lap_indeks()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
                </div>

              </div>
            </div>
          </div>
          <div class="preload2 text-center" style="display:none;">
            <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
            <p class="preload-text"></p>
          </div>
            <div id="viewlapindeks">

            </div>
      </div>





  </div><!--end .section-body -->
</section>

</div>


<div id="viewcanvas"></div>

<script type="text/javascript">
  $(function() {
    $('.dial').each(function () {
			var options = materialadmin.App.getKnobStyle($(this));
			$(this).knob(options);
		});


		var chart = $("#user-baru");
		var o = this;
		var labelColor = chart.css('color');
		var data = [
      {
				label: 'Total',
				data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_total[$i] ?>],
          <?php } ?>

				],
				last: true
			},
			{
				label: 'Laki-laki',
				data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_l[$i] ?>],
          <?php } ?>

				],
				last: true
			},
      {
        label: 'Perempuan',
        data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_p[$i] ?>],
          <?php } ?>

        ],
        last: true
      },

		];

		var options = {
			colors: chart.data('color').split(','),
			series: {
				shadowSize: 0,
				lines: {
					show: true,
					lineWidth: 2
				},
				points: {
					show: true,
					radius: 3,
					lineWidth: 2
				}
			},
			legend: {
				show: false
			},
			xaxis: {
				mode: "time",
				timeformat: "%b",
				color: 'rgba(0, 0, 0, 0)',
				font: {color: labelColor}
			},
			yaxis: {
				font: {color: labelColor}
			},
			grid: {
				borderWidth: 0,
				color: labelColor,
				hoverable: true
			}
		};

		chart.width('100%');
		var plot = $.plot(chart, data, options);

		var tip, previousPoint = null;
		chart.bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;

					var x = item.datapoint[0];
					var y = item.datapoint[1];

					var tipLabel = "<strong> " + item.series.label+ '</strong>';
					var tipContent =  '<strong>' + y + '</strong>'+ ' '+ $(this).data('title') + " pada " +  moment(x).format('MMMM');


					if (tip !== undefined) {
						$(tip).popover('destroy');
					}
					tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
					tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
				}
			}
			else {
				if (tip !== undefined) {
					$(tip).popover('destroy');
				}
				previousPoint = null;
			}
		});



    var chart = $("#admin-baru");
		var o = this;
		var labelColor = chart.css('color');
		var data = [
      {
				label: 'Panen',
				data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_produksi[$i] ?>],
          <?php } ?>

				],
				last: true
			},
			{
				label: 'Belum panen',
				data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_produksi_belum[$i] ?>],
          <?php } ?>

				],
				last: true
			},
      {
        label: 'Gagal panen',
        data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_produksi_gagal[$i] ?>],
          <?php } ?>

        ],
        last: true
      },

		];

		var options = {
			colors: chart.data('color').split(','),
			series: {
				shadowSize: 0,
				lines: {
					show: true,
					lineWidth: 2
				},
				points: {
					show: true,
					radius: 3,
					lineWidth: 2
				}
			},
			legend: {
				show: false
			},
			xaxis: {
				mode: "time",
				timeformat: "%b",
				color: 'rgba(0, 0, 0, 0)',
				font: {color: labelColor}
			},
			yaxis: {
				font: {color: labelColor}
			},
			grid: {
				borderWidth: 0,
				color: labelColor,
				hoverable: true
			}
		};

		chart.width('100%');
		var plot = $.plot(chart, data, options);

		var tip, previousPoint = null;
		chart.bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;

					var x = item.datapoint[0];
					var y = item.datapoint[1];

					var tipLabel = "<strong> Bidang " + item.series.label+ '</strong>';
					var tipContent =  '<strong>' + y + '</strong>'+ ' '+ $(this).data('title') + " pada " +  moment(x).format('MMMM');


					if (tip !== undefined) {
						$(tip).popover('destroy');
					}
					tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
					tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
				}
			}
			else {
				if (tip !== undefined) {
					$(tip).popover('destroy');
				}
				previousPoint = null;
			}
		});
  })

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
    var options = $('.sparkline-revenue-produksi2').data();
    var points = [
      <?php $sampai = date('n'); for ($i=0; $i < $sampai ; $i++) {?>
        <?php echo $p_belum_panen[$i] ?>,
      <?php } ?>
    ];
    options.type = 'line';
    options.width = '100%';
    options.height = $('.sparkline-revenue-produksi2').height() + 'px';
    options.fillColor = false;
    $('.sparkline-revenue-produksi2').sparkline(points, options);
  });
  $(function () {
    var options = $('.sparkline-revenue-produksi3').data();
    var points = [
      <?php $sampai = date('n'); for ($i=0; $i < $sampai ; $i++) {?>
        <?php echo $p_gagal_panen[$i] ?>,
      <?php } ?>
    ];
    options.type = 'line';
    options.width = '100%';
    options.height = $('.sparkline-revenue-produksi3').height() + 'px';
    options.fillColor = false;
    $('.sparkline-revenue-produksi3').sparkline(points, options);
  });


  function gd(year, month, day) {
    return new Date(year, month, day).getTime();
}
function cari_lap() {
  $(".preload1").show();
  var jenis1 = $("[name='jenis1']").val();
  var jenis2 = $("[name='jenis2']").val();
  var bulan = $("[name='bulan']").val();
  var tahun = $("[name='tahun']").val();
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/cari_lap'); ?>/"+jenis1+"/"+jenis2+"/"+bulan+"/"+tahun,
    }
  ).done(function( data )
  {
    $('#viewlap').html(data);
    $(".preload1").hide();


  });

}
function cari_lap_indeks() {
  $(".preload2").show();
  var icon = $("[name='iconi']").val();
  var jenis = $("[name='jenisi']").val();
  var tahun = $("[name='tahuni']").val();
  if (icon!='') {
    $.ajax(
      {
        type: "GET",
        url: "<?php echo base_url('Admin/cari_lap_indeks'); ?>/"+icon+"/"+jenis+"/"+tahun,
      }
    ).done(function( data )
    {
      $('#viewlapindeks').html(data);
      $(".preload2").hide();

    });
  }else {
    toastr.info("Pilih jenis produksi dahulu.", "");
  }

}

function cari_lap_pericon() {
  $(".preload3").show();
  var icon = $("[name='icon1']").val();
  var tahun = $("[name='tahun1']").val();
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Admin/cari_lap_pericon'); ?>/"+icon+"/"+tahun,
    }
  ).done(function( data )
  {
    $('#viewlapicon').html(data);
    $(".preload3").hide();

  });

}




//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker?
var markers = [];
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
  var time_now = new Date().getHours();

        var style_map;
        if (time_now >= 6 && time_now < 18){
            style_map=[
                {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
                {
                    featureType: 'administrative',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#c9b2a6'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#dcd2be'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#ae9e90'}]
                },
                {
                    featureType: 'landscape.natural',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#93817c'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry.fill',
                    stylers: [{color: '#a5b076'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#447530'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#f5f1e6'}]
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'geometry',
                    stylers: [{color: '#fdfcf8'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#f8c967'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#e9bc62'}]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry',
                    stylers: [{color: '#e98d58'}]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#db8555'}]
                },
                {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#806b63'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#8f7d77'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#ebe3cd'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry.fill',
                    stylers: [{color: '#b9d3c2'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#92998d'}]
                }
            ];
        } else {
            style_map=[
                {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#263c3f'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#6b9a76'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#38414e'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#212a37'}]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9ca5b3'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#746855'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#1f2835'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#f3d19c'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{color: '#2f3948'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#d59563'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#17263c'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#515c6d'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#17263c'}]
                }
            ];
        }


    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(-6.867428, 109.1357296);

    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 12,
      disableDefaultUI: true, //The zoom value.
      zoomControlOptions: { position: google.maps.ControlPosition.LEFT_CENTER },
      fullscreenControlOptions: { position: google.maps.ControlPosition.LEFT_TOP },
      styles: style_map

    };
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

}


//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);



$(function() {
  var url;
  var ico;
  <?php $id=$this->session->userdata('bidang'); ?>
      <?php if ($id==1): ?>
        url= "<?php echo base_url('Admin/get_all_pengguna_aktif_pertanian'); ?>";
        ico="1.png";
      <?php elseif ($id==2): ?>
        url= "<?php echo base_url('Admin/get_all_pengguna_aktif_perikanan'); ?>";
        ico="2.png";
      <?php else: ?>
        url= "<?php echo base_url('Admin/get_all_pengguna_aktif_peternakan'); ?>";
        ico="3.png";
      <?php endif; ?>


        $.ajax(
          {
            type: "GET",
            url: url,
          }
        ).done(function( data )
        {
          var jsonObj = JSON.parse(data);
          var count = Object.keys(jsonObj).length;

          for (var i = 0; i < count; i++) {
           var lat_lng = new google.maps.LatLng(jsonObj[i].lt,jsonObj[i].lg);
           var sContent = '<div class="iw-container">' +
                  '<div class="iw-title">'+jsonObj[i].nama+
                    '</div>' +
                  '<div class="iw-content">'+
									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                  '<div class="iw-subTitle">'+jsonObj[i].nik+'</div> <p>' +jsonObj[i].alamat+
                  '</p><table class="table table-responsive table-hover "><tbody><tr><td>Email</td><td>'+jsonObj[i].email+'</td></tr><tr><td>Telp</td><td>'+jsonObj[i].telp+
                  '</td></tr></tbody></table>' +	'</div>'+
                  '</div>'+'</div>';
            addMarker(lat_lng,ico,sContent);
          }

        });


})

// Adds a marker to the map and push to the array.
function addMarker(location,img,sContent) {
  var image = " <?php echo base_url('assets/uploads/icon'); ?>/"+img;
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    icon:image,
    info:sContent,
  });
  markers.push(marker);
  var infowindow = new google.maps.InfoWindow({
          content: sContent
  });


  marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
  google.maps.event.addListener(infowindow, 'domready', function() {
          var iwOuter = $('.gm-style-iw');
          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'display' : 'none'});
          iwBackground.children(':nth-child(4)').css({'display' : 'none'});
          iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
          iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
          var iwCloseBtn = iwOuter.next();
          iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
          if($('.iw-content').height() < 140){
            $('.iw-bottom-gradient').css({display: 'none'});
          }
          iwCloseBtn.mouseout(function(){
            $(this).css({opacity: '1'});
          });
        });
}
</script>
