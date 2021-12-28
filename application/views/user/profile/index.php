<?php
$userAssets = base_url('dist/user/assets');
$globalPlugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2-bootstrap.min.css">
		<link rel="stylesheet" href="' . $userAssets . '/css/nice-select.min.css">
	'
]);
?>
<div class="container-fluid site-width">
	<div class="my-account-area ptb-100">
		<div class="container">
			<div class="tab account-tab">
				<div class="row">
					<div class="col-lg-4">
						<ul class="tabs">
							<li>
								<a href="#">
									Profilku
								</a>
							</li>
							<li>
								<a href="#">
									Alamatku
								</a>
							</li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="tab_content current active">
							<div class="tabs_item current">
								<div class="account-tab-item">
									<div class="account-details">
										<h2>Profile Details</h2>
										<div class="account-profile">
											<img class="img-fluid img-thumbnail rounded d-block mx-auto" width="25%" height="25%"
												id="photo_profile" alt="My photo">
											<form id="form-update-photo">
												<div class="form-group">
													<label for="photo">Foto profile</label>
													<input type="file" name="photo" id="photo" class="form-control-file">
												</div>
												<button type="submit" class="default-btn btn-bg-three btn btn-block rounded-btn"
													id="btn-change-photo">Ganti foto</button>
											</form>
										</div>

										<div class="account-form">
											<form id="form-profile">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label for="full_name">Nama lengkap</label>
															<input type="text" class="form-control" name="full_name" id="full_name"
																placeholder="Nama anda" required>
														</div>
													</div>

													<div class="col-lg-6">
														<div class="form-group">
															<label for="phone_number">No telp</label>
															<input type="number" class="form-control" name="phone_number" id="phone_number"
																placeholder="No telp anda" required>
														</div>
													</div>

													<div class="col-lg-12">
														<div class="form-group">
															<label for="date_of_birth">Tgl lahir</label>
															<input type="text" class="form-control" name="date_of_birth" id="date_of_birth"
																placeholder="Masukan tanggal lahir" autocomplete="off" required>
														</div>
													</div>

													<div class="col-lg-12">
														<div class="form-group">
															<label for="gender">Gender</label>
															<select name="gender" id="gender" class="form-control" style="display: none;">
																<option value="l">Laki-laki</option>
																<option value="p">Perempuan</option>
															</select>
															<div class="nice-select form-control" tabindex="0"><span class="current">Gender</span>
																<ul class="list">
																	<li data-value="l" class="option">Laki-laki</li>
																	<li data-value="p" class="option">Perempuan</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<button type="submit" class="default-btn btn-bg-three btn btn-block rounded-btn mt-3"
													id="btn-change-profile">Ganti perubahan</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="tabs_item">
								<button class="btn btn-md rounded-lg btn-bg-three mt-2 mb-2 text-white"
									onclick="showAddressModal()">Tambah alamat</button>
								<div id="address-container">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Address Modal -->
<div class="modal fade" id="address-modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah alamat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="address-form">
				<div class="modal-body">
					<input type="hidden" id="address_id" name="address_id"></input>
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
					<button type="button" class="default-btn btn btn-outline-secondary text-dark" data-dismiss="modal">Tutup</button>
					<button type="submit" class="default-btn btn btn-bg-three" id="btn-addUpdate-address">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="' . $globalPlugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $globalPlugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $globalPlugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $userAssets . '/js/jquery.nice-select.min.js"></script>
		<script src="' . $js . '/user/profile/app.js"></script>
		<script>
			initPlugiOption();
			getMyData();
		</script>
	'
]);
?>
