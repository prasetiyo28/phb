
  <!-- BEGIN META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="your,keywords">
  <meta name="description" content="Short explanation about this website">
  <!-- END META -->

  <!-- BEGIN STYLESHEETS -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/bootstrap.css?1422792965" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/materialadmin.css?1425466319" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
  <!-- END STYLESHEETS -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/select2/select2.css?1424887856" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
  <script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
      <!-- text editor -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/summernote/summernote.css?1425218701" />

  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />

  <?php if ($chart==true): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/morris/morris.core.css?1420463396" />
  <?php endif; ?>
  <!-- peta-->
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

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/respond.min.js?1403934956"></script>
  <![endif]-->
