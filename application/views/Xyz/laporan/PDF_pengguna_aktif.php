<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/materialadmin.css?1425466319" />

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />

    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967" />

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/morris/morris.core.css?1420463396" />
    <?php if ($map==true): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666" />
		<style type="text/css">
		.map-wrapper {
		position: relative;
		height: 100%;
		width: 100%;
		}

		#map {
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		}
	.gm-style-iw {
	width: 350px !important;
	top: 15px !important;
	left: 0px !important;
	background-color: #fff;
	box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
	border: 1px solid rgba(72, 181, 233, 0.6);
	border-radius: 10px 10px 10px 10px;
}
.iw-container {
	margin-bottom: 10px;
}
.iw-container .iw-title {
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 22px;
	font-weight: 400;
	padding: 10px;
	background-color: #2196f3;
	color: white;
	margin: 0;
	border-radius: 2px 2px 0 0;
}
.iw-container .iw-content {
	font-size: 13px;
	line-height: 18px;
	font-weight: 400;
	margin-right: 1px;
	padding: 15px 5px 20px 15px;
	max-height: 140px;
	overflow-y: auto;
	overflow-x: hidden;
}
.iw-content img {
	float: right;
	margin: 0 5px 5px 10px;
}
.iw-subTitle {
	font-size: 16px;
	font-weight: 700;
	padding: 5px 0;
}
.iw-bottom-gradient {
	position: absolute;
	width: 326px;
	height: 25px;
	bottom: 10px;
	right: 18px;
	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
}

.gm-style-iw-a {
width: 350px !important;
top: 15px !important;
left: 0px !important;
background-color: #fff;
box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
border: 1px solid rgba(72, 181, 233, 0.6);
border-radius: 10px 10px 10px 10px;
}
.iw-container-a {
margin-bottom: 10px;
}
.iw-container-a .iw-title-a {
font-family: 'Open Sans Condensed', sans-serif;
font-size: 22px;
font-weight: 400;
padding: 10px;
background-color: #2196f3;
color: white;
margin: 0;
border-radius: 2px 2px 0 0;
}
.iw-container-a .iw-content-a-a {
font-size: 13px;
line-height: 18px;
font-weight: 400;
margin-right: 1px;
padding: 15px 5px 20px 15px;
max-height: 140px;
overflow-y: auto;
overflow-x: hidden;
}
.iw-content-a img {
float: right;
margin: 0 5px 5px 10px;
}
.iw-subTitle-a {
font-size: 16px;
font-weight: 700;
padding: 5px 0;
}
.iw-bottom-gradient-a {
position: absolute;
width: 326px;
height: 25px;
bottom: 10px;
right: 18px;
background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
}
		</style>
		<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCz1LkOZmWBZRyC1WUJcrOqZiK-7yMuQXk&libraries=places'></script>
		<?php endif; ?>

  </head>
  <body>


    <div id="base">
      <div id="content">


        <section>
        <div class="section-body">
            <h2 class="text-light text-center">Info Grafis<br/><small class="text-primary"><?php echo $laporan ?></small></h2>
            <br/>

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
                      <h2><span class="text-xxxxl"><?php echo count($pengguna)  ?></span></h2>
                    </div><!--end .card-body -->
                  </div><!--end .card -->
                </div><!--end .col -->
              </div>

              <div class="row">
                <div class="col-md-6  col-sm-6 col-xs-6">
                  <div class="card text-center">
                    <div class="card-head"><header>Laki-laki</header></div>
                    <div class="card-body ">
                      <div class="knob knob-success knob-default-track size-4"><input type="text" id="dial1" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_l ?>" data-readOnly=true></div>
                    </div><!--end .card-body -->
                  </div><!--end .card -->
                </div><!--end .col -->
                <div class="col-md-6  col-sm-6 col-xs-6">
                  <div class="card text-center">
                    <div class="card-head"><header>Perempuan</header></div>
                    <div class="card-body ">
                      <div class="knob knob-info knob-default-track size-4"><input type="text" id="dial2" data-min="0" data-max="<?php echo count($pengguna) ?>" value="<?php echo $total_user_p ?>" data-readOnly=true></div>
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
                            <td>Di verifikasi</td>
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



		</div><!--end #base-->





    <script type="text/javascript">
    $( document ).ready(function() {
      $('.dial').each(function () {
        var options = materialadmin.App.getKnobStyle($(this));
        $(this).knob(options);
      });

    });

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
      <?php if ($id==1): ?>
        url= "<?php echo base_url('Xyz/get_all_pertanian'); ?>"
      <?php elseif ($id==2): ?>
      url= "<?php echo base_url('Xyz/get_all_perikanan'); ?>"
      <?php else: ?>
      url= "<?php echo base_url('Xyz/get_all_peternakan'); ?>"

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
                      '<div class="iw-title">'+jsonObj[i].jenis_produksi+
                        '</div>' +
                      '<div class="iw-content">'+
    									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                      '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                      '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                      ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                      '</div>'+'</div>';
                addMarker(lat_lng,jsonObj[i].icon,sContent);
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



    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/spin.js/spin.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/autosize/jquery.autosize.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>



    <script src="<?php echo base_url();?>assets/js/core/source/App.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppNavigation.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppCard.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppForm.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppNavSearch.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/source/AppVendor.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/demo/Demo.js"></script>

    <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/flot/curvedLines.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/libs/sparkline/jquery.sparkline.min.js"></script>

  </body>
</html>
