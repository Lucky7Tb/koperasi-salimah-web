<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
	'
]);
?>
<div class="container mb-3">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body" id="main">
					<form method="post" id="user-form">
						<div class="form-group mb-3">
							<label for="full_name">Nama lengkap</label>
							<input type="text" name="full_name" id="full_name" class="form-control" placeholder="Masukan nama"
								required>
						</div>
						<div class="form-group mb-3">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Masukan email" required>
						</div>
						<div class="form-group mb-3">
							<label for="username">Username</label>
							<input type="username" name="username" id="username" class="form-control" placeholder="Masukan username"
								required>
						</div>
						<div class="form-group mb-3">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Masukan password"
								required>
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
						<div>
							<label>Tanggal lahir</label>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-calendar"></i>
							</span>
							<input type="text" class="form-control" name="date_of_birth" id="date_of_birth"
								placeholder="Masukan tanggal lahir" autocomplete="off" required>
						</div>
						<div class="form-group mb-3">
							<label for="phone_number">No telp</label>
							<input type="number" class="form-control" name="phone_number" id="phone_number"
								placeholder="Masukan no telp" required>
						</div>
						<div class="form-group mb-3">
							<div>
								<label>Level</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="type-1" value="1" required checked>
								<label class="form-check-label" for="type-1">
									User
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="type" id="type-2" value="0" required>
								<label class="form-check-label" for="type-2">
									Admin
								</label>
							</div>
						</div>
						<div class="form-group mb-3">
							<label for="photo">Foto user</label>
							<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M"
								data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary" id="btn-add-user">Simpan</button>
							<a href="<?= base_url('admin/user') ?>" class="btn btn-outline-dark text-center" role="button">Kembali</a>
						</div>
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
		<script src="' . $globalPlugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $globalPlugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $js . '/admin/user/create.js"></script>
	'
]);
?>
