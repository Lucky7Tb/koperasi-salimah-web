let page = 0;
let numbering = page * 10 + 1;
let searchKeyword = $('#input-search-payment').val();
let filterKey = $('#filter-payment').val();
let orderDirection = 'ASC';
let isASC = true;

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
				toastr.error(response.message);
			}
		},
	});
}

function renderPaymentData(payments) {
	let content = '';
	$('#payment-data-content').html('');
	$('#prev-button').attr('disabled', page === 0);

	if (payments.length > 0) {
		isNoData = false;
		payments.forEach((payment) => {
			const date = moment(payment.updated_at).format('DD-MMM-YYYY HH:mm');

			content += /*html*/ `
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
						<span class="badge badge-pill badge-${
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
							<i class='icon-pencil'></i>
						</a>
					</td>
					<td>
						<a href="javascript:void(0)" onclick="confirmDeletePayment(${
							payment.id
						})" class="btn btn-danger text-white ${
				payment.is_visible === '0' ? 'disabled' : ''
			}" role="button">	
							<i class='icon-power'></i>
						</a>
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
		$('#order-direction-button').addClass('btn-primary');
		$('#order-direction-button').removeClass('btn-link');
		$('.fa-filter').text('a-z');
	} else {
		$('#order-direction-button').addClass('btn-link');
		$('#order-direction-button').removeClass('btn-primary');
		$('.fa-filter').text('z-a');
	}

	updateNumbering(page);
	getPayments(searchKeyword, page, filterKey, orderDirection);
});

function updateNumbering(pagination) {
	numbering = pagination * 10 + 1;
}
