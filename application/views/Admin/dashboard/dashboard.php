<div id="content">
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Admin') ?>">home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <div class="row">

              <!-- TODAY -->
              <div class="col-md-3">
                <div class="card">
                  <div class="card-head">
                    <header>Today's stats</header>
                    <div class="tools hidden-md">
                      <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                    </div>
                  </div><!--end .card-head -->
                  <div class="card-body height-8">
                    <?php
                    if ($total_user == 0) {
                          $hasil_bagi = "0";
                          $hasil_bagi1 = "0";
                      } else { //jika pembagi tidak 0
                          $hasil_bagi = ($total_user_l / $total_user)*100;
                          $hasil_bagi1 = ($total_user_p / $total_user)*100;
                      } ?>
                    <strong><?php echo $total_user_l ?></strong> Pengguna L
                    <span class="pull-right text-success text-sm"><?php echo $hasil_bagi ?>% </span>
                    <div class="progress progress-hairline">
                      <div class="progress-bar progress-bar-primary-dark" style="width:<?php echo $hasil_bagi ?>%"></div>
                    </div>
                    <strong><?php echo $total_user_p ?></strong> Pengguna P
                    <span class="pull-right text-success text-sm"><?php echo $hasil_bagi1 ?>% </span>
                    <div class="progress progress-hairline">
                      <div class="progress-bar progress-bar-primary-dark" style="width:<?php echo $hasil_bagi1 ?>%"></div>
                    </div>
                    <?php echo $kunjungan ?> Kunjungan hari ini
                    <span class="pull-right text-success text-sm"><?php echo $kunjungan/100 ?>% </span>
                    <div class="progress progress-hairline">
                      <div class="progress-bar progress-bar-primary-dark" style="width:<?php echo $kunjungan/100 ?>%"></div>
                    </div>
                    <?php echo $login_user?> Pengguna login hari ini
                    <span class="pull-right text-success text-sm"><?php echo $login_user/100 ?>% </span>
                    <div class="progress progress-hairline">
                      <div class="progress-bar progress-bar-primary-dark" style="width:<?php echo $login_user/100 ?>%"></div>
                    </div>
                    <?php echo $login_admin ?> Admin login hari ini
                    <span class="pull-right text-success text-sm"><?php echo $login_admin/100 ?>% </span>
                    <div class="progress progress-hairline">
                      <div class="progress-bar progress-bar-primary-dark" style="width:<?php echo $login_admin/100 ?>%"></div>
                    </div>
                  </div><!--end .card-body -->
                </div><!--end .card -->
                <div class="card">
                  <div class="card-head">
                    <header>Pendaftar baru</header>
                    <div class="tools hidden-md">
                      <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                    </div>
                  </div><!--end .card-head -->
                  <div class="card-body no-padding height-8 scroll">
                    <ul class="list divider-full-bleed">
                      <?php foreach ($user_today as $a): ?>
                      <li class="tile">
                        <div class="tile-content">
                          <div class="tile-icon">
                            <img src="<?php echo base_url()?>assets/uploads/<?php echo $a->foto ?>" alt="" />
                          </div>
                          <div class="tile-text"><?php echo $a->nama ?></div>
                        </div>
                        <a class="btn btn-flat ink-reaction" onclick="profil('<?php echo $a->id_user ?>')">
                          <i class="md md-chevron-right text-default-light"></i>
                        </a>
                      </li>
                    <?php endforeach; ?>
                    </ul>
                  </div><!--end .card-body -->
                </div><!--end .card -->
              </div><!--end .col -->
              <!--TODAY -->
              <div class="col-md-8">
                <div class="card">
                  <div class="card-head">
                    <header>Histori Pendaftaran</header>
                    <div class="tools">
                      <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                      <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                    </div>
                  </div><!--end .card-head -->
                  <div class="card-body no-padding height-9">
                    <div class="row">
                      <div class="col-sm-6 hidden-xs">
                        <div class="force-padding text-sm text-default-light">
                          <p>
                            <i class="md md-mode-comment text-primary-light"></i>
                            Info grafis pendaftar sebagai pengguna selama setahun.
                          </p>
                        </div>
                      </div><!--end .col -->
                      <div class="col-sm-6">
                        <div class="force-padding pull-right text-default-light">
                          <h2 class="no-margin text-primary-dark"><span class="text-xxl"><?php echo $total_user ?></span></h2>
                          <i class="fa fa-caret-up text-success fa-fw"></i> Total pengguna
                        </div>
                      </div><!--end .col -->
                    </div><!--end .row -->
                    <div class="stick-bottom-left-right force-padding">
                      <div id="myChart" class="flot height-5" data-title="Registration history" data-color="#9C27B0"></div>
                    </div>
                  </div><!--end .card-body -->
                </div><!--end .card -->
              </div>
        <!-- END REGISTRATION HISTORY -->
      </div><!--end .row -->
    </div><!--end .section-body -->
  </section>
</div>


<div id="viewcanvas">
</div>

<script type="text/javascript">
$( document ).ready(function() {
//=========chart panen
var chart = $("#myChart");
var o = this;
var labelColor = chart.css('color');
var data = [
  {
    label: 'Pengguna',
    data: [
      <?php for ($i=0; $i < 12 ; $i++) {?>
        [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $ub_total[$i] ?>],
      <?php } ?>

    ],
    last: true
  },
];


var options = {
  colors: chart.data('color'),
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

function gd(year, month, day) {
  return new Date(year, month, day).getTime();
}

});

function profil(id) {
  var data = new FormData();
      data.append('id', id);
      data.append('level', 'user');
  $.ajax({
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            url:"<?php echo base_url('Xyz/makesesion/') ?>",
            success: function(data)
            {
              if (data=='1') {
                window.location.href="<?php echo base_url('Xyz/profile/') ?>";
              }else {
                toastr.info("Gagal membuka halaman, coba lagi.", "");
              }

            },
            error:function(data)
            {toastr.info("Terjadi kesalahan, coba lagi.", "");}
        });
}



</script>
