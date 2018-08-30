<div id="content">
  <div class="map-wrapper" style="position:fixed;top: 65px;">
    <div id="map"></div>
  </div>
  <!-- BEGIN SECTION ACTION -->
  <div class="section-action" style="webkit-box-shadow: none; box-shadow: none;">
    <div class="section-floating-action-row">
      <button type="button" id="btn_tambah_data" class="btn ink-reaction btn-floating-action btn-lg btn-info" title="Tambah data produksi." onclick="btn_tambah_data()">
        <i class="md md-add"></i>
      </button>
      <button id="btn_batal_data" class="btn ink-reaction btn-floating-action btn-lg btn-danger" title="Batal" onclick="btn_batal_data()" style="display:none;">
        <i class="md md-close"></i>
      </button>

    </div>
  </div><!--end .section-action -->

  <div style="position: fixed; z-index: 1001; top: 7em; width: 17%;    right: 20px;">
    <a id="btn_menu" onclick="menu_tampil()" class="btn ink-reaction btn-floating-action btn-lg btn-info pull-right"  title="Menu">
      <i class="md md-menu"></i>
    </a>
    <a id="btn_clear" onclick="menu_sembunyi()" class="btn ink-reaction btn-floating-action btn-lg btn-info pull-right" style="display:none;" title="Tutup">
      <i class="md md-clear-all"></i>
    </a>
    <br><br><br>
    <!-- BEGIN TODOS -->
              <div id="divmenu" class="col-md-12 pull-right" style="display:none;">
                <div class="card " style="margin-bottom: unset;">
                  <div class="card-head style-info">
                    <header>Data</header>
                    <div class="tools">
                      <i class="md md-crop-square" title="Bersihkan" onclick="btn_bersih_cb()"></i>
                    </div>
                  </div><!--end .card-head -->
                </div><!--end .card -->
                <div class="panel-group" id="accordion1">
                  <div class="card panel">
                    <div class="card-head card-head-sm collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1" aria-expanded="false">
                      <header>Pertanian</header>
                      <div class="tools">
                        <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                      </div>
                    </div>
                    <div id="accordion1-1" class="collapse" aria-expanded="false">
                      <div class="card-body no-padding">
                        <ul class="list divider-full-bleed" data-sortable="true">
                          <li id="menu1-1" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_pertanian_panen">
                                <span>Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu1-2" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_pertanian_belum">
                                <span>Belum Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu1-3" class="tile" >
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_pertanian_gagal">
                                <span>Gagal Panen</span>
                              </label>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div><!--end .panel -->
                  <div class="card panel">
                    <div class="card-head card-head-sm collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2" aria-expanded="false">
                      <header>Perikanan</header>
                      <div class="tools">
                        <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                      </div>
                    </div>
                    <div id="accordion1-2" class="collapse" aria-expanded="false" style="height: 0px;">
                      <div class="card-body no-padding">
                        <ul class="list divider-full-bleed" data-sortable="true">
                          <li id="menu2-1" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_perikanan_panen">
                                <span>Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu2-2" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_perikanan_belum">
                                <span>Belum Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu2-3" class="tile" >
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_perikanan_gagal">
                                <span>Gagal Panen</span>
                              </label>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div><!--end .panel -->
                  <div class="card panel">
                    <div class="card-head card-head-sm collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-3" aria-expanded="false">
                      <header>Peternakan</header>
                      <div class="tools">
                        <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                      </div>
                    </div>
                    <div id="accordion1-3" class="collapse" aria-expanded="false" style="height: 0px;">
                      <div class="card-body no-padding">
                        <ul class="list divider-full-bleed" data-sortable="true">
                          <li id="menu3-1" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_peternakan_panen">
                                <span>Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu3-2" class="tile">
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_peternakan_belum">
                                <span>Belum Panen</span>
                              </label>
                            </div>
                          </li>
                          <li id="menu3-3" class="tile" >
                            <div class="checkbox checkbox-styled tile-text">
                              <label>
                                <input type="checkbox" id="cb_peternakan_gagal">
                                <span>Gagal Panen</span>
                              </label>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                  </div><!--end .panel -->
                </div>
              </div><!--end .col -->
              <!-- END TODOS -->
  </div>

</div>


<?php $this->load->view('Xyz/peta/modal_produksi'); ?>
<div id="viewcanvas"></div>
<?php $this->load->view('Xyz/pengguna/modal_peta') ?>
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
}
function menu_sembunyi() {
  $('#btn_menu').show();
  $('#btn_clear').hide();
  $('#divmenu').hide("fast");
}
function btn_bersih_cb() {
  $('#cb_pertanian_panen').prop('checked', false);
  $('#cb_pertanian_belum').prop('checked', false);
  $('#cb_pertanian_gagal').prop('checked', false);

  $('#cb_perikanan_panen').prop('checked', false);
  $('#cb_perikanan_belum').prop('checked', false);
  $('#cb_perikanan_gagal').prop('checked', false);

  $('#cb_peternakan_panen').prop('checked', false);
  $('#cb_peternakan_belum').prop('checked', false);
  $('#cb_peternakan_gagal').prop('checked', false);

    for (var i = 1; i < 10; i++) {
      deleteMarkers(i);
    }

}


//Set up some of our variables.
var map,map2; //Will contain map object.
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
    var centerOfMap = new google.maps.LatLng(-6.869814, 109.116969);

    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 14,
      disableDefaultUI: true, //The zoom value.
      zoomControl: true,
      zoomControlOptions: { position: google.maps.ControlPosition.LEFT_CENTER },
      fullscreenControl: true,
      fullscreenControlOptions: { position: google.maps.ControlPosition.LEFT_TOP },
      styles: style_map

    };
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

    map2 = new google.maps.Map(document.getElementById('mapi'), options);

    google.maps.event.addListener(map2, 'click', function(event) {
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map2,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation1();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation1();
    });
    var tegalLayer = new google.maps.KmlLayer({
         // url: '<?php echo base_url("assets/tegal.kml") ?>',
         url: 'http://arif.slice-pro.com/tegal.kml',
          map: map,
          suppressInfoWindows:true,
          preserveViewport: true
        });
    var tegalLayer2 = new google.maps.KmlLayer({
        //  url: '<?php echo base_url("assets/tegal.kml") ?>',
        url: 'http://arif.slice-pro.com/tegal.kml',
          map: map2,
          suppressInfoWindows:true,
          preserveViewport: true
        });


}

function btn_tambah_data() {
      var o = this;
  		toastr.info('Map aktif di tandai', '');

      //tombol
      $('#btn_tambah_data').hide();
      $('#btn_batal_data').show();

      //Listen for any clicks on the map.
      o._eventClickMarker();
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
          var kalimat = results[1].formatted_address;
          var cari = kalimat.toLowerCase().search("kota tegal");
          var cari2 = kalimat.toLowerCase().search("tegal city")
          if (cari>0) {
            $('#form_produksi')[0].reset();
            $('#modal_add_produksi').modal('show');
            document.getElementById('lokasi_lahan').value =results[1].formatted_address;
          }else if (cari2>0) {
            $('#form_produksi')[0].reset();
            $('#modal_add_produksi').modal('show');
            document.getElementById('lokasi_lahan').value =results[1].formatted_address;
          }else {
            toastr.error("Wilayah produksi hanya di Kota Tegal.", "");
          }

        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });

    //if (cari>0) {
      // $('#form_produksi')[0].reset();
      // $('#modal_add_produksi').modal('show');
    // }else {
    //   toastr.error("Wilayah produksi hanya di tegal.", "");
    //   console.log(cari);
    // }
}

function markerLocation1(){
  var geocoder = new google.maps.Geocoder;

    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude

    var latlng = {lat: parseFloat(currentLocation.lat()), lng: parseFloat(currentLocation.lng())};
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status === 'OK') {
        if (results[1]) {
          var kalimat = results[1].formatted_address;
          var cari = kalimat.toLowerCase().search("kota tegal");
          var cari2 = kalimat.toLowerCase().search("tegal city")
          if (cari>0) {
            document.getElementById('lokasi1').value =results[1].formatted_address;
            $("#form_peta").removeAttr("action");
            $("#form_peta").attr('action',"<?php echo base_url('Xyz/update_peta_produksi'); ?>");
            toastr.success("Berhasil menandai wilayah produksi.", "");
            $('#btn_submit_peta').show();
          }else if (cari2>0) {
            document.getElementById('lokasi1').value =results[1].formatted_address;
            $("#form_peta").removeAttr("action");
            $("#form_peta").attr('action',"<?php echo base_url('Xyz/update_peta_produksi'); ?>");
            toastr.success("Berhasil menandai wilayah produksi.", "");
            $('#btn_submit_peta').show();
          }else {
            toastr.error("Wilayah produksi hanya di Kota Tegal.", "");
            $('#btn_submit_peta').hide();
          }

        } else {
          window.alert('No results found');
        }
      } else {
        window.alert('Geocoder failed due to: ' + status);
      }
    });

    $("#form_peta").removeAttr("action");
    $("#form_peta").attr('action',"<?php echo base_url('Xyz/update_peta_produksi'); ?>");

}

function btn_batal_data() {
  var o = this;
  toastr.info('Map tidak aktif untuk di tandai', '');

  //tombol
  $('#btn_tambah_data').show();
  $('#btn_batal_data').hide();

  google.maps.event.clearListeners(map, 'click');
  marker.setMap(null);
  marker = false;

}


//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);


  _eventClickMarker = function () {
  google.maps.event.addListener(map, 'click', function(event) {
  //Get the location that the user clicked.
  var clickedLocation = event.latLng;
  //If the marker hasn't been added.
  if(marker === false){
      //Create the marker.
      marker = new google.maps.Marker({
          position: clickedLocation,
          map: map,
          draggable: true //make it draggable
      });
      //Listen for drag events!
      google.maps.event.addListener(marker, 'dragend', function(event){
          markerLocation();
      });
  } else{
      //Marker has already been added, so just change its location.
      marker.setPosition(clickedLocation);
  }
  //Get the marker's location.
  markerLocation();
});
}

$(function() {
  var get_mark1=false;
  var get_mark2=false;
  var get_mark3=false;
  var get_mark4=false;
  var get_mark5=false;
  var get_mark6=false;
  var get_mark7=false;
  var get_mark8=false;
  var get_mark9=false;


    $('#cb_pertanian_panen').click(function() {
      if ($('#cb_pertanian_panen').is(':checked')) {
        if (get_mark1==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_pertanian_panen'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
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
    $('#cb_pertanian_belum').click(function() {
      if ($('#cb_pertanian_belum').is(':checked')) {
        if (get_mark2==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_pertanian_belum'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"2",jsonObj[i].icon,sContent);
            }
              get_mark2=true;
          });
        }else {
          setMapOnAll(map,'2');
        }
      }else {
        deleteMarkers('2');
      }
    });
    $('#cb_pertanian_gagal').click(function() {
      if ($('#cb_pertanian_gagal').is(':checked')) {
        if (get_mark3==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_pertanian_gagal'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"3",jsonObj[i].icon,sContent);
            }
              get_mark3=true;
          });
        }else {
          setMapOnAll(map,'3');
        }
      }else {
        deleteMarkers('3');
      }
    });

    $('#cb_perikanan_panen').click(function() {
      if ($('#cb_perikanan_panen').is(':checked')) {
        if (get_mark4==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_perikanan_panen'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"4",jsonObj[i].icon,sContent);
            }
              get_mark4=true;
          });
        }else {
          setMapOnAll(map,'4');
        }
      }else {
        deleteMarkers('4');
      }
    });
    $('#cb_perikanan_belum').click(function() {
      if ($('#cb_perikanan_belum').is(':checked')) {
        if (get_mark5==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_perikanan_belum'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"5",jsonObj[i].icon,sContent);
            }
              get_mark5=true;
          });
        }else {
          setMapOnAll(map,'5');
        }
      }else {
        deleteMarkers('5');
      }
    });
    $('#cb_perikanan_gagal').click(function() {
      if ($('#cb_perikanan_gagal').is(':checked')) {
        if (get_mark6==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_perikanan_gagal'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"6",jsonObj[i].icon,sContent);
            }
              get_mark6=true;
          });
        }else {
          setMapOnAll(map,'6');
        }
      }else {
        deleteMarkers('6');
      }
    });

    $('#cb_peternakan_panen').click(function() {
      if ($('#cb_peternakan_panen').is(':checked')) {
        if (get_mark7==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_peternakan_panen'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"7",jsonObj[i].icon,sContent);
            }
              get_mark7=true;
          });
        }else {
          setMapOnAll(map,'7');
        }
      }else {
        deleteMarkers('7');
      }
    });
    $('#cb_peternakan_belum').click(function() {
      if ($('#cb_peternakan_belum').is(':checked')) {
        if (get_mark8==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_peternakan_belum'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"8",jsonObj[i].icon,sContent);
            }
              get_mark8=true;
          });
        }else {
          setMapOnAll(map,'8');
        }
      }else {
        deleteMarkers('8');
      }
    });
    $('#cb_peternakan_gagal').click(function() {
      if ($('#cb_peternakan_gagal').is(':checked')) {
        if (get_mark9==false) {
          $.ajax(
            {
              type: "GET",
              url: "<?php echo base_url('Xyz/get_all_peternakan_gagal'); ?>"
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
                        '<a class="btn btn-icon-toggle" onclick="edit('+jsonObj[i].id_produksi+')"><i class="fa fa-pencil"></i></a>'+
                        '<a class="btn btn-icon-toggle" onclick="hapus('+jsonObj[i].id_produksi+')"><i class="fa fa-trash"></i></a>'+
                      '</div></div></div>' +
                    '<div class="iw-content">'+
  									'<div class="card-body height-3 scroll style-default-bright" style="padding: 0px 28px;">'+
                    '<div class="iw-subTitle">'+jsonObj[i].nama+'</div> <p>' +jsonObj[i].lokasi+
                    '</p><table class="table table-responsive table-hover "><tbody><tr><td>Perkiraan Panen</td><td>'+jsonObj[i].tgl_kira_panen+'</td></tr><tr><td>Perkiraan Jumlah Panen</td><td>'+jsonObj[i].jml_kira_panen+
                    ' (kg/ekor)</td></tr><tr><td>Harga perkiraan perkilo/Ekor</td><td>Rp. '+jsonObj[i].harga_kira_perkilo+'</td></tr></tbody></table>' +	'</div>'+
                    '</div>'+'</div>';
              addMarker(lat_lng,"9",jsonObj[i].icon,sContent);
            }
              get_mark9=true;
          });
        }else {
          setMapOnAll(map,'9');
        }
      }else {
        deleteMarkers('9');
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
//   marker.addListener('mouseover', function() {
//     infowindow.open(map, marker);
// });
// marker.addListener('mouseout', function() {
//     infowindow.close();
// });
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
function hapus(id) {
  NewToastStyle();

  			var message = 'Anda akan menghapus data ini?. <button type="button" onclick="deleteAct('+id+')" class="btn btn-flat btn-primary toastr-action">YA</button>';
  			toastr.info(message, '');
}

function deleteAct(id) {
  var data = new FormData();

    data.append('id_produksi', id);
    var url = "<?php echo base_url('Xyz/deleteProduksi/'); ?>";

  $.ajax(
    {
      type: "POST",
      url: url,
      data: data,
      processData: false,
      contentType: false,
      success: function(data)
        {
          if (data=='sukses')
          {

            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.success('Berhasil menghapus data', '');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
          else if(data=='gagal')
          {
            toastr.clear();
            toastr.options.progressBar = false;
            toastr.options.timeOut = 2000;
            toastr.error('Gagal menghapus data. Coba lagi.', '');
          }
          else{alert(data);}
        },
      error:function(data)
        {
          toastr.clear();
          toastr.options.progressBar = false;
          toastr.options.timeOut = 2000;
          toastr.warning('Terjadi kesalahan!!! Coba lagi.', '');
        }
      });
}
function edit(id) {
  console.log('saya dipanggil'+id);

  $.ajax(
    {
      type: "GET",
      url: "<?php echo base_url('Xyz/edit_produksi'); ?>/"+id,
    }
  ).done(function( data )
  {
    $('#viewcanvas-kiri').html(data);
    $('#btn_detail_canvas').trigger('click');
    console.log('sudah done');

  });
}
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
<a class="btn btn-raised ink-reaction btn-default-bright" id="btn_detail_canvas" style="display:none;" data-backdrop="false" href="#offcanvas-demo-left1" data-toggle="offcanvas">
