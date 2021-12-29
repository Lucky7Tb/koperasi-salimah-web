<?php
$globalPlugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
	'
]);
?>
<div class="modal fade" id="user-ban-modal" tabindex="-1" aria-labelledby="user-ban-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="user-ban-modal-label">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<p class="lead">Yakin ingin <strong>Banned </strong> user ini?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal"
					aria-label="Close">Tutup</button>
				<button type="button" class="btn btn-danger" id="btn-ban-user">Ya Banned</button>
			</div>
    </div>
  </div>
</div>

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
						<div class="form-group mb-3" id="level-field-container">
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
						<div class="form-group mb-3">
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#user-ban-modal" data-bs-whatever="@mdo">Banned
								user</button>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary" id="btn-edit-user">Simpan</button>
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
		<script src="' . $js . '/admin/user/edit.js"></script>
	'
]);
?>
