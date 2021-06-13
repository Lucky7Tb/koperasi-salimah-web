<?php
$css = base_url('dist/css');
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="' . $plugin . '/fontawesome/css/all.min.css">
	'
]);
?>

<!-- Transaction Proof modal -->
<div class="modal fade" id="transaction-proof-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="transactionProof">Ubah status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="transaction-proof-form">
				<div class="modal-body">
					<input type="hidden" name="transaction-proof-id" id="transaction-proof-id">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control custom-select" required>
							<option disabled>Pilih status</option>
							<option value="2">Diterima</option>
							<option value="3">Ditolak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="message">Pesan</label>
						<input type="text" name="message" id="message" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-lg btn-outline-dark" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-lg btn-primary" id="btn-change-proof-status">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Transaksi</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body" id="main">
					<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="pills-transaction-tab" data-toggle="pill" href="#pills-transaction" role="tab" aria-controls="pills-transaction" aria-selected="true">
								Transaksi
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="pills-transaction-proof-tab" data-toggle="pill" href="#pills-transaction-proof" role="tab" aria-controls="pills-transaction-proof" aria-selected="false">
								Bukti pembayaran
							</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-transaction" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="table-responsive">
								<div class="float-left">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<select name="filter" id="filter-transaction" class="form-control costume-select" style="width: 15em;">
													<option value="full_name">Nama</option>
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="updated_at">Tgl perubahan</option>
												</select>
											</div>
											<div class="col-6">
												<button class="btn btn-sm btn-primary ml-5" id="order-direction-button">
													<i class="fas fa-filter">a-z</i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="float-right">
									<label>
										Search:
										<input type="search" class="form-control form-control-lg" id="input-search-transaction">
									</label>
									<button class="btn btn-lg btn-primary" id="button-transaction-search">search</button>
								</div>
								<div class="table-responsive">
									<table id="transaction-table" class="display table table-bordered text-center">
										<thead>
											<tr role="row">
												<th rowspan="2">#</th>
												<th rowspan="2">Nama</th>
												<th rowspan="2">Total bayar</th>
												<th rowspan="2">Status</th>
												<th rowspan="2">Token</th>
												<th rowspan="2">Tgl perubahan</th>
												<th>Aksi</th>
											</tr>
											<tr>
												<th>Detail</th>
											</tr>
										</thead>
										<tbody id="transaction-data-content" style="font-size: 14px;">

										</tbody>
									</table>
								</div>
							</div>
							<div id="example_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="btn btn-lg page-link" id="prev-transaction-button">
											Previous
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="page-link" id="next-transaction-button">
											Next
										</button>
									</li>
								</ul>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-transaction-proof" role="tabpanel" aria-labelledby="pills-transaction-proof-tab">
							<div class="table-responsive">
								<div class="float-left">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<select name="filter" id="filter-transaction-proof" class="form-control costume-select" style="width: 15em;">
													<option value="full_name">Nama</option>
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="updated_at">Tgl perubahan</option>
												</select>
											</div>
											<div class="col-6">
												<button class="btn btn-sm btn-primary ml-5" id="order-direction-proof-button">
													<i class="fas fa-filter">a-z</i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="float-right">
									<label>
										Search:
										<input type="search" class="form-control form-control-lg" id="input-search-transaction-proof">
									</label>
									<button class="btn btn-lg btn-primary" id="button-transaction-proof-search">search</button>
								</div>
								<div class="table-responsive">
									<table id="transaction-table" class="display table table-bordered text-center">
										<thead>
											<tr role="row">
												<th rowspan="2">#</th>
												<th rowspan="2">Bukti</th>
												<th rowspan="2">Nama</th>
												<th rowspan="2">Total bayar</th>
												<th rowspan="2">Status</th>
												<th rowspan="2">Token</th>
												<th rowspan="2">Tgl perubahan</th>
												<th>Aksi</th>
											</tr>
											<tr>
												<th>Detail</th>
											</tr>
										</thead>
										<tbody id="transaction-proof-data-content" style="font-size: 14px;">

										</tbody>
									</table>
								</div>
							</div>
							<div id="example_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="btn btn-lg page-link" id="prev-transaction-proof-button">
											Previous
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="btn btn-lg page-link" id="next-transaction-proof-button">
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
		<script src="' . $js . '/admin/transaction/transaction.js"></script>
		<script src="' . $js . '/admin/transaction/transaction-proof.js"></script>
		<script>
			getTransactions();
			getTransactionsProof();
		</script>
	'
]);
?>
