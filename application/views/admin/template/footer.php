	<div class="footer">
		<div class="footer2">
			<a href="#">
				<img src="<?= base_url('img/tes4.png') ?>" width="240" alt="salimah logo" loading="lazy">
			</a>
		</div>
		<div>
			<p><a href="" class="text-white">About Us</a></p>
			<p><a href="" class="text-white">Contact</a></p>
			<p><a href="" class="text-white">Terms & conditions</a></p>
		</div>
		<div>
			<p><a href="" class="text-white">Facebook</a></p>
			<p><a href="" class="text-white">Website</a></p>
			<p><a href="" class="text-white">Instagram</a></p>
		</div>
		<div>
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
			<a href="mailto:emailsalimah@gmail.com" class="text-white">emailsalimah@gmail.com</a>
		</div>
	</div>
	</main>
	<!-- END: Content-->

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
	<script src="../dist/js/app.js"></script>
	<!-- END: APP JS-->

	<!-- Other js -->
	<?= isset($js) ? $js : ''; ?>
	</body>

	</html>
