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

				<!-- BEGIN BLANK SECTION -->
        <div class="map-wrapper" style="position:fixed;top: 65px;">
          <div id="map"></div>
        </div>
        <!-- BEGIN SECTION ACTION -->

        <div style="position: fixed; z-index: 1001; top: 7em; width: 17%;    right: 20px;">
          <a id="btn_menu" onclick="menu_tampil()" class="btn ink-reaction btn-floating-action btn-lg btn-info pull-right"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Menu">
            <i class="md md-menu"></i>
          </a>
          <a id="btn_clear" onclick="menu_sembunyi()" class="btn ink-reaction btn-floating-action btn-lg btn-info pull-right" style="display:none;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tutup">
            <i class="md md-clear-all"></i>
          </a>
          <br><br><br>
          <!-- BEGIN TODOS -->
      							<div id="divmenu" class="col-md-12 pull-right" style="display:none;">
      								<div class="card ">
      									<div class="card-head style-info">
      										<header>Data</header>
      										<div class="tools">
                            <i class="md md-crop-square" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bersihkan" onclick="btn_bersih_cb()"></i>
      										</div>
      									</div><!--end .card-head -->
      									<div class="card-body no-padding">
      										<ul class="list divider-full-bleed" data-sortable="true">
      											<li id="menu1" class="tile" style="display:none; background:white;">
      												<div class="checkbox checkbox-styled tile-text">
      													<label>
      														<input type="checkbox" id="cb_pertanian">
      														<span>Pertanian</span>
      													</label>
      												</div>
      											</li>
                            <li id="menu2" class="tile" style="display:none; background:white;">
      												<div class="checkbox checkbox-styled tile-text">
      													<label>
      														<input type="checkbox" id="cb_peternakan">
      														<span>Peternakan</span>
      													</label>
      												</div>
      											</li>
                            <li id="menu3" class="tile" style="display:none; background:white;">
      												<div class="checkbox checkbox-styled tile-text">
      													<label>
      														<input type="checkbox" id="cb_perikanan">
      														<span>Perikanan</span>
      													</label>
      												</div>
      											</li>

      										</ul>
      									</div><!--end .card-body -->
      								</div><!--end .card -->
      							</div><!--end .col -->
      							<!-- END TODOS -->
        </div>
				<!-- BEGIN BLANK SECTION -->
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

    <div id="viewcanvas"></div>
    <script type="text/javascript" >
    $(function() {
      toastr.options.closeButton = false;
        toastr.options.progressBar = false;
        toastr.options.debug = false;
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.options.showDuration = 333;
        toastr.options.hideDuration = 333;
        toastr.options.timeOut = 4000;
        toastr.options.extendedTimeOut = 4000;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'swing';
        toastr.options.showMethod = 'slideDown';
        toastr.options.hideMethod = 'slideUp';
        <?php if ($this->session->flashdata('alert')==true) {
        echo $this->session->flashdata('alert');
      } ?>
    })
    function menu_tampil() {
      $('#btn_menu').hide();
      $('#btn_clear').show();
      $('#divmenu').show("fast");
      $('#menu1').animate({ top: "+=50" }, "fast" ).fadeIn()
                 .animate({ top: '-=50' }, "fast" );
      $('#menu2').delay(300).animate({ top: "+=50" }, "fast" ).fadeIn()
                 .animate({ top: '-=50' }, "fast" );
      $('#menu3').delay(600).animate({ top: "+=50" }, "fast" ).fadeIn()
                 .animate({ top: '-=50' }, "fast" );
    }
    function menu_sembunyi() {
      $('#btn_menu').show();
      $('#btn_clear').hide();
      $('#menu3').hide("fast");
      $('#menu2').hide("fast");
      $('#menu1').hide("fast");
      $('#divmenu').hide("fast");
    }
    function btn_bersih_cb() {
    $('#cb_pertanian').prop('checked', false);
    $('#cb_peternakan').prop('checked', false);
    $('#cb_perikanan').prop('checked', false);
    deleteMarkers('1');
    deleteMarkers('2');
    deleteMarkers('3');
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
          zoomControl: true,
          zoomControlOptions: { position: google.maps.ControlPosition.LEFT_CENTER },
          fullscreenControl: true,
          fullscreenControlOptions: { position: google.maps.ControlPosition.LEFT_TOP },
          styles: style_map

        };
        //Create the map object.
        map = new google.maps.Map(document.getElementById('map'), options);

    }

    //This function will get the marker's current location and then add the lat/long
    //values to our textfields so that we can save the location.
    function markerLocation(){
      var geocoder = new google.maps.Geocoder;

        //Get location.
        var currentLocation = marker.getPosition();
        //Add lat and lng values to a field that we can save.
        document.getElementById('lat1').value = currentLocation.lat(); //latitude
        document.getElementById('lng1').value = currentLocation.lng(); //longitude

        var latlng = {lat: parseFloat(currentLocation.lat()), lng: parseFloat(currentLocation.lng())};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[1]) {
              document.getElementById('lokasi_lahan').value =results[1].formatted_address;
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
        $('#form_produksi')[0].reset();
        $('#modal_add_produksi').modal('show');
    }


    //Load the map when the page has finished loading.
    google.maps.event.addDomListener(window, 'load', initMap);

    $(function() {
      var get_mark1=false;
      var get_mark2=false;
      var get_mark3=false;

      $('#cb_pertanian').click(function() {
        if ($('#cb_pertanian').is(':checked')) {
          if (get_mark1==false) {
            $.ajax(
              {
                type: "GET",
                url: "<?php echo base_url('Frontend/get_all_pertanian'); ?>"
              }
            ).done(function( data )
            {
              var jsonObj = JSON.parse(data);
              var count = Object.keys(jsonObj).length;

              for (var i = 0; i < count; i++) {
               var lat_lng = new google.maps.LatLng(jsonObj[i].lt,jsonObj[i].lg);
               var sContent = '<div class="iw-container">' +
                      '<div class="iw-title">'+jsonObj[i].jenis_produksi+'<div class="pull-right">'+
                        '<div class="btn-group">'+
                        '<a class="btn btn-icon-toggle" onclick="detail('+jsonObj[i].id_produksi+')"><i class="fa fa-eye"></i></a>'+
                        '</div></div></div>' +
                      '<div class="iw-content">'+
    									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                      '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                      '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                      ' (kg/ekor)</td></tr><tr><td>Harga Perkiraan Perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                      '</div>'+'</div>';
                addMarker(lat_lng,"1",jsonObj[i].icon,sContent);
              }
                get_mark1=true;
            });
          }else {
            setMapOnAll(map,'1');
          }
        }else {
          deleteMarkers('1');
        }
      });
      $('#cb_peternakan').click(function() {

        if ($('#cb_peternakan').is(':checked')) {
          if (get_mark2==false) {
            $.ajax(
              {
                type: "GET",
                url: "<?php echo base_url('Frontend/get_all_peternakan'); ?>"
              }
            ).done(function( data )
            {
              var jsonObj = JSON.parse(data);
              var count = Object.keys(jsonObj).length;
              for (var i = 0; i < count; i++) {
               var lat_lng = new google.maps.LatLng(jsonObj[i].lt,jsonObj[i].lg);
               var sContent = '<div class="iw-container">' +
                      '<div class="iw-title">'+jsonObj[i].jenis_produksi+'<div class="pull-right">'+
                        '<div class="btn-group">'+
                          '<a class="btn btn-icon-toggle" onclick="detail('+jsonObj[i].id_produksi+')"><i class="fa fa-eye"></i></a>'+
                        '</div></div></div>' +
                      '<div class="iw-content">'+
    									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 24px;" >'+
                      '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                      '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                      ' (kg/ekor)</td></tr><tr><td>Harga Perkiraan Perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                      '</div>'+'</div>';
                addMarker(lat_lng,"3",jsonObj[i].icon,sContent);
              }
              get_mark2=true;
            });
          }else {
            setMapOnAll(map,'3');
          }
        }else {
          deleteMarkers('3');
        }
      });
      $('#cb_perikanan').click(function() {
        if ($('#cb_perikanan').is(':checked')) {
          if (get_mark3==false) {
            $.ajax(
              {
                type: "GET",
                url: "<?php echo base_url('Frontend/get_all_perikanan'); ?>"
              }
            ).done(function( data )
            {
              var jsonObj = JSON.parse(data);
              var count = Object.keys(jsonObj).length;
              for (var i = 0; i < count; i++) {
               var lat_lng = new google.maps.LatLng(jsonObj[i].lt,jsonObj[i].lg);
               var sContent = '<div class="iw-container">' +
                      '<div class="iw-title">'+jsonObj[i].jenis_produksi+'<div class="pull-right">'+
                        '<div class="btn-group">'+
                          '<a class="btn btn-icon-toggle" onclick="detail('+jsonObj[i].id_produksi+')"><i class="fa fa-eye"></i></a>'+
                        '</div></div></div>' +
                      '<div class="iw-content">'+
    									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 24px;">'+
                      '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                      '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                      ' (kg/ekor)</td></tr><tr><td>Harga Perkiraan Perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                      '</div>'+'</div>';
                addMarker(lat_lng,"2",jsonObj[i].icon,sContent);
              }
              get_mark3=true;
            });
          }else {
            setMapOnAll(map,'2');
          }
        }else {
          deleteMarkers('2');
        }
      });
    })

    // Adds a marker to the map and push to the array.
    function addMarker(location,id,img,sContent) {
      var image = " <?php echo base_url('assets/uploads/icon'); ?>/"+img;
      var marker = new google.maps.Marker({
        position: location,
        map: map,
        icon:image,
        store_id: id,
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

    // Removes the markers from the map, but keeps them in the array.
    function deleteMarkers(id) {
      for (var i = 0; i < markers.length; i++ ) {
        if (markers[i].store_id==id) {
          markers[i].setMap(null);
        }
      }
    }
    // Sets the map on all markers in the array.
    function setMapOnAll(map,id) {
      for (var i = 0; i < markers.length; i++) {
        if (markers[i].store_id==id) {
          markers[i].setMap(map);
        }
      }
    }

    function profil(id) {
      window.location.href="<?php echo base_url('Frontend/profile/') ?>"+id;
    }
    function detail(id) {
      console.log('saya dipanggil'+id);

      $.ajax(
        {
          type: "GET",
          url: "<?php echo base_url('Frontend/detail_produksi'); ?>/"+id,
        }
      ).done(function( data )
      {
        $('#viewcanvas-kiri').html(data);
        $('#btn_detail_canvas').trigger('click');
        console.log(data);

      });
    }
    </script>
    <a class="btn btn-raised ink-reaction btn-default-bright" id="btn_detail_canvas" style="display:none;" data-backdrop="false" href="#offcanvas-demo-left1" data-toggle="offcanvas">


	</body>
</html>
