<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Daftar Akun</title>
	<link rel="shortcut icon" href="<?= base_url('img/logo2.png') ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="<?= base_url('dist/vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/vendors/toastr/toastr.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/css/main.css') ?>">
</head>

<body id="main-container" class="default">
	<div class="container">
		<div class="row vh-100 justify-content-between align-items-center">
			<div class="col-12">
				<form action="post" class="row row-eq-height lockscreen  mt-5 mb-5">
					<div class="lock-image col-12 col-sm-5" style="background-image: url('<?= base_url('img/salimah-pattern-1.png') ?>');"></div>
					<div class="login-form col-12 col-sm-7">
						<h4>Daftar</h4>
						<div class="form-group mb-3">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username">
						</div>

						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" placeholder="E-mail">
						</div>

						<div class="form-group mb-3">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="password">
						</div>
						<div class="form-group mb-3">
							<label for="confirmPassword">Konfirmasi Password</label>
							<input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi password">
						</div>

						<div class="form-group mb-0">
							<button type="button" class="btn btn-primary btn-block mb-2" id="register">Daftar</button>
						</div>
						<br>
						<div class="mt-2">Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk</a></div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
	<script src="<?= base_url('dist/vendors/slimscroll/jquery.slimscroll.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/toastr/toastr.min.js') ?>"></script>
	<script src="<?= base_url('dist/js/global.js') ?>"></script>
	<script>
		$(document).ready(function() {
			$("#register").on('click', function() {
				var username = $("#username").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var confirmPassword = $("#confirmPassword").val();

				if (username == "") {
					toastr.warning('Harap masukan username')
				} else if (email == "") {
					toastr.warning('Harap masukan email')
				} else if (password == "") {
					toastr.warning('Harap masukan password')
				} else if (password != confirmPassword) {
					toastr.warning('Password tidak sama')
				} else {
					const formData = new FormData();
					formData.append('username', username);
					formData.append('email', email);
					formData.append('password', password);

					$.ajax({
						url: "<?= base_url('auth/doRegister') ?>",
						type: "POST",
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							response = JSON.parse(response);
							if (response.code === 200) {
								toastr.success('Registrasi berhasil');
								setTimeout(function() {
									window.location.href = '<?= base_url('auth') ?>'

								}, 2000);
							}else {
								toastr.error(response.message);
							}
						}
					});
				}
			});
		})
	</script>
</body>

</html>
