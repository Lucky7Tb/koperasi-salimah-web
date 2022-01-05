let page = 0;
let numbering = page * 10 + 1;
let searchKeyword = $('#input-search-payment').val();
let filterKey = $('#filter-payment').val();
let orderDirection = 'ASC';
let isASC = true;

$(document).ready(function () {
	getPayments();
});

function getPayments(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirection = 'ASC'
) {
	let query = '';
	query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/payment/getPayments?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderPaymentData(response.data);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
	});
}

function renderPaymentData(payments) {
	let content = '';
	$('#payment-data-content').html('');
	$('#prev-button').attr('disabled', page === 0);

	if (payments.length > 0) {
		payments.forEach((payment) => {
			const date = moment(payment.updated_at).format('DD-MMM-YYYY HH:mm');

			content +=`
				<tr>
					<td>${numbering++}</td>
					<td>
						<a href='${payment.uri}' data-fancybox data-caption='${payment.label}'>
							<div style="width: 64px; height: 64px; background-size: cover; background-image: url('${
								payment.uri
							}'); background-position: center;" class='mx-auto'></div>
						</a>
					</td>
					<td>${payment.bank_name}</td>
					<td>${payment.name_account_bank}</td>
					<td>${payment.number_account}</td>
					<td>
						<span class="badge badge-pill bg-${
							payment.is_visible == '1' ? 'primary' : 'secondary'
						}">
							${payment.is_visible == '1' ? 'Aktif' : 'Tidak aktif'}
						</span>
					</td>
					<td>${date}</td>
					<td>
						<a href='${global.base_url}admin/payment/edit/${
				payment.id
			}' class='btn btn-warning text-white'>	
							<i class='fas fa-pencil-alt'></i>
						</a>
					</td>
					<td>
						<a href="javascript:void(0)" onclick="confirmDeletePayment(${
							payment.id
						})" class="btn btn-danger text-white ${
				payment.is_visible === '0' ? 'disabled' : ''
			}" role="button">	
							<i class='fas fa-power-off'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-button').attr('disabled', false);
	} else {
		numbering -= numbering % 10;
		content += /*html*/ `
			<tr>
				<td colspan='9' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-button').attr('disabled', true);
	}

	$('#payment-data-content').append(content);
}

function confirmDeletePayment(paymentId) {
	$('#payment-delete-modal').modal('show');
	$('#payment_id').val(paymentId);
}

$('#btn-delete-payment').on('click', function () {
	const paymentId = $('#payment_id').val();
	$.ajax({
		type: 'DELETE',
		url: `${global.base_url}admin/payment/deletePayment?id=${paymentId}`,
		beforeSend: function () {
			global.loading('btn-delete-payment', 'danger', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$('#payment-delete-modal').modal('hide');
				getPayments();
				tata.success('Sukses', 'Berhasil menon-aktifkan metode pembayaran');
			} else {
				tata.error('Error', 'Terjadi kesalaha pada server');
			}
		},
		complete: function () {
			global.loading('btn-delete-payment', 'danger', false, 'Ya non-aktifkan');
		},
	});
});

$('#button-search').on('click', function () {
	page = 0;
	updateNumbering(page);
	searchKeyword = $('#input-search-payment').val();
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

$('#prev-button').on('click', function () {
	if (page > 0) page--;
	updateNumbering(page);
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

$('#next-button').on('click', function () {
	page++;
	updateNumbering(page)
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

$('#filter-payment').on('change', function () {
	filterKey = this.value;
	updateNumbering(page);
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

$('#order-direction-button').on('click', function () {
	isASC = !isASC;
	orderDirection = isASC ? 'ASC' : 'DESC';
	
	if (isASC) {
		$('#order-direction-button').html('<i class="fas fa-sort-alpha-up"></i>');
	} else {
		$('#order-direction-button').html('<i class="fas fa-sort-alpha-down"></i>');
	}

	updateNumbering(page);
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

function updateNumbering(pagination) {
	numbering = pagination * 10 + 1;
}
