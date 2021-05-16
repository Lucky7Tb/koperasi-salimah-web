<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
?>

<!-- Delete wishlist modal -->
<div class="modal fade" id="deleteWishlistModal" tabindex="-1" aria-labelledby="deleteWishlistModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteWishlistModalLabel">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-delete-wishlist">
				<div class="modal-body">
					<p class="lead">Yakin ingin menghapus produk ini dari wishlist?</p>
					<input type="hidden" name="wishlist-id" id="wishlist-id">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-danger" id="btn-delete-wishlist">Ya, hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Add to cart modal -->

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h2 class="mb-0">Wishlist Kamu</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body container">
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3" id="wishlist-container">

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
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/user/wishlist/app.js"></script>
		<script>
			getWishlist();
		</script>
	'
]);
?>
