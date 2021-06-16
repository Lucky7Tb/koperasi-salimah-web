	</main>

<!-- START: Footer-->
<footer class="ungu putih" id="footer-user">
	<div>
		<a href="<?= base_url('/') ?>">
			<img src="<?= base_url('/dist/images/salimah_logo.png') ?>" width="280" alt="logo" loading="lazy">
		</a>
	</div>
	<div>
		<p><a href="#" class="putih">About Us</a></p>
		<p><a href="#" class="putih">Contact</a></p>
		<p><a href="#" class="putih">Terms & conditions</a></p>
	</div>
	<div>
		<p><a href="#" class="putih">Facebook</a></p>
		<p><a href="#" class="putih">Website</a></p>
		<p><a href="#" class="putih">Instagram</a></p>
	</div>
	<div>
		<p>Jalan Cigadung Raya Timur, no. 85 F - Bandung</p>
		<p>+62 823 1608 6685</p>
		<p>emailsalimah@gmail.com</p>
	</div>
</footer>
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
	<script src="<?= base_url('dist/vendors/toastr/toastr.min.js') ?>"></script>
	<!-- END: Template JS-->

	<!-- START: APP JS-->
	<script src="<?= base_url('dist/js/app.js') ?>"></script>
	<script src="<?= base_url('dist/js/global.js') ?>"></script>
	<!-- END: APP JS-->
	<?= isset($js) ? $js : '' ?>
	</body>

	</html>
