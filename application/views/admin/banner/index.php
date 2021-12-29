<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/fontawesome/css/all.min.css">
	'
]);
?>

<!-- Delete modal -->
<div class="modal fade" id="banner-delete-modal" tabindex="-1" aria-labelledby="banner-delete-modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="lead">Yakin ingin mengapus banner ini??</p>
				<input type="hidden" name="id_banner" id="id_banner">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
				<button type="button" class="btn btn-danger" id="btn-delete-banner" onclick="deleteBanner()">Ya, hapus</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid site-width">
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
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/banner/create') ?>">Tambah banner</a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<table id="banner-table" class="display table table-striped table-bordered text-center" role="grid">
							<thead>
								<tr role="row">
									<th rowspan="2">#</th>
									<th rowspan="2">Foto</th>
									<th rowspan="2">Link</th>
									<th rowspan="2">Tgl dibuat</th>
									<th>Aksi</th>
								</tr>
								<tr>
									<th>Hapus</th>
								</tr>
							</thead>
							<tbody id="banner-data-content" style="font-size: 14px;">

							</tbody>
						</table>
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
		<script src="' . $globalPlugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $globalPlugin . '/moment/moment.js"></script>
		<script src="' . $js . '/admin/banner/app.js"></script>
	'
]);
?>
