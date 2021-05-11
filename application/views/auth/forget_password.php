<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forget Password</title>
	<link rel="shortcut icon" href="img/logo2.png" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="<?= base_url('dist/vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/css/main.css') ?>">
</head>


<body id="main-container" class="default">
	<div class="container">
		<div class="row vh-100 justify-content-between align-items-center">
			<div class="col-12">
				<form action="#" class="row row-eq-height lockscreen  mt-5 mb-5">
					<div class="lock-image col-12 col-sm-5" style="background-image: url('<?= base_url('img/salimah-pattern-1.png') ?>');"></div>
					<div class="login-form col-12 col-sm-7">
						<h4>Lupa Password?</h4>
						<h6>Masukkan Email yang terdaftar</h6>
						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input class="form-control" type="text" id="email" required="" placeholder="Masukkan email yang terdaftar">
						</div>

						<div class="form-group mb-0">
							<a type="button" href="Index.html" class="btn btn-primary btn-block mb-2">Konfirmasi</a>
						</div>
						<br>
						<div class="mt-2">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar</a></div>
						<div class="mt-2">Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk</a></div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/slimscroll/jquery.slimscroll.min.js') ?>"></script>
</body>

</html>
