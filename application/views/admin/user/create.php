<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Create User</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $plugin . '/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/user/app.js"></script>
		<script>
			// $("#main").slimScroll({
			// 	height: "350px"
			// });
			getUsers();
		</script>
	'
]);
?>
