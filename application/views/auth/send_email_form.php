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
							<h2>Masukan email untuk mendapatkan link reset password</h2>
							<form>
								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="example@mail.com" required>
										</div>
									</div>

									<div class="col-lg-12 ">
										<button type="submit" id="btn-send" class="default-btn rounded-lg btn-bg-three">
											Kirim
										</button>
									</div>

									<div class="col-lg-12 text-center mt-5">
										<strong>
											<a href="<?= base_url('auth') ?>">Kembali ke Login</a>
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
			$("#btn-send").on('click', function(e) {
				e.preventDefault();
				var usermail = $("#email").val();

				if (usermail.length == "") {
					tata.error('Warning', 'Harap masukan email')
				} else {
					const formData = new FormData();
					formData.append('email', usermail);

					$.ajax({
						type: "POST",
						url: '<?= base_url('auth/doSendEmail') ?>',
						data: formData,
						processData: false,
						contentType: false,
						success: function(response) {
							response = JSON.parse(response);
							if (response.code === 200) {
								tata.success('Success', response.message);
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
