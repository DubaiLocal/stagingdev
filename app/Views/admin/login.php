<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Dubai Local</title>
	<link href="<?php echo base_url(); ?>/assets/css/custom.css" rel="stylesheet" type="text/css">
	<!-- <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" type="image/x-icon"> -->
	<link rel="icon" href="<?php echo base_url(); ?>/assets/front/images/favicon.png" type="image/x-icon">
</head>

<body>
	<!-- HK Wrapper -->
	<div class="hk-wrapper">
		<!-- Main Content -->
		<div class="hk-pg-wrapper hk-auth-wrapper">
			<!-- bubble css start -->
			<div class="bubbles">
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
				<div class="bubble"></div>
			</div>
			<!-- bubble css end -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 pa-0">
						<div class="auth-form-wrap pt-xl-0 pt-70">
							<div class="auth-form w-xl-35 w-lg-65 w-sm-85 w-100 card pa-40 shadow-lg">
								<a class="auth-brand text-center d-block mb-20" href="#">
									<img class="brand-img" src="<?php echo base_url(); ?>/assets/images/logo.png" alt="brand" />
								</a>
								<form action="<?php echo base_url(); ?>/admin/login" method="post" id="login" autocomplete="false">
									<h1 class="display-4 text-center mb-10">Welcome Back :)</h1>
									<!-- <p class="text-center mb-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>  -->
									<?php
									if ($session->getFlashdata('error_login')) { ?>
										<div class="alert alert-danger" role="alert">
											<?php echo $session->getFlashdata('error_login'); ?>
										</div>
									<?php }
									?>
									<div class="form-group">
										<input class="form-control" placeholder="Email" name="email" id="email" type="email">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" id="password" type="password">
									</div>
									<div class="custom-control custom-checkbox mb-25">
										<input class="custom-control-input" id="same-address" type="checkbox" checked>
										<label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
									</div>
									<div class="form-group mb-0 text-center">
										<button class="btn btn-blue btn-block" type="submit"> Login </button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Content -->
	</div>
	<!-- /HK Wrapper -->
	<!-- JavaScript -->
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>/assets/jss/jquery-3.5.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script>
		$("#email").focus();
		$("#login").validate({
			rules: {
				email: "required",
				password: "required"
			},
			messages: {
				email: "Enter Email",
				password: "Enter Password",
			},
			submitHandler: function(form) {
				// return false;
				form.submit();
			},
			invalidHandler: function(event, validator) {
				// 'this' refers to the form
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1 ?
						'You missed 1 field. It has been highlighted' :
						'You missed ' + errors + ' fields. They have been highlighted';
					$("div.error span").html(message);
					$("div.error").show();
				} else {
					$("div.error").hide();
				}
			}
		});
	</script>
</body>

</html>