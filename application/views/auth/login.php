<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Masuk</title>
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
							<h2>Masuk</h2>
							<form>
								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<input type="text" class="form-control" id="usermail" placeholder="example@mail.com" required>
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<input class="form-control" id="password" type="password" name="password" placeholder="Password">
										</div>
									</div>

									<div class="col-lg-12 ">
										<button type="submit" id="btn-login" class="default-btn rounded-lg btn-bg-three">
											Masuk sekarang
										</button>
									</div>

									<div class="col-lg-12 text-center mt-5">
										<strong>
											<p class="bold">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar</a></p>
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
			$("#btn-login").on('click', function(e) {
				e.preventDefault();
				var usermail = $("#usermail").val();
				var password = $("#password").val();

				if (usermail.length == "") {
					tata.warning('Warning', 'Harap masukan username/email')
				} else if (password.length == "") {
					tata.warning('Warning', 'Harap masukan password')
				} else {
					const formData = new FormData();
					formData.append('username', usermail);
					formData.append('password', password);

					$.ajax({
						type: "POST",
						url: '<?= base_url('auth/doLogin') ?>',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							response = JSON.parse(response);
							if (response.code === 200) {
								if (response.data.level === 'admin') {
									window.location.href = '<?= base_url('/admin') ?>';
									return;
								} else if (response.data.level === 'user') {
									window.location.href = '<?= base_url('/') ?>';
									return;
								} else {
									tata.error('Error', 'Maaf akun anda telah di block');
								}
							} else {
								tata.error('Error', response.message);
							}
						}
					});
				}
			});
		});
		</script>
	</body>

</html>
