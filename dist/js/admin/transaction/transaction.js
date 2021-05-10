let paginate = 0;
let numbering = 0;
let isNoData = false;

function getTransactions(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirection = 'DESC'
) {
	let query = '';
	if (search) {
		query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	} else {
		query += `page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	}

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/transaction/getTransactions?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderTransactionData(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});
}

function renderTransactionData(transactions) {
	let content = '';
	$('#transaction-data-content').html('');
	$('#prev-transaction-button').attr('disabled', paginate === 0);

	if (transactions.length > 0) {
		isNoData = false;
		transactions.forEach((transaction) => {
			let status = '';
			let badge = '';
			switch (transaction.status) {
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
				case '4':
					status = 'Diterima';
					badge = 'success';
					break;
				case '5':
					status = 'Pesanan dibatalkan';
					badge = 'danger';
					break;
			}
			content += /*html*/ `
				<tr>
					<td>${++numbering}</td>
					<td>${transaction.full_name}</td>
					<td>${transaction.total_price}</td>
					<td>
						<span class="badge badge-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${transaction.created_at}</td>
					<td>
						<a href="${global.base_url}admin/transaction/detailTrasaction/${transaction.id}" class='btn btn-lg btn-info text-white'>	
							<i class='icon-eye'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-transaction-button').attr('disabled', false);
	} else {
		isNoData = true;
		numbering -= numbering % 10;
		content += /*html*/ `
			<tr>
				<td colspan='7' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-transaction-button').attr('disabled', true);
	}

	$('#transaction-data-content').append(content);
}

$('#button-transaction-search').on('click', function () {
	getTransactions($('#input-search-transaction').val());
});

$('#prev-transaction-button').on('click', function () {
	if (paginate > 0) {
		paginate--;
	}

	decNumbering();

	if ($('#input-search-transaction').val()) {
		getTransactions($('#input-search-transaction').val(), paginate);
		return;
	}
	getTransactions('', paginate);
});

$('#next-transaction-button').on('click', function () {
	paginate++;

	if ($('#input-search-transaction').val()) {
		getTransactions($('#input-search-transaction').val(), paginate);
		return;
	}

	getTransactions('', paginate);
});

function decNumbering() {
	const row = $('#transaction-data-content td').closest('tr').length;

	if (numbering % 10 === 0) {
		if (!isNoData) {
			numbering = numbering - row * 2;
		}
	} else {
		numbering = numbering - row - 10;
	}
}
