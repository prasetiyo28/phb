<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemetaan Hasil Bumi - Lupa Password</title>

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
						<div class="col-sm-12">
							<br/>
							<span class="text-lg text-bold text-primary">PEMETAAN HASIL BUMI</span>
							<br/><br/>

										<ul class="nav nav-tabs nav-justified" data-toggle="tabs">
											<li class="active"><a href="#tab_email">EMAIL</a></li>
											<li><a href="#tab_phone">PHONE</a></li>
										</ul>
								<br/>
								<div class="tab-content">
                  <div class="tab-pane active" id="tab_email">
										<form class="form floating-label form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>Auth/reset_email">
											<div class="form-group">
												<input type="email" name="email" value="" class="form-control"  required>
												<label for="email">Email</label>
											</div>
											<div class="row">
												<div class="col-xs-6 text-left">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>
															<span>*Masukan email yang terdaftar.</span>
														</label>
													</div>
												</div><!--end .col -->
												<div class="col-xs-6 text-right">
													<button type="submit" class="btn btn-primary btn-raised">Reset</button>
												</div><!--end .col -->
											</div><!--end .row -->
										</form>
                  </div>
									<div class="tab-pane" id="tab_phone">
										<form class="form floating-label form-validate" novalidate="novalidate" method="post" action="<?php echo base_url() ?>Auth/reset_phone">
											<div class="form-group">
												<input type="text" name="phone" value="" class="form-control"  required data-rule-digits="true">
												<label for="phone">Phone</label>
											</div>
											<div class="row">
												<div class="col-xs-6 text-left">
													<div class="checkbox checkbox-inline checkbox-styled">
														<label>
															<span>*Masukan nomor HP yang terdaftar.</span>
														</label>
													</div>
												</div><!--end .col -->
												<div class="col-xs-6 text-right">
													<button type="submit" class="btn btn-primary btn-raised" >Reset</button>
												</div><!--end .col -->
											</div><!--end .row -->
										</form>
                  </div>
								</div>

						</div><!--end .col -->

							</div><!--end .row -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->



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
				<script src="<?php echo base_url();?>assets/js/core/source/AppNavSearch.js"></script>
				<script src="<?php echo base_url();?>assets/js/core/source/AppVendor.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/toastr/toastr.js"></script>

				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
				<script src="<?php echo base_url();?>assets/js/libs/jquery-validation/dist/localization/messages_id.js"></script>

				<script type="text/javascript">
					$(function() {
						toastr.options.positionClass = 'toast-bottom-right';
						toastr.options.timeOut = 2000;
						<?php if ($this->session->flashdata('message')==true) {
					    echo $this->session->flashdata('message');
					  } ?>
						<?php if ($this->session->flashdata('send')==true) {
					    echo $this->session->flashdata('send');
					  } ?>

					})
					function reset(url) { //url dari flashdata yang dikirim server php / function
						$.ajax({
				      url : url,
				      type: "GET",
				      success: function(data)
				      {
								var respon = xmlToJson(data)['response']['message']['text']
				        if (respon=='Success') {
				          toastr.info("Pemulihan berhasil.", "");
				        }else {
				          toastr.info("Pemulihan gagal, coba lagi.", "");
				        }
				      },
				      error: function (jqXHR, textStatus, errorThrown)
				      {
				          toastr.error('Error get API SMS. Coba beberapa saat lagi.', '');
				      }
				  });

					}
					function xmlToJson(xml) {

						// Create the return object
						var obj = {};

						if (xml.nodeType == 1) { // element
							// do attributes
							if (xml.attributes.length > 0) {
							obj["@attributes"] = {};
								for (var j = 0; j < xml.attributes.length; j++) {
									var attribute = xml.attributes.item(j);
									obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
								}
							}
						} else if (xml.nodeType == 3) { // text
							obj = xml.nodeValue;
						}

						// do children
						// If just one text node inside
						if (xml.hasChildNodes() && xml.childNodes.length === 1 && xml.childNodes[0].nodeType === 3) {
							obj = xml.childNodes[0].nodeValue;
						}
						else if (xml.hasChildNodes()) {
							for(var i = 0; i < xml.childNodes.length; i++) {
								var item = xml.childNodes.item(i);
								var nodeName = item.nodeName;
								if (typeof(obj[nodeName]) == "undefined") {
									obj[nodeName] = xmlToJson(item);
								} else {
									if (typeof(obj[nodeName].push) == "undefined") {
										var old = obj[nodeName];
										obj[nodeName] = [];
										obj[nodeName].push(old);
									}
									obj[nodeName].push(xmlToJson(item));
								}
							}
						}
						return obj;
					}

				</script>
				<!-- END JAVASCRIPT -->

			</body>
		</html>
