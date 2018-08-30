<div id="content">


  <section>
  <div class="section-body">
      <h2 class="text-light text-center">Laporan<br/><small class="text-primary"><?php echo $laporan ?></small></h2>
      <br/>

		<h4> <i class="fa fa-circle-o text-primary"></i> Tabel Pengguna</h4>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tbl_pengguna" class="table table-striped table-hover dataTable no-footer" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Agama</th>
                  <th>Pendidikan</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0; foreach ($pengguna as $p): $no++;?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><span <?php if ($p->v_ktp=='1'): ?>
                     class="text-success"
                    <?php else: ?>
                       class="text-danger"
                  <?php endif; ?>><?php echo $p->nik ?></span>
                  </td>
                  <td><?php echo $p->nama ?></td>
                  <td><?php echo $p->tempat_lahir.', '.tgl_indo($p->tgl_lahir); ?></td>
                  <td><span <?php if ($p->v_telp=='1'): ?>
                     class="text-success"
                    <?php else: ?>
                       class="text-danger"
                  <?php endif; ?>><?php echo $p->telp ?></span>
                    </td>
                    <td><span <?php if ($p->v_email=='1'): ?>
                     class="text-success"
                    <?php else: ?>
                       class="text-danger"
                  <?php endif; ?>><?php echo $p->email ?></span>
                    </td>
                  <td><?php echo $p->agama ?></td>
                  <td><?php echo $p->pendidikan ?></td>
                  <td><?php echo $p->alamat ?></td>

                </tr>
              <?php endforeach; ?>

              </tbody>
            </table>

          </div>
        </div>
      </div>
      <em class="text-caption"> <span class="text-success"><i class="fa fa-circle"></i> Sudah di verifikasi</span> | <span class="text-danger"><i class="fa fa-circle"></i> Belum di verifikasi</span> </em>


      <hr>
      <div class="pull-right">
        <button type="button" onclick="printDiv('printDiv')" class="btn btn-block ink-reaction btn-default-bright "> Print</button>
      </div>
      <h4> <i class="fa fa-circle-o text-primary"></i> Info Grafis Pengguna</h4>

      <br>
    <div id="printDiv">
      <div class="col-md-12">
            <div class="height-6">
              <div id="map" style="position: absolute;top: 0;bottom: 0;right: 0;left: 0;"></div>
        </div>
      </div>

        <div class="row text-center">
          <div class="col-md-12 col-xs-12">
            <div class="card style-primary">
              <div class="card-body">
                <h1>Total <?php echo $laporan ?></h1>
                <h2><span class="text-xxxl"><?php echo count($pengguna)  ?></span></h2>
              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="card text-center">
              <div class="card-head"><header>Laki-laki</header></div>
              <div class="card-body ">
                <div class="knob knob-success knob-default-track size-4 a"><input type="text" class="dial" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_l ?>" data-readOnly=true></div>
                <div class="knob knob-success knob-default-track size-4 b"><input type="text" class="dial1" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_l ?>" data-readOnly=true></div>
              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
          <div class="col-md-6 col-sm-6">
            <div class="card text-center">
              <div class="card-head"><header>Perempuan</header></div>
              <div class="card-body ">
                <div class="knob knob-info knob-default-track size-4 a"><input type="text" class="dial" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_p ?>" data-readOnly=true></div>
                <div class="knob knob-info knob-default-track size-4 b"><input type="text" class="dial1" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_p ?>" data-readOnly=true></div>
              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
        </div><!--end .row -->

        <div class="row text-center">
          <div class="col-md-12 col-xs-12">
            <div class="card">
              <div class="card-body">
                <h2>Detail Verifikasi</h2>
                <table class="table table-striped no-footer">
                  <thead>
                    <tr>
                      <td></td>
                      <td>Sudah di verifikasi</td>
                      <td>Belum di verifikasi</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>KTP</td>
                      <td><?php echo $v_ktp[0] ?></td>
                      <td><?php echo $v_ktp[1] ?></td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td><?php echo $v_telp[0] ?></td>
                      <td><?php echo $v_telp[1] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo $v_email[0] ?></td>
                      <td><?php echo $v_email[1] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
        </div>
    </div>




  </div><!--end .section-body -->
</section>
</div>


<div id="viewcanvas"></div>

<script type="text/javascript">
$( document ).ready(function() {
  $('.dial').each(function () {
    var options = materialadmin.App.getKnobStyle($(this));
    $(this).knob(options);
  });
  $('.b').each(function () {
    $(this).hide();
  });;

$('#tbl_pengguna').dataTable({
  "dom": 'T<"clear">lfrtip',
     "tableTools": {
         "sSwfPath": " <?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> "
     }
        });

});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     $('.a').each(function () {
       $(this).hide();
     });
     $('.b').each(function () {
       $(this).show();
     });
     $('.dial1').each(function () {
       var options = materialadmin.App.getKnobStyle($(this));
       $(this).knob(options);
     });
     $('canvas').css("vertical-align", "unset");
     window.print();
     $('.b').each(function () {
       $(this).hide();
     });
     $('.a').each(function () {
       $(this).show();
     });

     document.body.innerHTML = originalContents;


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
  <?php if ($lp=='aktif'): ?>

      <?php if ($id==1): ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_aktif_pertanian'); ?>";
        ico="1.png";
      <?php elseif ($id==2): ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_aktif_perikanan'); ?>";
        ico="2.png";
      <?php else: ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_aktif_peternakan'); ?>";
        ico="3.png";
      <?php endif; ?>
  <?php else: ?>
      <?php if ($id==1): ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_blokir_pertanian'); ?>";
        ico="1.png";
      <?php elseif ($id==2): ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_blokir_perikanan'); ?>";
        ico="2.png";
      <?php else: ?>
        url= "<?php echo base_url('Xyz/get_all_pengguna_blokir_peternakan'); ?>";
        ico="3.png";
      <?php endif; ?>
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
