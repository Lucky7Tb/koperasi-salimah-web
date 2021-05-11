	</main>

	<!-- START: Footer-->
	<div class="footer">
		<div class="footer2">
			<a href="<?= base_url('/') ?>">
				<img src="<?= base_url('img/tes4.png') ?>" width="280" alt="logo" loading="lazy">
			</a>
		</div>
		<div class="">
			<p><a href="" class="putih">About Us</a></p>
			<p><a href="" class="putih">Contact</a></p>
			<p><a href="" class="putih">Terms & conditions</a></p>
		</div>
		<div class="">
			<p><a href="" class="putih">Facebook</a></p>
			<p><a href="" class="putih">Website</a></p>
			<p><a href="" class="putih">Instagram</a></p>
		</div>
		<div class="">
			<p>Subscribe to our newsletter</p>
			<form class="w-75 my-2 my-lg-0">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Email" aria-label="search" aria-describedby="button-addon2">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="button-addon2">OK</button>
					</div>
				</div>
			</form>
		</div>
		<div class="footer2">
			<p>Jalan Cigadung Raya Timur, no. 85 F - Bandung</p>
			<p>+62 823 1608 6685</p>
			<p>emailsalimah@gmail.com</p>
		</div>
	</div>
	<!-- END: Footer-->

	<!-- START: Back to top-->
	<a href="#" class="scrollup text-center">
		<i class="icon-arrow-up"></i>
	</a>
	<!-- END: Back to top-->

	<!-- START: Template JS-->
	<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/slimscroll/jquery.slimscroll.min.js') ?>"></script>
	<!-- END: Template JS-->

	<!-- START: APP JS-->
	<script src="<?= base_url('dist') ?>/js/app.js"></script>
	<!-- END: APP JS-->
	<?= isset($js) ? $js : '' ?>
	</body>

	</html>
