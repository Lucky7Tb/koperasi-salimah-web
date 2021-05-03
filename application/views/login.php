<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Masuk</title>
	<link rel="shortcut icon" href="<?= base_url('img/logo2.jpeg') ?>"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('dist/vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/vendors/toastr/toastr.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/css/main.css') ?>">
</head>

<body id="main-container" class="default">
<div class="container">
	<div class="row vh-100 justify-content-between align-items-center">
		<div class="col-12">
			<form method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
				<div class="lock-image col-12 col-sm-5"
						 style="background-image: url('<?= base_url('img/salimah pattern 1.png') ?>');"></div>
				<div class="login-form col-12 col-sm-7">
					<h4>Masuk</h4>
					<div class="form-group mb-3">
						<label for="usermail">Email/Username</label>
						<input class="form-control" type="text" id="usermail" required="" placeholder="Masukkan email/username">
					</div>

					<div class="form-group mb-3">
						<label for="password">Password</label>
						<input class="form-control" type="password" required="" id="password" placeholder="Masukkan Password">
					</div>
					<div class="form-group mb-0">
						<button type="submit" class="btn btn-primary btn-block mb-2" id="tombol_login">Masuk</button>
					</div>
					<div class="mt-2">Lupa password? <a href="<?= base_url('/Forget_Password') ?>">Klik disini</a></div>
					<div class="mt-2">Belum punya akun? <a href="<?= base_url('/Register') ?>">Daftar</a></div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('dist/vendors/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('dist/js/global.js') ?>"></script>
<script>
	$(document).ready(function () {
		$("#tombol_login").on('click', function (e) {
			e.preventDefault();
			var usermail = $("#usermail").val();
			var password = $("#password").val();

			if (usermail.length == "") {
				toastr.warning('Harap masukan username/email')
			} else if (password.length == "") {
				toastr.warning('Harap masukan password')
			} else {
				const formData = new FormData();
				formData.append('username', usermail);
				formData.append('password', password);

				$.ajax({
					type: "POST",
					url: '<?= base_url('auth/login') ?>',
					data: formData,
					processData: false,
					contentType: false,
					success: function (response) {
						response = JSON.parse(response);
						if (response.code === 200) {
							if (response.data.level === "admin") {
								window.location.href = '<?= base_url('/admin') ?>';
								return;
							}
							window.location.href = '<?= base_url('/') ?>';
							return;
						} else {
							toastr.error(response.message);
						}
					}
				});
			}
		});
	});
</script>
</body>

</html>
