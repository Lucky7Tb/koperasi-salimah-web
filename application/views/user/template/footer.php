	</main>

	<footer class="footer-area border-top">
		<div class="container">
			<div class="footer-top pt-100 pb-70">
				<div class="row">
					<div class="col-lg-3 offset-lg-2 col-md-6">
						<div class="footer-widget footer-widget-color">
							<div class="footer-logo">
								<a href="index.html">
									<img src="<?= base_url('dist/images/tes5.png') ?>" width="75%" alt="Salimah logo">
								</a>
							</div>
							<div class="w-100">
								PT. Salimah Prakarsa Cemerlang, organisasi Persaudaraan Muslimah (Salimah) sebagai wujud komitmen organisasi  untuk memberikan  solusi  bagi  permasalahan ekonomi umat islam.
							</div>
							<ul class="footer-list-contact">
								<li>
									<i class='bx bx-phone-call'></i>
									<a href="tel:+62(811)-110-0677">0811-1100-677</a>
								</li>
								<li>
									<i class='bx bx-envelope'></i>
									<a href="mailto:marketingsalimahfood@gmail.com">marketingsalimahfood@gmail.com</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-4 offset-lg-1 col-md-6">
						<div class="footer-widget footer-widget-color">
							<h3>Kontak kami</h3>
							<p>Memberikan kualitas makanan yang terbaik untuk anda</p>

							<ul class="social-link">
								<li>
									<a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
								</li>
								<li>
									<a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
								</li>
								<li>
									<a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
								</li>
								<li>
									<a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="copy-right-area-two">
				<div class="copy-right-text">
					<p>
						Copyright @<?= date("Y") ?> Koperasi salimah. All Rights Reserved by
						<a href="#">Koperasi salimah</a>
					</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="<?= base_url('dist/vendors/jquery/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('dist/user/assets/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('dist/user/assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('dist/user/assets/js/meanmenu.js') ?>"></script>
	<script src="<?= base_url('dist/user/assets/js/jquery-ui.min.js') ?>"></script>
	<script src="<?= base_url('dist/vendors/tata/tata.js') ?>"></script>
	<script src="<?= base_url('dist/js/global.js') ?>"></script>
	<script>
		jQuery('.mean-menu').meanmenu({ 
        meanScreenWidth: "991"
    });
		$(".side-nav-responsive .dot-menu").on("click", function(){
			$(".side-nav-responsive .container .container").toggleClass("active");
		});

		$(".side-nav-responsive .dot-menu").on("click", function(){
			$(".side-nav-responsive .container .container-2").toggleClass("active");
		});

		$(".side-nav-responsive .dot-menu").on("click", function(){
			$(".side-nav-responsive .container .container-3").toggleClass("active");
		});
	</script>
	<?= isset($js) ? $js : '' ?>
	</body>

	</html>
