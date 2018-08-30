<!DOCTYPE html>
<html>
<head>
  <title>Materialize CSS FeatureDiscovery (Tap Target)</title>
  <!--Responsive Meta Tag-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->

  <!--Import jQuery Library-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!--Import materialize.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<body>
<style type="text/css">
	.m20_0{ margin:20px 0px;}
</style>
<div class="m20_0">
<div class="container">
  <!-- Start Buttons -->
  <a class="waves-effect waves-light btn blue" onclick="$('.tap-target').tapTarget('open')">Open tap target</a>
  <a class="waves-effect waves-light btn blue" onclick="$('.tap-target').tapTarget('close')">Close tap target</a>
  <!-- End Buttons -->

  <!-- Element Showed -->
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a id="menu" class="btn btn-floating btn-large cyan"><i class="material-icons">menu</i></a>
   </div>

  <!-- Start Tap Target Structure -->
  <div class="tap-target blue" data-activates="menu">
    <div class="tap-target-content white-text">
      <h5>Free Time Learning</h5>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text...</p>
    </div>
  </div>
  <!-- End Tap Target Structure -->
</div>
</div>

</body>
</html>
