<?php
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
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
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/payment/create') ?>">Tambah pembayaran</a>
				</div>
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
							<h1>pembayaran</h1>
						</div>
						<div class="tab-pane fade" id="pills-transaction-proof" role="tabpanel" aria-labelledby="pills-transaction-proof-tab">
							<h1>Bukti pembayaran</h1>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer');
?>
