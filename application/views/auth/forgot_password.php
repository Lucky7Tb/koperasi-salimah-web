<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Lupa password</title>
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
							<h2>Masukan password baru untuk mengganti password anda</h2>
							<form>
								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<input type="password" class="form-control" id="newPassword" placeholder="Password baru anda" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi password baru anda" required>
										</div>
									</div>

									<div class="col-lg-12 ">
										<button type="submit" id="btn-send" class="default-btn rounded-lg btn-bg-three">
											Kirim
										</button>
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
			$("#btn-send").on('click', function(e) {
				e.preventDefault();
				var newPassword = $("#newPassword").val();
				var confirmPassword = $("#confirmPassword").val();

				if (newPassword === "" || confirmPassword === "") {
					tata.error('Warning', 'Harap masukan password dan konfirmasi password')
				} else if(newPassword !== confirmPassword) {
					tata.error('Warning', 'Password dan konfirmasi password harus sama')
				} else {
					const formData = new FormData();
					formData.append('password', newPassword);
					formData.append('email', '<?= $email ?>');
					formData.append('token', '<?= $token ?>');

					$.ajax({
						type: "POST",
						url: '<?= base_url('auth/doResetPassword') ?>',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							response = JSON.parse(response);
							if (response.code === 200) {
								tata.success('Success', response.message);
								setTimeout(() => {
									window.location.href = '<?= base_url('/auth') ?>';
									return;
								}, 1500);
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
