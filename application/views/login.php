<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 02:12:38 GMT -->

<head>
	<meta charset="UTF-8">
	<title>Masuk</title>
	<link rel="shortcut icon" href="../img/logo2.png"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<?php include_once('templates-css.php') ?>

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
<?= $this->session->flashdata('pesan') ?>
<div class="container">
	<div class="row vh-100 justify-content-between align-items-center">
		<div class="col-12">
			<form method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
				<div class="lock-image col-12 col-sm-5" style="background-image: url('../img/salimah pattern 1.png');"></div>
				<div class="login-form col-12 col-sm-7">
					<h4>Masuk</h4>
					<div class="form-group mb-3">
						<label for="usermail">Email/Username</label>
						<input class="form-control" type="text" id="usermail" placeholder="Masukkan email/username" name="usermail"
									 value="<?= set_value('usermail') ?>">
						<?= form_error('usermail', '<small class="text-danger">', '</small>') ?>
					</div>

					<div class="form-group mb-3">
						<label for="password">Password</label>
						<input class="form-control" type="password" id="password" placeholder="Masukkan Password" name="password">
						<?= form_error('password', '<small class="text-danger">', '</small>') ?>
					</div>

					<div class="form-group mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember">
							<label class="custom-control-label" for="checkbox-signin">Ingat saya</label>
						</div>
					</div>

					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary btn-block mb-2" id="tombol_login">Masuk</button>
					</div>

					<div class="mt-2">Lupa password? <a href="<?= base_url(index_page() . '/forget_password') ?>">Klik disini</a>
					</div>
					<div class="mt-2">Belum punya akun? <a href="<?= base_url(index_page() . '/register') ?>">Daftar</a></div>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- END: Content-->

<?php include_once('templates-js.php') ?>

</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jul 2020 02:12:38 GMT -->

</html>
