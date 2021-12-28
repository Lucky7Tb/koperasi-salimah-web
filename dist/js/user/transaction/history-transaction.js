let pageHistory = 0;
let numberingHistory = pageHistory * 10 + 1;
let searchKeywordHistory = $('#input-search-history-transaction').val();
let filterKeyHistory = $('#filter-history-transaction').val();
let orderDirectionHistory = 'ASC';
let isASCHistory = true;

function getHistoryTransactions(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirectionHistory = 'ASC'
) {
	let query = '';
	query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirectionHistory}`;

	$.ajax({
		type: 'GET',
		url: `${global.base_url}transaction/getHistoryTransaction?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderHistoryTransactionData(response.data);
			} else {
				toastr.error('Terjadi kesalahan pada server');
			}
		},
	});
}

function renderHistoryTransactionData(transactions) {
	let content = '';
	$('#history-transaction-data-content').html('');
	$('#prev-history-transaction-button').attr('disabled', pageHistory === 0);

	if (transactions.length > 0) {
		transactions.forEach((transaction) => {
			let status = '';
			let badge = '';
			switch (transaction.status) {
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
					<td>${numberingHistory++}</td>
					<td>Rp. ${transaction.total_price}</td>
					<td>
						<span class="badge badge-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${moment(transaction.created_at).format('DD-MMM-YYYY HH:mm')}</td>
					<td>${moment(transaction.updated_at).format('DD-MMM-YYYY HH:mm')}</td>
					<td>
						<a href="${global.base_url}transaction/detail/${
				transaction.id
			}" class='btn btn-bg-three text-white'>	
							<i class='bx bx-menu'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-history-transaction-button').attr('disabled', false);
	} else {
		content += /*html*/ `
			<tr>
				<td colspan='7' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-history-transaction-button').attr('disabled', true);
	}

	$('#history-transaction-data-content').append(content);
}

$('#button-history-transaction-search').on('click', function () {
	pageHistory = 0;
	updateHistoryNumbering(pageHistory);
	searchKeywordHistory = $('#input-search-history-transaction').val();
	getHistoryTransactions(searchKeywordHistory, pageHistory, filterKeyHistory, orderDirectionHistory);
});

$('#prev-history-transaction-button').on('click', function () {
	if (pageHistory > 0) pageHistory--;
	updateHistoryNumbering(pageHistory);
	getHistoryTransactions(searchKeywordHistory, pageHistory, filterKeyHistory, orderDirectionHistory);
});

$('#next-history-transaction-button').on('click', function () {
	pageHistory++;
	updateHistoryNumbering(pageHistory);
	getHistoryTransactions(searchKeywordHistory, pageHistory, filterKeyHistory, orderDirectionHistory);
});

$('#filter-history-transaction').on('change', function () {
	filterKeyHistory = this.value;
	updateHistoryNumbering(pageHistory);
	getHistoryTransactions(searchKeywordHistory, pageHistory, filterKeyHistory, orderDirectionHistory);
});

$('#history-order-direction-button').on('click', function () {
	isASCHistory = !isASCHistory;
	orderDirectionHistory = isASCHistory ? 'ASC' : 'DESC';

	if (isASCHistory) {
		$('#history-order-direction-button').html('<i class="bx bx-filter">a-z</i>');
	} else {
		$('#history-order-direction-button').html('<i class="bx bx-filter">z-a</i>');
	}

	updateHistoryNumbering(pageHistory);
	getHistoryTransactions(searchKeywordHistory, pageHistory, filterKeyHistory, orderDirectionHistory);
});

function updateHistoryNumbering(pagination) {
	numberingHistory = pagination * 10 + 1;
}
