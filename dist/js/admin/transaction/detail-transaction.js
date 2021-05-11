let idTransaction = window.location.href.split('/');
idTransaction = idTransaction[idTransaction.length - 1];

function getDetailTransaction() {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/transaction/getDetailTransaction?id=${idTransaction}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderDetailData(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});
}

function renderDetailData(data) {
	let status = '';
	let badge = '';
	switch (data.status) {
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
					<img class="img-fluid rounded" src="${product.uri}" alt="${product.product_name}" style="height: 100px; width: 100px;">
				</td>
				<td>${product.product_name}</td>
				<td>${product.qty}</td>
				<td>Rp. ${product.sub_total_price}</td>
				<td>${product.created_at}</td>
				<td>${product.updated_at}</td>
			</tr>
		`;
	});

	let proofContent = '';
	if (data.proof === null) {
		productContent += `
			<h4 class="text-center mb-5">Belum mengupload bukti pembayaran</h4>
		`
	}else {
		proofContent += `
			<a href='${data.proof}' data-fancybox data-caption='Bukti pembayaran - ${data.full_name}'>
				<img src="${data.proof}" class="img-fluid d-block mx-auto" width="50%">
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
						<div class="d-flex justify-content-between align-items-end container">
							<div>
								<p class="card-text h6">Total harga: Rp. ${data.total_price}</p>
								<p class="card-text h6">Status: <span class="badge badge-${badge}">${status}</span></p>
							</div>
							<div>
								<p class="card-text h6">Tgl pesan: ${data.created_at}</p>
								<p class="card-text h6">Tgl update: ${data.updated_at}</p>
							</div>
						</div>
					</div>
					<div class="card-footer text-white">
						<div class="form-group">
							<label for="status" class="text-primary">Ubah status</label>
							<select class="form-control" id="status" onchange="changeStatus(this)">
								<option value="1">Terverifikasi</option>
								<option value="2">Diproses</option>
								<option value="3">Dikirim</option>
								<option value="4">Diterima</option>
								<option value="5">Pesanan dibatalkan</option>
							</select>
						</div>
					</div>
				</div>

				<div class="table-responsive mt-5">
					<table class="table table-bordered text-center">
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

				<a href="#" class="btn-lg btn-block btn-outline-dark text-center" role="button" onclick="history.back()">Back</a>
			</div>
		</div>
	`;
	$('#main').append(content);
	$('#status').val(data.status);
}

function changeStatus(form) {
	const formData = new FormData();
	formData.append('id', idTransaction);
	formData.append('status', form.value);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/transaction/changeTransactionStatus`,
		data: formData,
		processData: false,
		contentType: false,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
				setTimeout(function () { 
					window.location.reload();
				}, 2000);
			} else {
				toastr.error(response.message);
			}
		},
	});
}
