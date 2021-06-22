let page = 0;
let numbering = page * 10 + 1;
let searchKeyword = $('#input-search-transaction').val();
let filterKey = $('#filter-transaction').val();
let orderDirection = 'ASC';
let isASC = true;

function getTransactions(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirection = 'DESC'
) {
	let query = '';
	query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/transaction/getTransactions?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderTransactionData(response.data);
			} else {
				toastr.error('Terjadi kesalahan pada server');
			}
		},
	});
}

function renderTransactionData(transactions) {
	let content = '';
	$('#transaction-data-content').html('');
	$('#prev-transaction-button').attr('disabled', page === 0);

	if (transactions.length > 0) {
		transactions.forEach((transaction) => {
			let status = '';
			let badge = '';
			const date = moment(transaction.updated_at).format('DD-MMM-YYYY HH:mm');
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
					<td>${numbering++}</td>
					<td>${transaction.full_name}</td>
					<td>${global.rupiahFormat(transaction.total_price)}</td>
					<td>
						<span class="badge badge-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${date}</td>
					<td>
						<a href="${global.base_url}admin/transaction/detailTrasaction/${
				transaction.id
			}" class='btn btn-lg btn-info text-white'>	
							<i class='icon-eye'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-transaction-button').attr('disabled', false);
	} else {
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
	page = 0;
	updateNumbering(page);
	searchKeyword = $('#input-search-transaction').val();
	getTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#prev-transaction-button').on('click', function () {
	if (page > 0) page--;
	updateNumbering(page);
	getTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#next-transaction-button').on('click', function () {
	page++;
	updateNumbering(page);
	getTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#filter-transaction').on('change', function () {
	filterKey = this.value;
	updateNumbering(page);
	getTransactions(searchKeyword, page, filterKey, orderDirection);
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
	getTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#btn-transaction-download').on('click', function() {
	location.assign(`
		${global.base_url}admin/transaction/downloadTransaction?status=${$('#status_transaction').val()}&start_date=${$('#start_date').val()}&end_date=${$('#end_date').val()}
	`);
});

function updateNumbering(pagination) {
	numbering = pagination * 10 + 1;
}
