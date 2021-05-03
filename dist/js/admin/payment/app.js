let paginate = 0;
let paymentId = null;

function getPayments(search = '', page = 0, orderBy = 'id', orderDirection = 'DESC') {
	let query = '';
	if (search) {
		query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	}else {
		query += `page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	}

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/payment/getPayments?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderPaymentData(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});	
}

function renderPaymentData(payments) {
	let content = '';
	$('#payment-data-content').html('');
	$('#prev-button').attr('disabled', paginate === 0);

	if (payments.length > 0) {
		payments.forEach((payment) => {
			content += /*html*/ `
				<tr>
					<td>
						<a href='${payment.uri}' data-fancybox data-caption='${payment.label}'>
							<div style="width: 64px; height: 64px; background-size: cover; background-image: url('${payment.uri}'); background-position: center;" class='mx-auto'></div>
						</a>
					</td>
					<td>${payment.bank_name}</td>
					<td>${payment.name_account_bank}</td>
					<td>${payment.number_account}</td>
					<td>
						<span class="badge badge-pill badge-${payment.is_visible == '1' ? 'primary' : 'secondary'}">
							${payment.is_visible == '1' ? 'Aktif' : 'Tidak aktif'}
						</span>
					</td>
					<td>${payment.updated_at}</td>
					<td>
						<a href='${global.base_url}admin/payment/edit/${payment.id}' class='btn btn-warning text-white'>	
							<i class='icon-pencil'></i>
						</a>
					</td>
					<td>
						<a href='#' onclick="confirmDeletePayment(${payment.id})" class='btn btn-danger text-white'>	
							<i class='icon-trash'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-button').attr('disabled', false);
	} else {
		content += /*html*/ `
			<tr>
				<td colspan='8' class='text-center'>Tidak ada data</td>
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
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				getPayments();
				toastr.success(response.message);
			} else {
				toastr.error(response.message);
			}
		},
	});	
});

$('#button-search').on('click', function () {
	getPayments($('#input-search-payment').val());
});

$('#prev-button').on('click', function () {
	if (paginate > 0) {
		paginate -= 1;
	}

	if ($('#input-search-payment').val()) {
		getPayments($('#input-search-payment').val(), paginate);
		return;
	}
	
	getPayments('', paginate);
});

$('#next-button').on('click', function () {
	paginate += 1;

	if ($('#input-search-payment').val()) {
		getPayments($('#input-search-payment').val(), paginate);
		return;
	}

	getPayments('', paginate);
});
