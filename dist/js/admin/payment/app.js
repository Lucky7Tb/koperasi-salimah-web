let paginate = 0;
let numbering = 0;
let isNoData = false;

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
		isNoData = false;
		payments.forEach((payment) => {
			let disabledButton = payment.is_visible === '0' ? 'disabled' : null;

			content += /*html*/ `
				<tr>
					<td>${++numbering}</td>
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
						<button onclick="confirmDeletePayment(${payment.id})" class='btn btn-danger text-white' ${disabledButton}>	
							<i class='icon-power'></i>
						</button>
					</td>
				</tr>
			`;
		});
		$('#next-button').attr('disabled', false);
	} else {
		isNoData = true;
		numbering -= numbering % 10;
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
				$('#payment-delete-modal').modal('hide');
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

	decNumbering();

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

function decNumbering() {
	const row = $('#user-data-content td').closest('tr').length;

	if (numbering % 10 === 0) {
		if (!isNoData) {
			numbering = numbering - row * 2;
		}
	} else {
		numbering = numbering - row - 10;
	}
}
