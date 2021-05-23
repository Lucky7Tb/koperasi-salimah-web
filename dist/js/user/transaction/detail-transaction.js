let photo;
isUpdateProof = false;
let id = '';

function initOptionPlugin() {
	photo = $("#photo").dropify({
		messages: {
			default: "Seret dan lepas foto disini atau klik",
			replace: "Seret dan lepas atau klik untuk mengganti foto",
			remove: "Hapus",
			error: "Opps, terjadi kesalahan",
		},
		error: {
			fileSize: "Ukuran file foto terlalu besar ({{ value }} max).",
			imageFormat: "Format foto yang di perbolehkan hanya ({{ value }}).",
		},
	});
	photo = photo.data('dropify');
}

$('#transaction-proof-form').on('submit', function(e) {
	e.preventDefault();

	const formData = new FormData(this);
	const date = new Date();
	const dateTransaction = date.getFullYear() + '-' + "0" + date.getMonth() + '-' + date.getDate();

	formData.append('id_transaction', id);
	formData.append('date_transaction', dateTransaction);

	const url = isUpdateProof ? `${global.base_url}transaction/updateTransactionProof` : `${global.base_url}transaction/uploadTransactionProof`;

	jQuery.ajax({
	  url: url,
	  type: 'POST',
	  data: formData,
	  processData: false,
		contentType: false,
	  beforeSend: function() {
	  	global.loading('btn-upload-proof', 'primary', true, null);
	  },
	  success: function(response) {
	    response = JSON.parse(response);
	    if(response.code === 200) {
	    	toastr.success(response.message);
	    	setTimeout(function() {
	    		history.back();
	    	}, 1000);
	    }else {
	    	toastr.error(response.message);
	    }
	  },
	  complete: function(response) {
	  	global.loading('btn-upload-proof', 'primary', false, 'Upload');
	  },
	});
});

function getDetailTransaction(idTransaction) {
	id = idTransaction;
	jQuery.ajax({
	  url: `${global.base_url}transaction/getDetailTransaction?id=${idTransaction}`,
	  type: 'POST',
	  success: function(response) {
	    response = JSON.parse(response);
	    if(response.code === 200) {
	    	renderTransactionDetailData(response.data);
	    }else {
	    	toastr.error(response.message);
	    }
	  },
	});
}

function renderTransactionDetailData(data) {
	let status = '';
	let badge = '';
	$('#transaction-token').text(`Token: ${data.transaction_token}`);
	switch(data.status) {
		case '0':
			status = 'Belum di bayar';
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
	}
	$('#transaction-status').html(`
		Status: <span class="badge badge-pill badge-${badge}">${status}</span>
	`);
	let content = "";
	data.products.forEach(product => {
		content += `
			<tr>
				<td>
					<a href='${product.uri}' data-fancybox data-caption='${product.product_name}'>
					<img src="${product.uri}" alt="${product.uri}" class="img-fluid" width="50" height="50">
					</a>
				</td>
				<td class="align-middle">${product.product_name}</td>
				<td class="w-25 align-middle">${product.qty}</td>
				<td class="align-middle">Rp. ${global.rupiahFormat(product.price)}</td>
				<td class="align-middle">Rp. ${global.rupiahFormat(product.sub_total_price)}</td>
			</tr>
		`;
	});
	$('#transaction-product').prepend(content);
	$('#transaction-cost-delivery').text(`Rp. ${global.rupiahFormat(data.delivery.cost_delivery)}`);
	const totalPrice = parseInt(data.total_price) + parseInt(data.delivery.cost_delivery);
	$('#transaction-total-price').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);


	if (data.proof !== '0') {
		isUpdateProof = !isUpdateProof;
		photo.settings.defaultFile = data.proof[0].uri;
		photo.destroy();
		photo.init();

		if (parseInt(data.status) >= 1) {
			$('#transaction-message').text(`Pesan: Bukti telah dikonfirmasi`);
			$('#photo').attr('data-show-remove', false);
			$('#photo').attr('disabled', true);
			photo.destroy();
			photo.init();
		}else {
			if (data.proof[0].message !== null) {
				$('#transaction-message').text(`Pesan: ${data.proof[0].message}`);
			}else {
				$('#transaction-message').text(`Pesan: Menunggu konfirmasi admin`);
			}
		}
	}else {
		$('#transaction-message').text(`Pesan: Harap upload bukti pembayaran`);
	}

	if (parseInt(data.status) >= 1) {
		$('#btn-upload-proof').addClass('disabled');
		$('#btn-upload-proof').attr('type', 'button');
	}

	$('#transaction-courier').html(`
			<b>${data.delivery.name_expedition}</b>
			<p>Service: <strong>${data.delivery.service}</strong></p>
			<p>Resi: <strong>${data.delivery.resi_number ?? '-'}</strong></p>
	`);
}
