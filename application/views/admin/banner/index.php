<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="' . $plugin . '/fontawesome/css/all.min.css">
	'
]);
?>

<!-- Delete modal -->
<div class="modal fade" id="banner-delete-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="lead">Yakin ingin mengapus banner ini??</p>
				<input type="hidden" name="id_banner" id="id_banner">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-lg btn-outline-dark" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-lg btn-danger" id="btn-delete-banner" onclick="deleteBanner()">Ya, hapus</button>
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
					<a type="button" class="btn btn-lg btn-primary" href="<?= base_url('admin/banner/create') ?>">Tambah banner</a>
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
						<!-- <div id="example_paginate">
							<ul class="pagination">
								<li class="paginate_button page-item previous">
									<button class="btn btn-lg page-link" id="prev-button">
										Kembali
									</button>
								</li>
								<li class="paginate_button page-item next">
									<button class="btn btn-lg page-link" id="next-button">
										Berikutnya
									</button>
								</li>
							</ul>
						</div> -->
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
		<script src="' . $plugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $plugin . '/moment/moment.js"></script>
		<script src="' . $js . '/admin/banner/app.js"></script>
		<script>
			getBanners();
		</script>
	'
]);
?>
