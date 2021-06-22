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

function initWhatsappButton(sellerPhoneNumber, transactionToken) {
	$("#whatsapp-chat-button").removeClass('d-none');

	sellerPhoneNumber = sellerPhoneNumber.split('');
	sellerPhoneNumber[0] = '62';
	sellerPhoneNumber = sellerPhoneNumber.join('');

	$("#whatsapp-chat-button").floatingWhatsApp({
    phone: sellerPhoneNumber,
    popupMessage: "Hallo ada yang bisa saya bantu?",
    message: `Halo, kak. Saya sudah mengupload foto bukti transfer dengan token transaksi: *${transactionToken}*. Tolong di cek ya🙏`,
    showPopup: true,
    showOnIE: false,
    headerTitle: "Hai, selamat datang",
    headerColor: "lightgreen",
    backgroundColor: "lightgreen",
    buttonImage: `<img src='${global.base_url}dist/images/wa.png' />`
	});
}

$('#transaction-proof-form').on('submit', function(e) {
	e.preventDefault();

	const formData = new FormData(this);
	const date = new Date();
	const dateTransaction = date.getFullYear() + '-' + "0" + date.getMonth() + '-' + date.getDate();

	formData.append('id_transaction', id);
	formData.append('date_transaction', dateTransaction);

	const url = isUpdateProof ? `${global.base_url}transaction/updateTransactionProof` : `${global.base_url}transaction/uploadTransactionProof`;

	$.ajax({
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
	    	toastr.success('Berhasil upload bukti transaksi');
	    	setTimeout(function() {
	    		history.back();
	    	}, 1000);
	    }else {
	    	toastr.error('Terjadi kesalahan pada server');
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

function trackResi(resiNumber, courierCode) {
	const formData = new FormData;
	formData.append('waybill', resiNumber);
	formData.append('courier', courierCode);

	$.ajax({
		url: `${global.base_url}transaction/trackResi`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(response) {
			let { rajaongkir } = JSON.parse(response);
			if (rajaongkir.status.code === 200) {
				renderResiDetail(rajaongkir.result.manifest);
			}else {
				toastr.error(rajaongkir.status.description);
			}
		}
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
			$('#confirm-button-container').removeClass("d-none");
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

		initWhatsappButton(data.seller[0].phone_number, data.transaction_token);

		$('#qris-container').addClass('d-none');

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

	$('address').text(`${data.address.address}, ${data.address.city}, ${data.address.subdistrict}, ${data.address.province}`);

	$('#bank_name').text(`Bank: ${data.payment.bank_name}`);
	$('#bank_code').text(`Kode bank: ${data.payment.bank_code}`);
	$('#no_account').text(`Rekening : ${data.payment.number_account}`);

	if (data.delivery.resi_number) trackResi(data.delivery.resi_number, data.delivery.courier_code);
}

function renderResiDetail(data) {
	$.each(data, function(_, manifest) {
		$('#resi-detail').append(`
			<tr>
				<td>${manifest.manifest_description}</td>
				<td>${manifest.city_name}</td>
				<td>${moment(manifest.manifest_date).format('DD-MMM-YYYY')}</td>
				<td>${manifest.manifest_time}</td>
			</tr>
		`);
	});
}

function confirmTransaction(transactionId) {
	$.ajax({
		url: `${global.base_url}transaction/confirmTransaction?transactionId=${transactionId}`,
		type: 'POST',
		beforeSend: function() {
			global.loading('btn-confirm-delivery', 'primary', true, null);
		},
		success: function(response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$('#confirm-modal').modal('hide');
				$('#confirm-button-container').addClass("d-none");
				toastr.success('Sukses dikonfirmasi');
				setTimeout(function() {
					window.location.href = global.base_url + 'transaction';
				}, 2000);
			}else {
				toastr.error('Terjadi kesalahan pada server');
			}
		},
		complete: function() {
			global.loading('btn-confirm-delivery', 'primary', true, 'Ya Sampai');
		}
	})	
}