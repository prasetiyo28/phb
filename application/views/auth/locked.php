<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemetaan Hasil Bumi - Locked</title>

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
    <!-- BEGIN LOCKED SECTION -->
		<section class="section-account">
			<div class="img-backdrop" style="background-image: url('<?php echo base_url();?>/assets/img/img16.jpg')"></div>
			<div class="spacer"></div>
			<div class="card contain-xs style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<img class="img-circle" src="<?php echo base_url('assets/uploads').'/'.$this->session->userdata('foto') ?>" alt="" />
							<h2><?php echo $this->session->userdata('nama') ?></h2>
							<form class="form" action="<?php echo base_url('Auth/login') ?>" accept-charset="utf-8" method="post">
								<div class="form-group floating-label">
									<div class="input-group">
										<div class="input-group-content">
											<input type="password" id="password" class="form-control" name="password">
											<label for="password">Password</label>
											<p class="help-block"><a href="<?php echo base_url('Auth') ?>">Bukan <?php echo $this->session->userdata('nama') ?>?</a></p>
										</div>
										<div class="input-group-btn">
											<button class="btn btn-floating-action btn-primary" type="submit"><i class="fa fa-unlock"></i></button>
										</div>
									</div><!--end .input-group -->
								</div><!--end .form-group -->
							</form>
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .card-body -->
			</div><!--end .card -->
		</section>
		<!-- END LOCKED SECTION -->
		</html>
