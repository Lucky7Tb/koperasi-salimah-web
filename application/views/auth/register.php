<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Daftar</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" href="<?= base_url('dist/images/logo2.png') ?>" />
		<link rel="stylesheet" href="<?= base_url('dist/vendors/tata/index.css') ?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/style.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/responsive.css')?>">
	</head>

	<body id="main-container" class="default">

		<div class="user-area pt-100 pb-70">
			<div class="container">
				<div class="user-width">
					<div class="user-form">
						<div class="contact-form">
							<h2>Daftar</h2>
							<form>
								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<input type="text" id="username" class="form-control" required placeholder="jhondoe123">
										</div>
									</div>

									<div class="col-lg-12 ">
										<div class="form-group">
											<input type="email" id="email" class="form-control" placeholder="jhondoe@mail.com" required>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
										</div>
									</div>
									
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" id="confirmPassword" type="password" name="password" placeholder="Konfirmasi password" required>
										</div>
									</div>

									<div class="col-lg-12 ">
										<button type="submit" id="btn-register" class="default-btn rounded-lg btn-bg-three">
											Daftar sekarang
										</button>
									</div>

									<div class="col-lg-12 text-center mt-5">
										<strong>
											<p class="bold">Sudah punya akun? <a href="<?= base_url('auth') ?>">Masuk</a></p>
										</strong>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
		<script src="<?= base_url('dist/user/assets/js/popper.min.js')?>"></script>
		<script src="<?= base_url('dist/user/assets/js/bootstrap.min.js')?>"></script>
		<script src="<?= base_url('dist/vendors/tata/tata.js') ?>"></script>
		<script src="<?= base_url('dist/js/global.js') ?>"></script>
		<script>
		$(document).ready(function() {
			$("#btn-register").on('click', function(e) {
				e.preventDefault();
				var username = $("#username").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var confirmPassword = $("#confirmPassword").val();

				if (username == "") {
					tata.error('Warning', 'Harap masukan username')
				} else if (email == "") {
					tata.error('Warning', 'Harap masukan email')
				} else if (password == "") {
					tata.error('Warning', 'Harap masukan password')
				} else if (password != confirmPassword) {
					tata.error('Warning', 'Password tidak sama')
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
								tata.success('Sukses', 'Registrasi berhasil');
								setTimeout(function() {
									window.location.href = '<?= base_url('auth') ?>'
								}, 2000);
							} else {
								tata.error('Error', response.message);
							}
						}
					});
				}
			});
		})
		</script>
	</body>

</html>
