<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/fancybox/jquery.fancybox.min.css">
	'
]);
?>

<!-- Transaction Proof modal -->
<div class="modal fade" id="transaction-proof-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="transactionProof">Ubah status</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
					<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
					<button type="submit" class="btn btn-primary" id="btn-change-proof-status">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Download transaction modal -->
<div class="modal fade" id="download-transaction-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Download transaksi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="status_transaction">Status</label>
					<select name="status_transaction" id="status_transaction" class="form-control custom-select" required>
						<option value="-1">Semua</option>
						<option value="0">Belum dibayar</option>
						<option value="1">Terverifikasi</option>
						<option value="2">Diproses</option>
						<option value="3">Dikirim</option>
						<option value="4">Diterima</option>
						<option value="5">Pesanan dibatalkan</option>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-6">
							<label for="start_date">Tanggal awal</label>
							<input type="date" name="start_date" id="start_date" class="form-control" value="<?=  date("Y-m-d") ?>"
								required>
						</div>
						<div class="col-6">
							<label for="end_date">Tanggal akhir</label>
							<input type="date" name="end_date" id="end_date" class="form-control" value="<?=  date("Y-m-d") ?>"
								required>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-transaction-download">Download</button>
			</div>
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
			<div class="card bottom">
				<div class="card-body" id="main">
					<nav>
						<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
							<button class="nav-link active" id="nav-transaction" data-bs-toggle="tab" data-bs-target="#transaction"
								role="tab" aria-selected="true">
								Transaksi
							</button>
							<button class="nav-link" id="nav-proof-transaction" data-bs-toggle="tab"
								data-bs-target="#proof-transaction" role="tab" aria-selected="true">
								Bukti pembayaran
							</button>
						</div>
					</nav>
					<div class="tab-content mt-3" id="nav-tabContent">
						<div class="tab-pane fade show active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
							<div class="table-responsive px-2">
								<div class="d-flex flex-column flex-md-row justify-content-between px-2 pt-2 mb-3">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<select name="filter" id="filter-transaction" class="form-control costume-select"
													style="width: 10em;">
													<option value="full_name">Nama</option>
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="updated_at">Tgl perubahan</option>
												</select>
											</div>
											<div class="col-6">
												<button class="btn btn-primary" id="order-direction-button">
													<i class="fas fa-sort-alpha-up"></i>
												</button>
											</div>
										</div>
										<div>
											<div class="mt-3">
												<button type="button" class="btn btn-primary mb-3 mb-md-0" data-bs-target="#download-transaction-modal"
													data-bs-toggle="modal">
													<i class="fas fa-download"></i> Download transaksi
												</button>
												<button class="btn btn-info text-white" id="btn-update-old-transaction">
													<i class="fas fa-marker"></i> Update transaksi lama
												</button>
											</div>
										</div>
									</div>
									<div>
										<div class="d-flex justify-content-between mt-3 mt-md-0">
											<div style="margin-right: 2em">
												<input type="search" class="form-control" id="input-search-transaction"
													placeholder="Cari transaksi">
											</div>
											<div>
												<button class="btn btn-primary" id="button-transaction-search">Cari</button>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table id="transaction-table" class="display table table-striped table-bordered text-center">
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
							<div id="example_paginate mt-3">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="btn page-link" id="prev-transaction-button">
											Kembali
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="btn page-link" id="next-transaction-button">
											Berikutnya
										</button>
									</li>
								</ul>
							</div>
						</div>
						<div class="tab-pane fade" id="proof-transaction" role="tabpanel" aria-labelledby="proof-transaction-tab">
							<div class="table-responsive">
								<div class="d-flex flex-column flex-md-row justify-content-between px-2 pt-2">
									<div class="form-group mb-3 mb-md-0">
										<div class="d-flex justify-content-between">
											<div style="margin-right:2em">
												<select name="filter" id="filter-transaction-proof" class="form-control costume-select"
													style="width: 10em;">
													<option value="full_name">Nama</option>
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="updated_at">Tgl perubahan</option>
												</select>
											</div>
											<div>
												<button class="btn btn-primary" id="order-direction-proof-button">
													<i class="fas fa-sort-alpha-up"></i>
												</button>
											</div>
										</div>
									</div>
									<div class="d-flex justify-content-between">
										<div>
											<input type="search" class="form-control" id="input-search-transaction-proof"
												placeholder="Cari transaksi">
										</div>
										<div>
											<button class="btn btn-primary" id="button-transaction-proof-search">Cari</button>
										</div>
									</div>
								</div>
								<div class="table-responsive mt-3">
									<table id="transaction-table" class="display table table-striped table-bordered text-center">
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
							<div id="example_paginate mt-3">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="btn page-link" id="prev-transaction-proof-button">
											Kembali
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="btn page-link" id="next-transaction-proof-button">
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
</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $globalPlugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $globalPlugin . '/moment/moment.js"></script>
		<script src="' . $js . '/admin/transaction/transaction.js"></script>
		<script src="' . $js . '/admin/transaction/transaction-proof.js"></script>
		<script>
		$(document).ready(function() {
				getTransactions();
				getTransactionsProof();
			});
		</script>
	'
]);
?>
