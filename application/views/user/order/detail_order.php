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
					<h4 class="mb-0">Pembelian #001122</h4>
				</div>

				<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><a href="#">Pembelian</a></li>
					<li class="breadcrumb-item">Detail Pembelian</li>
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
						<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
							<h4>List Belanja</h4>
							<table class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0 p-3">
								<thead>
									<tr class="bg-transparent">
										<th class="border-bottom-0">Foto</th>
										<th class="border-bottom-0">Produk</th>
										<th class="border-bottom-0">Jumlah</th>
										<th class="border-bottom-0">Harga</th>

									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Flowers Structured Coat</td>
										<td class="w-25 align-middle">1</td>
										<td class="align-middle">Rp10.000,00</td>
									</tr>
									<tr>
										<td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Cotton White Top</td>
										<td class="w-25 align-middle">2</td>
										<td class="align-middle">Rp5.000,00</td>
									</tr>
									<tr>
										<td colspan="3">Ongkir</td>
										<td>Rp5.000,00</td>
									</tr>
									<tr>
										<td colspan="3">TOTAL HARGA</td>
										<td>Rp20.000,00</td>
									</tr>
								</tbody>
							</table>

							<div class="">
								<h4>Alamat</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="float-right w-100 border p-3">
											<b>Udin Saefudin</b>
											<address>
												Jalan Yang Lurus No 6 RT06/09<br>Kel Kiri Kec Kanan
												Wakanda<br>0812 3456 7890 </address>
										</div>
									</div>
								</div>
							</div>

							<div class="">
								<h4>Kurir</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="float-right w-100 border p-3">
											<b>JNE</b>
											<p>Resi : 00112233445566778899</p>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="col-lg-12 col-xl-5">
							<div class="">
								<h4>Status</h4>
								<div class="row p-3">
									<div class="col-10">
										<button type="button" class="btn btn-success btn-lg rounded-btn">Selesai</button>
									</div>
								</div>
							</div>

							<div class="">
								<h4>Bukti Pembayaran</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="card-body">
											<form action="http://html.designstream.co.in/file-upload" class="dropzone dropzone-primary dz-clickable">
												<div class="dz-default dz-message"><span>Foto Bukti
														Pembayaran</span></div>
											</form>
										</div>
										<p class="mb-0 h6"><a href="#" class="btn btn-success btn-block">Upload</a></p>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-12 col-sm-12 mt-3">
							<div class="card">
								<div class="card-body">
									<h4>Review</h4>
									<form>
										<h6 class="float-left"> Rating: </h6>
										<ul class="list-inline mb-0 mt-2">
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
											</li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
											</li>
										</ul><br>
										<div class="form-group">
											<div id="snow-container" class="height-175"></div>
										</div>
									</form>
									<a href="#" class="btn btn-success">Upload Review</a>
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
