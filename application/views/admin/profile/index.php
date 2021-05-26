<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
	'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 mt-3">
			<h1>Ganti profile</h1>
			<div class="card">
				<div class="card-body row">
					<div class="col-lg-12 col-xl-5" style="text-align: center;">
						<img width="200" height="200" class="img-fluid rounded-circle" id="photo_profile">
						<div class="container">
							<form id="form-update-photo">
								<div class="form-group">
									<label for="photo">Foto profile</label>
									<input type="file" name="photo" id="photo" class="form-control-file">
								</div>
								<button type="submit" class="btn btn-primary rounded-btn" id="btn-change-photo">Ganti foto</button>
							</form>
						</div>
					</div>
					<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
						<form id="form-profile">
							<div class="form-group">
								<label for="full_name">Nama Lengkap</label>
								<input type="text" class="form-control" name="full_name" id="full_name" placeholder="Nama anda" required>
							</div>
							<div class="form-group">
								<label for="phone_number">No telp</label>
								<input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="No telp anda" required>
							</div>
							<div class="form-group">
								<div>
									<label>Gender</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" id="gender-1" value="l" required checked>
									<label class="form-check-label" for="gender-1">
										Laki-laki
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" id="gender-2" value="p" required>
									<label class="form-check-label" for="gender-2">
										Perempuan
									</label>
								</div>
							</div>
							<div class="form-group">
								<div>
									<label>Tanggal lahir</label>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="icon-calendar"></i>
										</span>
									</div>
									<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Masukan tanggal lahir" autocomplete="off" required>
								</div>
							</div>
							<button type="submit" class="btn btn-primary rounded-btn" id="btn-change-profile">Simpan perubahan</button>
						</form>
						<!-- <h5>Ubah Password</h5>
						<form>
							<div class="form-group">
								<label for="inputPassword31">Password Lama</label>
								<input type="password" class="form-control" id="oldPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="inputPassword31">Password Baru</label>
								<input type="password" class="form-control" id="newPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="inputPassword31">Konfirmasi Password</label>
								<input type="password" class="form-control" id="confirmPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary rounded-btn">Ubah Password</button>
							</div>
						</form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $plugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/profile/app.js"></script>
		<script>
			$("#date_of_birth").datepicker({ format: "yyyy-mm-dd" });
			getProfile();
		</script>
	'
]);
?>
