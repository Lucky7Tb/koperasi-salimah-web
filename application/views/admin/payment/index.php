<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/fancybox/jquery.fancybox.min.css">
	'
]);
?>

<!-- Delete modal -->
<div class="modal fade" id="payment-delete-modal" tabindex="-1" aria-labelledby="paymentDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paymentDeleteModalLabel">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Yakin ingin mendelete metode pembayaran ini?</p>
				<input type="hidden" name="payment_id" id="payment_id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" id="btn-delete-payment">Hapus</button>
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
			<div class="card">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/payment/create') ?>">Tambah pembayaran</a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
							<div id="example_filter" class="dataTables_filter">
								<div class="float-right">
									<label>
										Search:
										<input type="search" class="form-control form-control-sm" id="input-search-payment">
									</label>
									<button class="btn btn-primary" id="button-search">search</button>
								</div>
							</div>
							<table id="user-table" class="display table table-striped table-bordered" role="grid">
								<thead>
									<tr role="row">
										<th rowspan="2">#</th>
										<th rowspan="2">Foto</th>
										<th rowspan="2">Nama bank</th>
										<th rowspan="2">Akun bank</th>
										<th rowspan="2">No bank</th>
										<th rowspan="2">Status</th>
										<th rowspan="2">Tgl perubahan</th>
										<th colspan="2">Aksi</th>
									</tr>
									<tr>
										<th>Update</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody id="payment-data-content">

								</tbody>
							</table>
							<div id="example_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="page-link" id="prev-button">
											Previous
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="page-link" id="next-button">
											Next
										</button>
									</li>
								</ul>
							</div>
						</div>
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
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/payment/app.js"></script>
		<script>
			getPayments();
		</script>
	'
]);
?>
