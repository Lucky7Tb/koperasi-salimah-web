<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 02:12:38 GMT -->

<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="../img/logo2.png"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php include_once 'templates-css.php' ?>

	<!-- START: Page CSS-->
	<link rel="stylesheet" href="../dist/vendors/social-button/bootstrap-social.css"/>
	<!-- END: Page CSS-->

	<!-- START: Custom CSS-->
	<link rel="stylesheet" href="../dist/css/main.css">
	<!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
<!-- START: Main Content-->
<div class="container">
	<div class="row vh-100 justify-content-between align-items-center">
		<div class="col-12">
			<form method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
				<div class="lock-image col-12 col-sm-5" style="background-image: url('../img/salimah pattern 1.png');"></div>
				<div class="login-form col-12 col-sm-7">
					<h4>Daftar</h4>
					<div class="form-group mb-3">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= set_value('username') ?>">
						<?= form_error('username', '<small class="text-danger">', '</small>') ?>
					</div>

					<div class="form-group mb-3">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" placeholder="E-mail" name="email" value="<?= set_value('email') ?>">
						<?= form_error('email', '<small class="text-danger">', '</small>') ?>
					</div>

					<div class="form-group mb-3">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="password" name="password1">
						<?= form_error('password1', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="form-group mb-3">
						<label for="confirmPassword">Konfirmasi Password</label>
						<input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi password" name="password2">
					</div>

					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary btn-block mb-2" id="register">Daftar</button>
					</div>
					<br>
					<div class="mt-2">Lupa password? <a href="<?= base_url( index_page().'/forget_password' ) ?>">Klik disini</a></div>
					<div class="mt-2">Sudah punya akun? <a href="<?= base_url( index_page().'/login' ) ?>">Masuk</a></div>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- END: Content-->

<!-- START: Template JS-->
<script src="../dist/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="../dist/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="../dist/vendors/moment/moment.js"></script>
<script src="../dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
<!-- END: Template JS-->


</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 02:12:38 GMT -->

</html>
