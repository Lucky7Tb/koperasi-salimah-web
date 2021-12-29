let idTransaction = window.location.href.split('/');
idTransaction = idTransaction[idTransaction.length - 1];

$(document).ready(function () {
	getDetailTransaction();
});

function getDetailTransaction() {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/transaction/getDetailTransaction?id=${idTransaction}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderDetailData(response.data);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
	});
}

function renderDetailData(data) {
	let status = '';
	let badge = '';
	const dateOrder = moment(data.updated_at).format('DD-MMM-YYYY HH:mm');
	const updatedDateOrder = moment(data.created_at).format('DD-MMM-YYYY HH:mm');
	$('#main').html('');
	switch (data.status) {
		case '0':
			status = 'Belum terverifikasi';
			badge = 'secondary';
			break;
		case '1':
			status = 'Terverifikasi';
			badge = 'info';
			break;
		case '2':
			status = 'Diproses';
			badge = 'warning';
			break;
		case '3':
			status = 'Dikirim';
			badge = 'warning';
			break;
		case '4':
			status = 'Diterima';
			badge = 'success';
			break;
		case '5':
			status = 'Pesanan dibatalkan';
			badge = 'danger';
			break;
	}

	let productContent = '';
	data.products.forEach((product, index) => {
		productContent += /*html*/ `
			<tr>
				<td>${++index}</td>
				<td>
					<img class="img-fluid rounded" src="${product.uri}" alt="${product.product_name}" style="height: 50px; width: 50px;">
				</td>
				<td>${product.product_name}</td>
				<td>${product.qty}</td>
				<td>Rp. ${global.rupiahFormat(product.sub_total_price)}</td>
				<td>${moment(product.created_at).format('DD-MMM-YYYY HH:mm')}</td>
				<td>${moment(product.updated_at).format('DD-MMM-YYYY HH:mm')}</td>
			</tr>
		`;
	});

	let proofContent = '';
	if (data.proof === null) {
		productContent += `
			<h4 class="text-center mb-5">Anda belum mengkonfirmasi transaksi ini</h4>
		`
	}else {
		proofContent += `
			<a href='${data.proof}' data-fancybox data-caption='Bukti pembayaran - ${data.full_name}'>
				<img src="${data.proof}" class="img-fluid d-block mx-auto" width="100px">
			</a>
		`;
	}

	const content = /*html*/ `
		<div class="row">
			<div class="col-12">
				<div class="mb-5">
					${proofContent}
				</div>
				<div class="card">
					<div class="card-header bg-primary text-white">
						<p class="h5">Token: ${data.transaction_token}</p>
					</div>
					<div class="card-body">
						<h5 class="card-title text-center">Pemesan: ${data.full_name}</h5>
						<div class="d-flex justify-content-around align-items-end container">
							<div>
								<p class="card-text h6">Total harga: Rp. ${global.rupiahFormat(data.total_price)}</p>
								<p class="card-text h6">Status: <span class="badge badge-${badge}">${status}</span></p>
							</div>
							<div>
								<p class="card-text h6">Tgl pesan: ${dateOrder}</p>
								<p class="card-text h6">Tgl update: ${updatedDateOrder}</p>
							</div>
							<div>
								<p class="card-text h6">Kurir: ${data.delivery.name_expedition}</p>
								<p class="card-text h6">Service: ${data.delivery.service}</p>
							</div>
						</div>
						<h6 class="card-title text-center mt-5">
							Alamat kirim: ${data.address.address}, ${data.address.city}, ${data.address.subdistrict}, ${data.address.province}
						</h6>
						<h6 class="card-title text-center">
							Kode pos: ${data.address.postcode}
						</h6>
					</div>
					<div class="card-footer text-white">
						<div class="form-group">
							<label for="status" class="text-primary">Ubah status</label>
							<select class="form-control" id="status" onchange="onStatus()">
								<option value="0">Belum terverifikasi</option>
								<option value="1">Terverifikasi</option>
								<option value="2">Diproses</option>
								<option value="3">Dikirim</option>
								<option value="4">Diterima</option>
								<option value="5">Pesanan dibatalkan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="resi_number" class="text-primary">No Resi</label>
							<input type="text" class="form-control" name="resi_number" id="resi_number" value="${data.delivery.resi_number ? data.delivery.resi_number : ''}">
						</div>
						<div class="d-grid">
							<button class="btn btn-primary mt-2" onclick="changeTransactionStatus()" id="btn-change-status">Simpan</button>
						</div>
					</div>
				</div>

				<div class="table-responsive mt-5">
					<table class="table table-bordered text-center" style="font-size: 14px">
						<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>Foto</th>
								<th>Produk</th>
								<th>Qty</th>
								<th>Sub total</th>
								<th>Tgl pesan</th>
								<th>Tgl perubahan</th>
							</tr>
						</thead>
						<tbody>
							${productContent}
						</tbody>
					</table>
				</div>
				<div class="d-grid">
					<a href="#" class="btn btn-outline-dark text-center" role="button" onclick="history.back()">Kembali</a>
				</div>
			</div>
		</div>
	`;
	$('#main').append(content);
	$('#status').val(data.status);
	$('#status').trigger('change');
}

function onStatus() {
	const status = parseInt($('#status').val());

	if (status != 3) {
		$('#resi_number').attr('disabled', true);
	}else {
		$('#resi_number').attr('disabled', false);
	}
}

function changeTransactionStatus() {
	const formData = new FormData();
	formData.append('id', idTransaction);
	formData.append('resi', $('#resi_number').val());
	formData.append('status', $('#status').val());

	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/transaction/changeTransactionStatus`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-change-status', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				tata.success('Sukses', 'Berhasil mengubah data');
				getDetailTransaction();
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-change-status', 'primary', false, 'Simpan');
		},
	});
}
