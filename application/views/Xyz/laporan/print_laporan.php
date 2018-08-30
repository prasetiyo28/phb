<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<!-- END STYLESHEETS -->

					<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967" />
					<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/morris/morris.core.css?1420463396" />

  </head>
  <body onload="load()">
    <div class="container">
      <section>
      <div class="section-body">
          <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Pengguna dalam angka</small></h2>

          <br/>
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <div id="user-baru" class="flot height-6" data-title="User Baru" data-color="#9C27B0,#22c46d,#0aa89e,#ff9800"></div>
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
                          <input type="radio" checked=""><span>Pertanian</span>
                        </label><br>
                        <label class="radio-inline radio-styled radio-info">
                          <input type="radio" checked=""><span>Perikanan</span>
                        </label><br>
                        <label class="radio-inline radio-styled radio-warning">
                          <input type="radio" checked=""><span>Peternakan</span>
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
                  <h1>Total User</h1>
                  <h2><span class="text-xxxxl"><?php echo $total_user ?></span></h2>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-success knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_pertanian ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-info knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_perikanan ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-warning knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_peternakan ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- BEGIN PRICING CARDS 2 -->
          <h2 class="text-center"><small class="text-primary">Produksi dalam angka</small></h2>
          <br/>

          <div class="row text-center">
            <div class="col-md-12">
              <div class="card style-primary">
                <div class="card-body">
                  <h1>Total Panen</h1>
                  <h2><span class="text-xxxxl"><?php echo $total_panen ?></span></h2>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-6">
              <div class="card">
                <div class="card-body no-padding">
                  <div class="alert alert-callout alert-success no-margin">
                    <?php
                    $dt1= date('n')-1;
                    $dt2= date('n')-2;
                    $sel1 = $p_pertanian[$dt1];
                    $sel2 = $p_pertanian[$dt2];
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
                    <strong class="text-xl"><?php echo $total_panen_pertanian ?></strong><br/>
                    <span class="opacity-50">Total Panen Pertanian</span>
                    <div class="stick-bottom-left-right">
                      <div class="height-2 sparkline-revenue-produksi1" data-line-color="#bdc1c1"></div>
                    </div>
                  </div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-6">
              <div class="card">
                <div class="card-body no-padding">
                  <div class="alert alert-callout alert-info no-margin">
                    <?php
                    $dt1= date('n')-1;
                    $dt2= date('n')-2;
                    $seli1 = $p_perikanan[$dt1];
                    $seli2 = $p_perikanan[$dt2];
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
                    <strong class="text-xl"><?php echo $total_panen_perikanan ?></strong><br/>
                    <span class="opacity-50">Total Panen Perikanan</span>
                    <div class="stick-bottom-left-right">
                      <div class="height-2 sparkline-revenue-produksi2" data-line-color="#bdc1c1"></div>
                    </div>
                  </div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-6">
              <div class="card">
                <div class="card-body no-padding">
                  <div class="alert alert-callout alert-warning no-margin">
                    <?php
                    $dt1= date('n')-1;
                    $dt2= date('n')-2;
                    $sela1 = $p_peternakan[$dt1];
                    $sela2 = $p_peternakan[$dt2];
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
                    <strong class="text-xl"><?php echo $total_panen_peternakan ?></strong><br/>
                    <span class="opacity-50">Total Panen Peternakan</span>
                    <div class="stick-bottom-left-right">
                      <div class="height-2 sparkline-revenue-produksi3" data-line-color="#bdc1c1"></div>
                    </div>
                  </div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->


          <div class="row">
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-success">
                  <h2 class="text-light" style="margin-bottom: 0px;">Pertanian</h2>
                  <small class="text-light"> Panen bulan ini</small>
                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_pertanian[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-info">
                  <h2 class="text-light" style="margin-bottom: 0px;">Perikanan</h2>
                  <small class="text-light"> Panen bulan ini</small>

                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_perikanan[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-warning">
                  <h2 class="text-light" style="margin-bottom: 0px;">Peternakan</h2>
                  <small class="text-light"> Panen bulan ini</small>

                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_peternakan[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
                <div class="card-body no-padding">
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- END PRICING CARDS 2 -->

          <hr>
          <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Admin dalam angka</small></h2>
          <br/>

          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <div id="admin-baru" class="flot height-6" data-title="User Baru" data-color="#9C27B0,#22c46d,#0aa89e,#ff9800"></div>
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
                          <input type="radio" checked=""><span>Pertanian</span>
                        </label><br>
                        <label class="radio-inline radio-styled radio-info">
                          <input type="radio" checked=""><span>Perikanan</span>
                        </label><br>
                        <label class="radio-inline radio-styled radio-warning">
                          <input type="radio" checked=""><span>Peternakan</span>
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
              <div class="card style-accent">
                <div class="card-body">
                  <h1>Total Admin</h1>
                  <h2><span class="text-xxxxl"><?php echo $total_admin ?></span></h2>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div>

          <div class="row">
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-success knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_pertanian ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-info knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_perikanan ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4 col-xs-4">
              <div class="card">
                <div class="card-body text-center">
                  <div class="knob knob-warning knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_peternakan ?>" data-readOnly=true></div>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- BEGIN PRICING CARDS 2 -->

          <div class="row">
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-success">
                  <h2 class="text-light" style="margin-bottom: 0px;">Pertanian</h2>
                  <small class="text-light"> Panen bulan ini</small>
                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_pertanian[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-info">
                  <h2 class="text-light" style="margin-bottom: 0px;">Perikanan</h2>
                  <small class="text-light"> Panen bulan ini</small>

                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_perikanan[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
            <div class="col-md-4 col-xs-4">
              <div class="card card-type-pricing">
                <div class="card-body text-center style-warning">
                  <h2 class="text-light" style="margin-bottom: 0px;">Peternakan</h2>
                  <small class="text-light"> Panen bulan ini</small>

                  <div class="price">
                    <h2><span class="text-xxxl"><?php echo $p_peternakan[$dt1] ?></span></h2> <span>x Panen</span>
                  </div>
                  <br/>
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- END PRICING CARDS 2 -->



      </div><!--end .section-body -->
    </section>
    </div>
    <!-- BEGIN JAVASCRIPT -->
    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/spin.js/spin.min.js"></script>


    <script src="<?php echo base_url();?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/core/source/App.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppNavigation.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppCard.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppForm.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppNavSearch.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppVendor.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/demo/Demo.js"></script>

    <?php if ($chart==true): ?>
          <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.min.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.time.min.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.resize.min.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.orderBars.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.pie.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/flot/curvedLines.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
          <script src="<?php echo base_url();?>assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
    <?php endif; ?>

    <script type="text/javascript">
    $( document ).ready(function() {
      cetak();
    });
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
    				label: 'Pertanian',
    				data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_pertanian[$i] ?>],
              <?php } ?>

    				],
    				last: true
    			},
          {
            label: 'Perikanan',
            data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_perikanan[$i] ?>],
              <?php } ?>

            ],
            last: true
          },
          {
            label: 'Peternakan',
            data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_peternakan[$i] ?>],
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



        var chart = $("#admin-baru");
    		var o = this;
    		var labelColor = chart.css('color');
    		var data = [
          {
    				label: 'Total',
    				data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ab_total[$i] ?>],
              <?php } ?>

    				],
    				last: true
    			},
    			{
    				label: 'Pertanian',
    				data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ab_pertanian[$i] ?>],
              <?php } ?>

    				],
    				last: true
    			},
          {
            label: 'Perikanan',
            data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ab_perikanan[$i] ?>],
              <?php } ?>

            ],
            last: true
          },
          {
            label: 'Peternakan',
            data: [
              <?php for ($i=0; $i < 12 ; $i++) {?>
                [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ab_peternakan[$i] ?>],
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
            <?php echo $p_pertanian[$i] ?>,
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
            <?php echo $p_perikanan[$i] ?>,
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
            <?php echo $p_peternakan[$i] ?>,
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
    function load() {
    $('#modal_load').modal('show');
    $('#modal_load').data('bs.modal').$backdrop.css('background-color','white');
    }
    function cetak() {
       $('#loader').hide();
      setTimeout(function () {
        $('#modal_cetak').modal('show');
        $('#modal_cetak').data('bs.modal').$backdrop.css('background-color','white');
        btn_print();
      }, 2000);

    }
    function btn_print() {
      $('#btn_print').hide();
      window.print();
        $('#btn_print').show();
    }
    </script>


    <div id="modal_load" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <center>
          <div class="col-md-12 height-12">
            <img src="<?php echo base_url('assets/img/preloadertransparant1.gif') ?>" style="max-width:500px" id="loader">
          </div>
        </center>

      </div>
    </div>

    <div id="modal_cetak" class="modal fade" role="dialog">
      <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <center>
          <div class="col-md-12 height-12">
            <br><br><br><br>
            <button type="button" class="btn btn-primary" onclick="btn_print()" id="btn_print">cetak</button>
          </div>
        </center>


      </div>
    </div>

  </body>
</html>
