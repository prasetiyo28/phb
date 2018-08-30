<div id="content">


  <section>
  <div class="section-body">
      <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Pengguna dalam angka</small> <?php echo $this->session->userdata('bidang') ?></h2>

      <center>
      <a href="<?php echo base_url('Xyz/print_laporan/') ?>" target="_blank" type="button" class="btn ink-reaction btn-floating-action btn-primary"><i class="fa fa-print"></i></a>
    </center>
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
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-success knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_pertanian ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Pertanian</em>
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-info knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_perikanan ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Perikanan</em>
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-warning knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_user ?>" value="<?php echo $total_user_peternakan ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Peternakan</em>
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
        <div class="col-md-4">
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
                <span class="opacity-50">Total Panen</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi1" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Grafik panen pertanian</em>
        </div><!--end .col -->
        <div class="col-md-4">
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
                <span class="opacity-50">Total Panen</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi2" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Grafik panen perikanan</em>
        </div><!--end .col -->
        <div class="col-md-4">
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
                <span class="opacity-50">Total Panen</span>
                <div class="stick-bottom-left-right">
                  <div class="height-2 sparkline-revenue-produksi3" data-line-color="#bdc1c1"></div>
                </div>
              </div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Grafik panen peternakan</em>
        </div><!--end .col -->
      </div><!--end .row -->


      <div class="row">
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-success">
              <h2 class="text-light" style="margin-bottom: 0px;">Pertanian</h2>
              <small class="text-light"> Panen bulan ini</small>
              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_pertanian[$dt1] ?></span></h2> <span>x Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
            <div class="card-body no-padding">
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_aktif/1'; ?>" class="tile-content ink-reaction">Laporan data pengguna aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_blokir/1'; ?>" class="tile-content ink-reaction">Laporan data pengguna diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/produksi/1'; ?>" class="tile-content ink-reaction">Laporan data panen. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-info">
              <h2 class="text-light" style="margin-bottom: 0px;">Perikanan</h2>
              <small class="text-light"> Panen bulan ini</small>

              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_perikanan[$dt1] ?></span></h2> <span>x Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
            <div class="card-body no-padding">
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_aktif/2'; ?>" class="tile-content ink-reaction">Laporan data pengguna aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_blokir/2'; ?>" class="tile-content ink-reaction">Laporan data pengguna diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/produksi/2'; ?>" class="tile-content ink-reaction">Laporan data panen. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
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
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_aktif/3'; ?>" class="tile-content ink-reaction">Laporan data pengguna aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/pengguna_blokir/3'; ?>" class="tile-content ink-reaction">Laporan data pengguna diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/produksi/3'; ?>" class="tile-content ink-reaction">Laporan data panen. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END PRICING CARDS 2 -->
      <hr>
      <h2 class="text-light text-center">Laporan per tanaman / hewan<br/></h2>
      <br/>

      <div class="col-lg-offset-3 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="col-md-12">
              <div class="col-md-5 col-xs-12">
                <select class="form-control" name="icon1">
                  <option value="">-pilih-</option>
                  <?php foreach ($icon as $ic):
                    ?>
                    <option  value="<?php echo $ic->id_icon ?>"> <?php echo $ic->nama ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-5 col-xs-12">
                <select class="form-control" name="tahun1">
                  <?php $tahun = date('Y'); for ($i=0; $i <5 ; $i++) { ?>
                    <option value="<?php echo $tahun-$i; ?>"><?php echo $tahun-$i; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-2 col-xs-12">
                <button type="button" onclick="cari_lap_pericon()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-12">
        <div class="preload1 text-center" style="display:none;">
          <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
          <p class="preload-text"></p>
        </div>
        <div id="viewlapicon">

        </div>
      </div>


  <div class="col-xs-12 col-md-12">
    <hr>
    <h2 class="text-light text-center">Grafik<br/><small class="text-primary">Indeks Harga,tanam, panen dan gagal panen</small></h2>
    <br/>
      <div class="card">
        <div class="card-body">
          <div class="col-md-12">
            <div class="col-md-3 col-xs-12">
              <select class="form-control" name="bidang">
                <option value="">-pilih-</option>
                <option value="1">Pertanian</option>
                <option value="2">Perikanan</option>
                <option value="3">Peternakan</option>
              </select>
            </div>
            <div class="col-md-3 col-xs-12">
              <select class="form-control" name="icon">
                <option value="">-pilih-</option>
                <?php foreach ($icon as $ic):
                  if ($ic->bidang=='1') {
                    $pclas='a1';
                  }elseif ($ic->bidang=='2') {
                    $pclas='a2';
                  }else {
                    $pclas='a3';
                  }
                  ?>
                  <option class="<?php echo $pclas ?>" value="<?php echo $ic->id_icon ?>"> <?php echo $ic->nama ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3 col-xs-12">
              <select class="form-control" name="jenis">
                <option value="1">Harga</option>
                <option value="2">Tanam</option>
                <option value="3">Panen</option>
                <option value="4">Gagal Panen</option>
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
              <button type="button" onclick="cari_lap_indeks()" name="button" class="btn ink-reaction btn-floating-action btn-primary"> <i class="fa fa-search"></i> </button>
            </div>

          </div>
        </div>
      </div>
      <div class="preload2 text-center" style="display:none;">
        <img src="<?php echo base_url() ?>/assets/img/preloader.gif" alt="" style="width:50px"> <br>
        <p class="preload-text"></p>
      </div>
        <div id="viewlap">

        </div>

  </div>



  <div class="col-md-12">
    <hr>
    <h2 class="text-light text-center">Laporan<br/><small class="text-primary">Admin dalam angka</small></h2>
    <br/>
  </div>

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
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-success knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_pertanian ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Pertanian</em>
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-info knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_perikanan ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Perikanan</em>
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <div class="knob knob-warning knob-default-track size-4"><input type="text" class="dial" data-min="0" data-max="<?php echo $total_admin ?>" value="<?php echo $total_admin_peternakan ?>" data-readOnly=true></div>
            </div><!--end .card-body -->
          </div><!--end .card -->
          <em class="text-caption">Peternakan</em>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- BEGIN PRICING CARDS 2 -->

      <div class="row">
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-success">
              <h2 class="text-light" style="margin-bottom: 0px;">Pertanian</h2>
              <small class="text-light"> Panen bulan ini</small>
              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_pertanian[$dt1] ?></span></h2> <span>x Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
            <div class="card-body no-padding">
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_aktif/1'; ?>" class="tile-content ink-reaction">Laporan data admin aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_blokir/1'; ?>" class="tile-content ink-reaction">Laporan data admin diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
          <div class="card card-type-pricing">
            <div class="card-body text-center style-info">
              <h2 class="text-light" style="margin-bottom: 0px;">Perikanan</h2>
              <small class="text-light"> Panen bulan ini</small>

              <div class="price">
                <h2><span class="text-xxxl"><?php echo $p_perikanan[$dt1] ?></span></h2> <span>x Panen</span>
              </div>
              <br/>
            </div><!--end .card-body -->
            <div class="card-body no-padding">
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_aktif/2'; ?>" class="tile-content ink-reaction">Laporan data admin aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_blokir/2'; ?>" class="tile-content ink-reaction">Laporan data admin diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
        <div class="col-md-4">
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
              <ul class="list list-unstyled text-left">
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_aktif/3'; ?>" class="tile-content ink-reaction">Laporan data admin aktif. <i class="md md-keyboard-arrow-right pull-right"></i> </a> </li>
                <li class="tile"> <a href="<?php echo base_url().'Xyz/admin_blokir/3'; ?>" class="tile-content ink-reaction">Laporan data admin diblokir. <i class="md md-keyboard-arrow-right pull-right"></i></a></li>
              </ul>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END PRICING CARDS 2 -->

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

function cari_lap_indeks() {
  $('.preload2').show();
  var bidang = $("[name='bidang']").val();
  var icon = $("[name='icon']").val();
  var jenis = $("[name='jenis']").val();
  var tahun = $("[name='tahun']").val();
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/cari_lap_indeks'); ?>/"+bidang+"/"+icon+"/"+jenis+"/"+tahun,
    }
  ).done(function( data )
  {
    $('#viewlap').html(data);
    $('.preload2').hide();

  });
}
function cari_lap_pericon() {
  $('.preload1').show();
  var icon = $("[name='icon1']").val();
  var tahun = $("[name='tahun1']").val();
  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/cari_lap_pericon'); ?>/"+icon+"/"+tahun,
    }
  ).done(function( data )
  {
    $('#viewlapicon').html(data);
    $('.preload1').hide();
  });

}

$(function() {
  $('[name="bidang"]').change(function (){
      var a = $("[name='bidang']").val();
      if (a==1) {
        $(".a2").hide();
        $(".a3").hide();
        $(".a1").show();
      }else if (a==2) {
        $(".a1").hide();
        $(".a3").hide();
        $(".a2").show();
      }else {
        $(".a1").hide();
        $(".a2").hide();
        $(".a3").show();
      }
  });
})
</script>
