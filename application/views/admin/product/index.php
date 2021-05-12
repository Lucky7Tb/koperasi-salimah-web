<?php
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_SESSION['pesan'])) {
		echo $this->session->flashdata('pesan');
		unset($_SESSION['pesan']);
	}
	?>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary"
						 href="<?= base_url('admin/product/tambah') ?>">Tambah <?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div id="example_filter" class="dataTables_filter">
							<label>
								Search:
								<input type="search" class="form-control form-control-sm" id="input-search-product"
											 autocomplete="off">
							</label>
							<button class="btn btn-primary" id="button-search" type="button">search</button>
						</div>

						<!-- START: Product -->
						<div class="row mt-2" id="data-products">

						</div>

						<div class="row">
							<div class="col-12 col-sm-12">
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">
										<li class="page-item" id="prev-button">
											<a class="page-link" href="#" aria-label="Previous">
												<span aria-hidden="true">«</span>
												<span class="sr-only">Previous</span>
											</a>
										</li>
<!--										--><?php //for ($i = 1; $i <= 3; $i++) : ?>
<!--											<li class="page-item" id="page---><?//= $i ?><!--"><a class="page-link" id="page-text---><?//= $i ?><!--" href="#">--><?//= $i ?><!--</a></li>-->
<!--										--><?php //endfor ?>
										<li class="page-item" id="next-button">
											<a class="page-link" href="#" aria-label="Next">
												<span aria-hidden="true">»</span>
												<span class="sr-only">Next</span>
											</a>
										</li>
									</ul>
								</nav>
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
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer', array(
		'js' => '<script src="' . $js . '/admin/product/app.js"></script>
		<script>getProducts()</script>'
	)
);
?>
