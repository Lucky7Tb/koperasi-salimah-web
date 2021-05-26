<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2-bootstrap.min.css">
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<h1>Alamat</h1>
			<div class="card">
				<div class="card-body">
					<div class="row mt-2">
						<div class="col-12">
							<h2>Alamat aktif</h2>
							<div class="card bg-light" style="width: 18rem;">
								<div class="card-body">
								<address id="address-active"></address>
								<hr>
								<p id="address-active-post-code"></p>
								<p>Status: <span class="badge badge-success">Aktif</span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<h2>Daftar alamat</h2>
						<button class="btn btn-lg btn-primary mt-2 mb-2" data-target="#address-create-modal" data-toggle="modal">Tambah alamat</button>
						<div class="row row-cols-sm-12 row-cols-md-6 row-cols-lg-3" id="address-container">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Create Address Modal -->
<div class="modal fade" id="address-create-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="address-form">
      	<div class="modal-body">
        	<div class="form-group">
        		<label for="province">Provinsi</label>
        		<select class="form-control" id="province" name="province"></select>
        	</div>
        	<div class="form-group">
        		<label for="city">Kota</label>
        		<select class="form-control" id="city" name="city"></select>
        	</div>
        	<div class="form-group">
        		<label for="subdistrict">Kecamatan</label>
        		<select class="form-control" id="subdistrict" name="subdistrict"></select>
        	</div>
        	<div class="form-group">
        		<label for="address">Address</label>
        		<textarea class="form-control" id="address" name="address" rows="5"></textarea>
        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-lg btn-outline-dark" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-lg btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer', [
	'js' => '
<script src="' . $plugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="' . $plugin . '/select2/js/select2.full.min.js"></script>
<script src="' . $js . '/global.js"></script>
<script src="' . $js . '/user/profile/app.js"></script>
<script>
	initPlugiOption();
	getMyData();
	getProvices();
</script>
'
]);
?>