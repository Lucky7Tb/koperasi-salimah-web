<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
?>
<div class="container-fluid site-width">
	<!-- START: Breadcrumbs-->
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Riwayat Pembelian</h4>
				</div>

				<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item">Pembelian</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->


	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">

				<div class="card-body table-responsive">
					<table class="table table-bordered  table-hover mb-0">
						<thead>
							<tr>
								<th>Tgl</th>
								<th>Produk</th>
								<th>Total Harga</th>
								<th>Status</th>
								<th>Aksi</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-primary text-white">Standby</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>


							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-dark text-white">Paid</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>


							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-success text-white">Standby</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-danger text-white">Canceled</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-warning text-white">Shipped</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-danger text-white">Canceled</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-info text-white">Paid</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-danger text-white">Canceled</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
							<tr class="ng-scope">
								<td>01/01/2020</td>
								<td>Produk1, Produk2</td>
								<td>Rp20.000,00</td>
								<td><span class="badge badge-primary text-white">Paid</span></td>
								<td><a href="<?= base_url('order/detail') ?>" class="btn btn-primary">Detail</a></td>

							</tr>
						</tbody>
					</table>
				</div>
			</div>


		</div>


	</div>
	<!-- END: Card DATA-->







</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer');
?>
