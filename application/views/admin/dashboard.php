<?php
	$plugin = base_url('dist/vendors');
	$css = base_url('dist/css');
	$this->load->view('admin/template/header', [
		'css' => '
			<link rel="stylesheet" href="' . $plugin . '/fontawesome/css/all.min.css">
		'
	]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Selamat Datang di,</h4>
					<h1><?= $title ?> Koperasi Salimah</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-hourglass icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="transaction_proof_pending"></h1>
							<h6 class="card-liner-subtitle"><strong>Transaksi Pending</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-hourglass-half icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="process_transaction"></h1>
							<h6 class="card-liner-subtitle"><strong>Transaksi diproses</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-paper-plane icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="sent_transaction"></h1>
							<h6 class="card-liner-subtitle"><strong>Transaksi sedang dikirim</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-check icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="verified_transaction"></h1>
							<h6 class="card-liner-subtitle"><strong>Transaksi terverifikasi</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 col-sm-12 col-md-4 col-lg-3 offset-lg-1">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-check-double icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="success_transaction"></h1>
							<h6 class="card-liner-subtitle"><strong>Transaksi sukses</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-boxes icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="total_product"></h1>
							<h6 class="card-liner-subtitle"><strong>Total produk</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card">
				<div class="card-body" style="position: relative;">
					<div class="d-flex px-0 px-lg-2 py-2 align-self-center">
						<i class="fas fa-box-open icons card-liner-icon mt-2"></i>
						<div class="card-liner-content">
							<h1 class="card-liner-title" id="total_active_product"></h1>
							<h6 class="card-liner-subtitle"><strong>Total aktif produk</strong></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-4 offset-4 bottom">
		<h3 class="text-center">Produk terbaru</h3>
		<div id="latest_product"></div>
		</div>
	</div>
</div>
<?php
	$js = base_url('dist/js');
	$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $js . '/admin/dashboard.js"></script>
		<script>
			getDashboardData();
		</script>
	'
]);
?>