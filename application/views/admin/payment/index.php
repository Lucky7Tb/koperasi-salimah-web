<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/fancybox/jquery.fancybox.min.css">
	'
]);
?>

<!-- Delete modal -->
<div class="modal fade" id="payment-delete-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paymentDeleteModalLabel">Peringatan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="lead">Yakin ingin <strong>menon-aktifkan</strong> metode pembayaran ini?</p>
				<input type="hidden" name="payment_id" id="payment_id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
				<button type="button" class="btn btn-danger" id="btn-delete-payment">Ya non-aktifkan</button>
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
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn btn-primary" href="<?= base_url('admin/payment/create') ?>">Tambah
						pembayaran</a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div class="d-flex flex-column flex-md-row justify-content-between mt-2 mb-3 px-2">
							<div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<select name="filter" id="filter-payment" class="form-control"
												style="width: 10em;">
												<option value="bank_name">Nama bank</option>
												<option value="name_account_bank">Pemilik akun bank</option>
												<option value="is_visible">Status</option>
											</select>
										</div>
										<div class="col-6">
											<button class="btn btn-primary" style="margin-left: 2em" id="order-direction-button">
												<i class="fas fa-sort-up">a-z</i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="d-flex justify-content-between">
									<div style="margin-right: 2em">
										<input type="text" class="form-control" id="input-search-payment" placeholder="Cari...">
									</div>
									<div>
										<button class="btn btn-primary" id="button-search">Cari</button>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table id="user-table" class="display table table-striped table-bordered text-center" role="grid">
								<thead>
									<tr role="row">
										<th rowspan="2">#</th>
										<th rowspan="2">Foto</th>
										<th rowspan="2">Nama bank</th>
										<th rowspan="2">Pemilik akun bank</th>
										<th rowspan="2">No bank</th>
										<th rowspan="2">Status</th>
										<th rowspan="2">Tgl perubahan</th>
										<th colspan="2">Aksi</th>
									</tr>
									<tr>
										<th>Update</th>
										<th>Aktif</th>
									</tr>
								</thead>
								<tbody id="payment-data-content" style="font-size: 14px;">

								</tbody>
							</table>
						</div>
						<div id="example_paginate">
							<ul class="pagination">
								<li class="paginate_button page-item previous">
									<button class="btn page-link" id="prev-button">
										Kembali
									</button>
								</li>
								<li class="paginate_button page-item next">
									<button class="btn page-link" id="next-button">
										Berikutnya
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
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $globalPlugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $globalPlugin . '/moment/moment.js"></script>
		<script src="' . $js . '/admin/payment/app.js"></script>
	'
]);
?>
