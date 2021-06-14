<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header', [
	'css' => '
		<link rel="stylesheet" href="'. $plugin .'/fontawesome/css/all.min.css">
	'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h2 class="mb-0">Riwayat Transaksi</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="pills-active-transaction-tab" data-toggle="pill" href="#pills-active-transaction" role="tab" aria-controls="pills-active-transaction" aria-selected="true">Pembelian aktif</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="pills-history-transaction-tab" data-toggle="pill" href="#pills-history-transaction" role="tab" aria-controls="pills-history-transaction" aria-selected="false">Riwayat pembelian</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-active-transaction" role="tabpanel" aria-labelledby="pills-active-transaction-tab">
							<div class="table-responsive">
								<div class="float-left">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<select name="filter" id="filter-transaction" class="form-control costume-select" style="width: 15em;">
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="created_at">Tgl pembelian</option>
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
										Cari:
										<input type="search" class="form-control form-control-lg" id="input-search-transaction" placeholder="cari...">
									</label>
									<button class="btn btn-lg btn-primary" id="button-transaction-search">Cari</button>
								</div>
								<table id="transaction-table" class="display table table-bordered text-center">
									<thead>
										<tr role="row">
											<th rowspan="2">#</th>
											<th rowspan="2">Total bayar</th>
											<th rowspan="2">Status</th>
											<th rowspan="2">Token</th>
											<th rowspan="2">Tgl pembelian</th>
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
								<div id="example_paginate">
									<ul class="pagination">
										<li class="paginate_button page-item previous">
											<button class="btn btn-lg page-link" id="prev-transaction-button">
												Kembali
											</button>
										</li>
										<li class="paginate_button page-item next">
											<button class="page-link" id="next-transaction-button">
												Berikutnya
											</button>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-history-transaction" role="tabpanel" aria-labelledby="pills-history-transaction-tab">
							<div class="table-responsive">
								<div class="float-left">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<select name="filter" id="filter-history-transaction" class="form-control costume-select" style="width: 15em;">
													<option value="status">Status</option>
													<option value="total_price">Total bayar</option>
													<option value="created_at">Tgl pembelian</option>
													<option value="updated_at">Tgl perubahan</option>
												</select>
											</div>
											<div class="col-6">
												<button class="btn btn-sm btn-primary ml-5" id="history-order-direction-button">
												<i class="fas fa-filter">a-z</i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="float-right">
									<label>
										Cari:
										<input type="search" class="form-control form-control-lg" id="input-search-history-transaction" placeholder="cari...">
									</label>
									<button class="btn btn-lg btn-primary" id="button-history-transaction-search">Cari</button>
								</div>
								<table id="transaction-table" class="display table table-bordered text-center">
									<thead>
										<tr role="row">
											<th>#</th>
											<th>Total bayar</th>
											<th>Status</th>
											<th>Token</th>
											<th>Tgl pembelian</th>
											<th>Tgl perubahan</th>
										</tr>
									</thead>
									<tbody id="history-transaction-data-content" style="font-size: 14px;">
									</tbody>
								</table>
								<div id="example_paginate">
									<ul class="pagination">
										<li class="paginate_button page-item previous">
											<button class="btn btn-lg page-link" id="prev-history-transaction-button">
												Kembali
											</button>
										</li>
										<li class="paginate_button page-item next">
											<button class="page-link" id="next-history-transaction-button">
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
</div>
<?php
$js = base_url('dist/js');
$this->load->view('template/footer', [
	'js' => '
		<script src="'.$plugin.'/moment/moment.js"></script>
		<script src="'.$js.'/user/transaction/active-transaction.js"></script>
		<script src="'.$js.'/user/transaction/history-transaction.js"></script>
		<script>
			getActiveTransactions();
			getHistoryTransactions();
		</script>
	'
]);
?>
