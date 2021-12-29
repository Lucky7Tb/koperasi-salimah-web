<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2-bootstrap.min.css">
	'
]);
?>

<!-- Address Modal -->
<div class="modal fade" id="address-modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah alamat</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="address-form">
				<input type="hidden" id="address_id" name="address_id"></input>
				<div class="modal-body">
					<div class="form-group">
						<label for="province">Provinsi</label>
						<select class="form-control" id="province" name="province" required></select>
					</div>
					<div class="form-group">
						<label for="city">Kota</label>
						<select class="form-control" id="city" name="city" required></select>
					</div>
					<div class="form-group">
						<label for="subdistrict">Kecamatan</label>
						<select class="form-control" id="subdistrict" name="subdistrict" required></select>
					</div>
					<div class="form-group">
						<label for="postcode">Kode pos</label>
						<input class="form-control" id="postcode" name="postcode" placeholder="Masukan kode pos anda" required />
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" id="address" name="address" rows="5" placeholder="Masukan alamat anda"
							required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary" id="btn-addUpdate-address">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-12 mt-3">
			<h1>Ganti profile</h1>
			<div class="card">
				<div class="card-body row">
					<div class="col-lg-12 col-xl-5" style="text-align: center;">
						<img width="150px" height="150px" class="img-fluid" id="photo_profile">
						<form id="form-update-photo">
							<div class="form-group mt-2 mb-3">
								<label for="photo">Foto profile</label>
								<input type="file" name="photo" id="photo" class="form-control-file">
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-primary rounded-btn" id="btn-change-photo">Ganti foto</button>
							</div>
						</form>
					</div>
					<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
						<form id="form-profile">
							<div class="form-group mb-3">
								<label for="full_name">Nama Lengkap</label>
								<input type="text" class="form-control" name="full_name" id="full_name" placeholder="Nama anda"
									required>
							</div>
							<div class="form-group mb-3">
								<label for="phone_number">No telp</label>
								<input type="number" class="form-control" name="phone_number" id="phone_number"
									placeholder="No telp anda" required>
							</div>
							<div class="form-group mb-3">
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
							<div class="form-group mb-3">
								<div>
									<label>Tanggal lahir</label>
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text">
										<div class="fas fa-calendar"></div>
									</span>
									<input type="text" class="form-control" name="date_of_birth" id="date_of_birth"
										placeholder="Masukan tanggal lahir" autocomplete="off" required>
								</div>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-primary rounded-btn" id="btn-change-profile">Simpan
									perubahan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h1>Alamat</h1>
			<div class="card bottom">
				<div class="card-body">
					<div class="row mt-2">
						<div class="col-12">
							<h2>Alamat aktif</h2>
							<div class="card bg-light" style="width: 18rem;" id="active-address-container">
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h2>Daftar alamat</h2>
					<button class="btn btn-primary mt-2 mb-2" data-target="#address-modal" data-toggle="modal"
						onclick="showAddressModal()">Tambah alamat</button>
					<div class="row row-cols-sm-12 row-cols-md-6 row-cols-lg-3" id="address-container">
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
		<script src="' . $globalPlugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $globalPlugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $js . '/admin/profile/app.js"></script>
	'
]);
?>
