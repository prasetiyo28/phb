<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemetaan Hasil Bumi - Login</title>

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
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<!-- END STYLESHEETS -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />
		<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed">

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="spacer"></div>
			<div class="card contain-xs">
				<div class="card-head">
					<div class="img-backdrop" style="background-image: url('<?php echo base_url();?>assets/img/img16.jpg')"></div>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<br/>
							<span class="text-lg text-bold text-primary">PEMETAAN HASIL BUMI</span>
							<br/><br/><br/>
							<form class="form floating-label form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>Auth/login">
								<div class="form-group">
									<input type="text" name="username" value="" class="form-control"  required>
									<label for="username">Username</label>
								</div>
								<div class="form-group">
									<input type="password" name="password" value="" class="form-control"  required>
									<label for="password">Password</label>
									<p class="help-block"><a href="<?php echo base_url() ?>Auth/register">Daftar disini</a> | <a href="<?php echo base_url() ?>Auth/forgotten">Lupa password?</a></p>
								</div>
								<br/>
								<div class="row">
									<div class="col-xs-6 text-left">
										<div class="checkbox checkbox-inline checkbox-styled">
											<label>
												<input type="checkbox" name="remember"> <span>Remember me</span>
											</label>
										</div>
									</div><!--end .col -->
									<div class="col-xs-6 text-right">
										<button type="submit" class="btn btn-primary btn-raised">Sign In</button>
									</div><!--end .col -->
								</div><!--end .row -->
							</form>
						</div><!--end .col -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script type="text/javascript">
					$(function() {
						toastr.options.positionClass = 'toast-bottom-right';
						toastr.options.timeOut = 2000;
						<?php if ($this->session->flashdata('message')==true) {
					    echo $this->session->flashdata('message');
					  } ?>


					})
				</script>


				<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/spin.js/spin.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/App.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppNavigation.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppOffcanvas.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppCard.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppForm.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/toastr/toastr.js"></script>

				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>

				<!-- END JAVASCRIPT -->

			</body>
		</html>
