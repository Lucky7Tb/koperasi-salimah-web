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
					<h4 class="mb-0">Profil</h4>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->

	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12  mt-3">
			<div class="card">
				<div class="card-body row">

					<div class="col-lg-12 col-xl-5" style="text-align: center;">
						<a href="#"><img src="dist/images/contact-3.jpg" width="200" alt="" class="img-fluid rounded-circle"></a>
						<br><br>
						<button type="button" class="btn btn-primary rounded-btn" data-toggle="modal" data-target="#ubahFotoProfil">Ubah Foto Profil</button>

					</div>
					<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
						<form>
							<div class="form-group">
								<label for="username1">Nama Lengkap</label>
								<input type="text" class="form-control" id="fullname1" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label for="username1">Username</label>
								<input type="text" class="form-control" id="username1" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="email1">Email</label>
								<input type="email" class="form-control" id="email1" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="inputState">Jenis Kelamin</label>
								<select id="inputState" class="form-control">
									<option selected="">Pilih</option>
									<option>Laki-laki</option>
									<option>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="dt">Tanggal Lahir</label>
								<input type="date" class="form-control" id="dt">
							</div>
							<div class="form-group">
								<label for="email1">No Telp</label>
								<input type="text" class="form-control" id="phone1" placeholder="No Telp">
							</div>
							<div class="form-group">
								<label for="address">Alamat Rumah</label>
								<input type="textarea" class="form-control" id="address" placeholder="Alamat Rumah Saya">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary rounded-btn">Simpan
									Perubahan</button>
							</div><br><br>
						</form>
						<h5>Ubah Password</h5>
						<form>
							<div class="form-group">
								<label for="inputPassword31">Password Lama</label>
								<input type="password" class="form-control" id="oldPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="inputPassword31">Password Baru</label>
								<input type="password" class="form-control" id="newPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="inputPassword31">Konfirmasi Password</label>
								<input type="password" class="form-control" id="confirmPassword" placeholder="Password">
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary rounded-btn">Ubah Password</button>
							</div>
						</form>

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
