
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div id="chart-indeks" class="flot height-6" data-title="<?php echo $title ?>" data-color="#9C27B0"></div>
      </div><!--end .card-body -->
    </div><!--end .card -->
    <em class="text-caption">Grafik Indeks Produksi <img src="<?php echo base_url('assets/uploads/icon/').$icon[0] ?>" alt=""> <?php echo $icon[1] ?></em>
  </div><!--end .col -->
</div>
<script type="text/javascript">
  $(function() {
    //=========chart panen
    var chart = $("#chart-indeks");
    var o = this;
    var labelColor = chart.css('color');
    var data = [
      {
        label: '<?php echo $label ?>',
        data: [
          <?php for ($i=0; $i < 12 ; $i++) {?>
            [gd( <?php echo date('Y'); ?>, <?php echo $i ?>, 1),<?php echo $produksi[$i] ?>],
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

    function gd(year, month, day) {
      return new Date(year, month, day).getTime();
    }

  })
</script>
