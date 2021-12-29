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
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Transaksi Pending</strong> 
					<i class="fas fa-hourglass-half icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="transaction_proof_pending"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Transaksi diproses</strong> 
					<i class="fas fa-hourglass-half icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="process_transaction"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Transaksi sedang dikirim</strong> 
					<i class="fas fa-truck icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="sent_transaction"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Transaksi terverifikasi</strong> 
					<i class="fas fa-check icons icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="verified_transaction"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Transaksi sukses</strong> 
					<i class="fas fa-check icons icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="success_transaction"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Total produk</strong> 
					<i class="fas fa-boxes icons icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="total_product"></h1>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<strong>Total aktif produk</strong> 
					<i class="fas fa-boxes icons icons card-liner-icon mt-2"></i>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<h1 class="card-liner-title" id="total_active_product"></h1>
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
