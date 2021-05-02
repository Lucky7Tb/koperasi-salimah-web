<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
			<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
			<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
		'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Edit User</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body" id="main">
					<form method="post" id="user-form">
						<div class="form-group">
							<label for="full_name">Nama lengkap</label>
							<input type="text" name="full_name" id="full_name" class="form-control" placeholder="Masukan nama" required>
						</div>
						<div class="form-group">
							<div>
								<label>Gender</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender-1" value="l" required checked>
								<label class="form-check-label" for="gender">
									Laki-laki
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender-2" value="p" required>
								<label class="form-check-label" for="gender">
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
								<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Masukan tanggal lahir" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="phone_number">No telp</label>
							<input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Masukan no telp" required>
						</div>
						<div class="form-group">
							<div>
								<label>Level</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="type-1" value="1" required checked>
								<label class="form-check-label" for="type">
									User
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="type-2" value="0" required>
								<label class="form-check-label" for="type">
									Admin
								</label>
							</div>
						</div>
						<button type="submit" class="btn-lg btn-block btn-primary" id="btn-add-user">Submit</button>
						<a href="<?= base_url('admin/user') ?>" class="btn-lg btn-block btn-outline-dark text-center" role="button">Back</a>
					</form>
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
		<script src="' . $js . '/admin/user/edit.js"></script>
		<script>
			initOptionPlugin();
			getUser();
		</script>
	'
]);
?>