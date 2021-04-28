<?php
	$css = base_url('dist/css');
	$this->load->view('admin/template/header', [
		'css' => '
			<link rel="stylesheet" href="'.$css.'/style.css">
		'
	]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Pembayaran</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$js = base_url('dist/js');
	$plugin = base_url('dist/vendors');
	$this->load->view('admin/template/footer', [
		'js' => '
			<script src="'.$js.'/script.js"></script>
		'
	]);
?>
