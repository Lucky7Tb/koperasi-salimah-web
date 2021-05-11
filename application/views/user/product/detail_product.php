<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
?>
<div class="container-fluid site-width">



	<!-- START: Breadcrumbs-->
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Detail Produk</h4>
				</div>

				<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><a href="#">Produk</a></li>
					<li class="breadcrumb-item">Detail Produk</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->


	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-lg-5">

							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="dist/images/cap3.jpg" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="dist/images/cap2.jpg" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="dist/images/ecommerce-img1.jpg" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="col-md-12 col-lg-7">
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<h3 class="mb-0"><a href="#" class="f-weight-500 text-primary">Flowers
										Structured Coat</a></h3>
							</div>
							<div class="card-body border border-top-0 border-right-0 border-left-0">
								<div class="clearfix">
									<div class="float-left mr-2">
										<ul class="list-inline mb-0">
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
										</ul>
									</div>
									<span>(3 ulasan)</span>
								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="row">
									<div class="col-12">
										<div class="float-left ml-2">
											<h4 class="lato-font mb-0 text-danger">Rp285.000,00</h4>
										</div>
									</div>

								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="position-relative">
									<div class="media d-md-flex d-block">
										<a href="#"><img src="dist/images/contact-3.jpg" width="40" alt="" class="img-fluid rounded-circle"></a>
										<div class="media-body z-index-1">
											<div class="pl-4">
												<h6>Admin</h6>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="d-inline-block mr-3">
									<p class="dark-color f-weight-600">Jumlah: </p>
								</div>
								<div class="d-inline-block mr-3">
									<div class="form-group">
										<input type="number" class="form-control" value="1">
									</div>
								</div>
								<div class="mr-3">
									<a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
								</div>
							</div>
							<div class="card-body">
								<ul class="list-unstyled">

									<li class="font-weight-bold dark-color mb-2">Kategory: <span class="body-color font-weight-normal">Kategori 1</span></li>

									<li class="font-weight-bold dark-color mb-2">Share:
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-facebook"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-twitter"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-dribbble"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-pinterest"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-linkedin"></i></a>
									</li>
								</ul>
								<div class="mr-3">
									<a href="#" class="btn btn-primary">Tambah ke Wishlist <i class="icon-heart"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">

					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills flex-column flex-sm-row justify-content-center ">
								<li class="nav-item">
									<a class="nav-link body-color h6 mb-0 active" data-toggle="tab" href="#Deskripsi"> Deskripsi </a>
								</li>

								<li class="nav-item">
									<a class="nav-link body-color h6 mb-0" data-toggle="tab" href="#Ulasan">Ulasan (3)</a>
								</li>
							</ul>
							<div class="tab-content mt-5" id="myTabContent">
								<div class="tab-pane fade show active" id="Deskripsi" role="tabpanel" aria-labelledby="Deskripsi">
									<div class="row">
										<div class="col-md-6">
											<p class="pb-3" lang="ca">Lorem ipsum dolor sit amet, consectetuer
												adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
												Cum sociis natoque penatibus et magnis dis parturient montes,
												nascetur ridiculus mus. Donec quam felis, ultricies nec,
												pellentesque eu, pretium quis, sem. Nulla consequat massa quis
												enim. Donec pede justo, fringilla vel, aliquet nec,.</p>
											<p lang="ca">In enim justo, rhoncus ut, imperdiet a, venenatis
												vitae, justo. Nullam dictum felis eu pede mollis pretium.
												Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
												Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor
												eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
												dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
												nulla ut metus varius laoreet. Quisque rutrum.</p>
										</div>
										<div class="col-md-6">
											<p class="pb-3" lang="ca">Lorem ipsum dolor sit amet, consectetuer
												adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
												Cum sociis natoque penatibus et magnis dis parturient montes,
												nascetur ridiculus mus. Donec quam felis, ultricies nec,
												pellentesque eu, pretium quis, sem. Nulla consequat massa quis
												enim. Donec pede justo, fringilla vel, aliquet nec,.</p>
											<p lang="ca">In enim justo, rhoncus ut, imperdiet a, venenatis
												vitae, justo. Nullam dictum felis eu pede mollis pretium.
												Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
												Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor
												eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
												dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
												nulla ut metus varius laoreet. Quisque rutrum.</p>
										</div>
										<div class="col-md-6">
											<p class="pb-3" lang="ca">Etiam sit ameta orci eget eros faucibus
												tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec
												sodales sagittis magna. Sed consequat, leo eget bibendum
												sodales, augue velit cursus nunc, quis gravida magna mi a
												libero. Fusce vulputate eleifend sapien. Vestibulum purus quam,
												scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan
												lorem in dui. Vestibulum ante ipsum primis in faucibus orci
												luctus et ultrices posuere cubilia.</p>
											<p lang="ca">Aenean imperdiet. Etiam ultricies nisi vel augue.
												Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
												rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem
												quam semper libero, sit amet adipiscing sem neque sed ipsum.
											</p>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="Ulasan" role="tabpanel" aria-labelledby="Ulasan">
									<div class="row">
										<div class="col-md-6">
											<div>
												<div class="media d-md-flex d-block">
													<a href="#"><img src="<?= base_url('dist/images/ecommerce-img2.jpg') ?>" width="40" alt="" class="img-fluid rounded-circle"></a>
													<div class="media-body z-index-1">
														<div class="pl-4">
															<h6>Udin</h6>
														</div>
													</div>
												</div>
												<div class="float-left mr-2">
													<ul class="list-inline mb-0">
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
													</ul>
												</div><br>
												<p class="pb-3" lang="ca">Lorem ipsum dolor sit amet, consectetuer
													adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
													Cum sociis natoque penatibus et magnis dis parturient montes,
													nascetur ridiculus mus. Donec quam felis, ultricies nec,
													pellentesque eu, pretium quis, sem. Nulla consequat massa quis
													enim. Donec pede justo, fringilla vel, aliquet nec,.</p>

											</div>
											<div>
												<div class="media d-md-flex d-block">
													<a href="#"><img src="<?= base_url('dist/images/ecommerce-img2.jpg') ?>" width="40" alt="" class="img-fluid rounded-circle"></a>
													<div class="media-body z-index-1">
														<div class="pl-4">
															<h6>Udin</h6>
														</div>
													</div>
												</div>
												<div class="float-left mr-2">
													<ul class="list-inline mb-0">
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
													</ul>
												</div><br>
												<p lang="ca">In enim justo, rhoncus ut, imperdiet a, venenatis
													vitae, justo. Nullam dictum felis eu pede mollis pretium.
													Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
													Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor
													eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
													dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra
													nulla ut metus varius laoreet. Quisque rutrum.</p>
											</div>
										</div>
										<div class="col-md-6">
											<div>
												<div class="media d-md-flex d-block">
													<a href="#"><img src="dist/images/contact-3.jpg" width="40" alt="" class="img-fluid rounded-circle"></a>
													<div class="media-body z-index-1">
														<div class="pl-4">
															<h6>Udin</h6>
														</div>
													</div>
												</div>
												<div class="float-left mr-2">
													<ul class="list-inline mb-0">
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a></li>
													</ul>
												</div><br>
												<p class="pb-3" lang="ca">Lorem ipsum dolor sit amet, consectetuer
													adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
													Cum sociis natoque penatibus et magnis dis parturient montes,
													nascetur ridiculus mus. Donec quam felis, ultricies nec,
													pellentesque eu, pretium quis, sem. Nulla consequat massa quis
													enim. Donec pede justo, fringilla vel, aliquet nec,.</p>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>


		</div>
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center pb-4">
							<div class="heading">
								<h3 class="lato-font font-weight-bold">
									Produk Terkait
								</h3>
								<div class="custom-devider large mx-auto"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-3 mb-4">
							<div class="position-relative">
								<img src="<?= base_url('dist/images/ecommerce-img2.jpg') ?>" alt="" class="img-fluid">
								<div class="caption-bg fade bg-transparent text-right">
									<div class="d-table w-100 h-100 ">
										<div class="d-table-cell align-bottom">
											<div class="mb-3">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-heart"></i></a>
											</div>
											<div class="mb-4">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-bag"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="pt-3">
								<p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
										Structured Coat</a></p>
								<div class="clearfix">
									<div class="d-inline-block"><del>$398.00 </del></div>
									<div class="d-inline-block text-danger pl-2">$285.00</div>
									<ul class="list-inline mb-0 mt-2">
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 mb-4">
							<div class="position-relative">
								<img src="<?= base_url('dist/images/ecommerce-img2.jpg') ?>" alt="" class="img-fluid">
								<div class="caption-bg fade bg-transparent text-right">
									<div class="d-table w-100 h-100 ">
										<div class="d-table-cell align-bottom">
											<div class="mb-3">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-heart"></i></a>
											</div>
											<div class="mb-4">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-bag"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="pt-3">
								<p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
										Structured Coat</a></p>
								<div class="clearfix">
									<div class="d-inline-block"><del>$398.00 </del></div>
									<div class="d-inline-block text-danger pl-2">$285.00</div>
									<ul class="list-inline mb-0 mt-2">
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 mb-4">
							<div class="position-relative">
								<img src="dist/images/ecommerce-img3.jpg" alt="" class="img-fluid">
								<div class="caption-bg fade bg-transparent text-right">
									<div class="d-table w-100 h-100 ">
										<div class="d-table-cell align-bottom">
											<div class="mb-3">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-heart"></i></a>
											</div>
											<div class="mb-4">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-bag"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="pt-3">
								<p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
										Structured Coat</a></p>
								<div class="clearfix">
									<div class="d-inline-block"><del>$398.00 </del></div>
									<div class="d-inline-block text-danger pl-2">$285.00</div>
									<ul class="list-inline mb-0 mt-2">
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 mb-4">
							<div class="position-relative">
								<img src="dist/images/ecommerce-img4.jpg" alt="" class="img-fluid">
								<div class="caption-bg fade bg-transparent text-right">
									<div class="d-table w-100 h-100 ">
										<div class="d-table-cell align-bottom">
											<div class="mb-3">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-heart"></i></a>
											</div>
											<div class="mb-4">
												<a href="#" class="rounded-left bg-white px-3 py-2 text-primary"><i class="icon-bag"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="pt-3">
								<p class="mb-2"><a href="#" class="font-weight-bold text-primary">Flowers
										Structured Coat</a></p>
								<div class="clearfix">
									<div class="d-inline-block"><del>$398.00 </del></div>
									<div class="d-inline-block text-danger pl-2">$285.00</div>
									<ul class="list-inline mb-0 mt-2">
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
										<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>


		</div>

	</div>
	<!-- END: Card DATA-->



</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer');
?>
