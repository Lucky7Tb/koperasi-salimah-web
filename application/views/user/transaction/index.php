<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="'. $globalPlugin .'/fontawesome/css/all.min.css">
	'
]);
?>
<div class="product-tab pb-70 mt-5 mt-sm-1">
	<div class="container">
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
			<div class="col-lg-12 col-md-12">
				<div class="tab products-details-tab">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<ul class="tabs">
								<li>
									<a href="#">
										Pembelian aktif
									</a>
								</li>
								<li>
									<a href="#">
										Riwayat pembelian
									</a>
								</li>
							</ul>
						</div>

						<div class="col-lg-12 col-md-12">
							<div class="tab_content current active pt-45">
								<div class="tabs_item current">
									<div class="table-responsive">
										<div class="d-flex flex-column flex-sm-row justify-content-between">
											<div>
												<div class="form-group">
													<div class="d-flex justify-content-around">
														<div>
															<select name="filter" id="filter-transaction" class="form-control costume-select"
																style="width: 15em;">
																<option value="status">Status</option>
																<option value="total_price">Total bayar</option>
																<option value="created_at">Tgl pembelian</option>
																<option value="updated_at">Tgl perubahan</option>
															</select>
														</div>
														<div>
															<button class="btn btn-bg-three text-white ml-2" id="order-direction-button">
																<i class='bx bx-sort-a-z'></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-around">
												<div class="form-group">
													<input type="search" class="form-control" id="input-search-transaction"
														placeholder="Cari transaksi">
												</div>
												<div>
													<button class="btn btn-bg-three text-white ml-2" id="button-transaction-search">
														<i class="bx bx-search"></i> Cari
													</button>
												</div>
											</div>
										</div>
										<table id="transaction-table" class="table table-bordered text-center">
											<thead>
												<tr role="row">
													<th>#</th>
													<th>Total bayar</th>
													<th>Status</th>
													<th>Token</th>
													<th>Tgl pembelian</th>
													<th>Tgl perubahan</th>
													<th>Detail</th>
												</tr>
											</thead>
											<tbody id="transaction-data-content" style="font-size: 14px;">
											</tbody>
										</table>
										<div id="example_paginate">
											<ul class="pagination">
												<li class="paginate_button page-item previous">
													<button class="btn btn-bg-three text-white" id="prev-transaction-button">
														Kembali
													</button>
												</li>
												<li class="paginate_button page-item next ml-2">
													<button class="btn btn-bg-three text-white" id="next-transaction-button">
														Berikutnya
													</button>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="tabs_item">
									<div class="table-responsive">
										<div class="d-flex flex-column flex-sm-row justify-content-between">
											<div>
												<div class="form-group">
													<div class="d-flex justify-content-around">
														<div>
															<select name="filter" id="history-filter-transaction" class="form-control costume-select"
																style="width: 15em;">
																<option value="status">Status</option>
																<option value="total_price">Total bayar</option>
																<option value="created_at">Tgl pembelian</option>
																<option value="updated_at">Tgl perubahan</option>
															</select>
														</div>
														<div>
															<button class="btn btn-bg-three text-white ml-2" id="history-order-direction-button">
																<i class='bx bx-sort-a-z'></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-around">
												<div class="form-group">
													<input type="search" class="form-control" id="input-search-history-transaction"
														placeholder="Cari transaksi">
												</div>
												<div>
													<button class="btn btn-bg-three text-white ml-2" id="button-history-transaction-search">
														<i class="bx bx-search"></i> Cari
													</button>
												</div>
											</div>
										</div>
										<table id="hisotry-transaction-table" class="table table-bordered text-center">
											<thead>
												<tr role="row">
													<th>#</th>
													<th>Total bayar</th>
													<th>Status</th>
													<th>Token</th>
													<th>Tgl pembelian</th>
													<th>Tgl perubahan</th>
													<th>Detail</th>
												</tr>
											</thead>
											<tbody id="history-transaction-data-content" style="font-size: 14px;">
											</tbody>
										</table>
										<div id="example_paginate">
											<ul class="pagination">
												<li class="paginate_button page-item previous">
													<button class="btn btn-bg-three text-white" id="prev-history-transaction-button">
														Kembali
													</button>
												</li>
												<li class="paginate_button page-item next ml-2">
													<button class="btn btn-bg-three text-white" id="next-history-transaction-button">
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
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="'.$globalPlugin.'/moment/moment.js"></script>
		<script src="'.$js.'/user/transaction/active-transaction.js"></script>
		<script src="'.$js.'/user/transaction/history-transaction.js"></script>
	'
]);
?>
