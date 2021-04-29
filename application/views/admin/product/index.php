<?php
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Produk</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- START: Card Data-->

	<div class="card-body">
		<div id="carouselExampleSlidesOnly" class="carousel slide pointer-event" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?= base_url('img')?>/tes6.png" alt="First slide">
				</div>
			</div>
		</div>
	</div>

	<!-- END: Card DATA-->
</div>
<?php
$js = base_url('dist/js');
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer');
?>
