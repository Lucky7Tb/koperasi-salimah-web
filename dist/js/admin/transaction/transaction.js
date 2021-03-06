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
				tata.error('Error', 'Terjadi kesalahan pada server');
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
						<span class="badge bg-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${date}</td>
					<td>
						<a href="${global.base_url}admin/transaction/detailTrasaction/${
				transaction.id
			}" class='btn btn-info text-white'>	
							<i class='fas fa-eye'></i>
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
		$('#order-direction-button').html(
			'<i class="fas fa-sort-alpha-up"></i>'
		);
	} else {
		$('#order-direction-button').html(
			'<i class="fas fa-sort-alpha-down"></i>'
		);
	}

	updateNumbering(page);
	getTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#btn-transaction-download').on('click', function() {
	location.assign(`
		${global.base_url}admin/transaction/downloadTransaction?status=${$('#status_transaction').val()}&start_date=${$('#start_date').val()}&end_date=${$('#end_date').val()}
	`);
});

$('#btn-update-old-transaction').on('click', function () {
	$.ajax({
		url: `${global.base_url}admin/transaction/checkOldTransaction`,
		type: 'GET',
		beforeSend: function() {
			global.loading('btn-update-old-transaction', 'info', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				tata.success('Sukses', 'Berhasil update transaksi lama');
				getTransactions();
				getTransactionsProof();
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-update-old-transaction', 'info', false, '<i class="fas fa-marker"></i> Update transaksi lama');
		}
	})
})

function updateNumbering(pagination) {
	numbering = pagination * 10 + 1;
}
