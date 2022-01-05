let page = 0;
let numbering = page * 10 + 1;
let searchKeyword = $('#input-search-transaction').val();
let filterKey = $('#filter-transaction').val();
let orderDirection = 'ASC';
let isASC = true;

$(document).ready(function () {	
	getActiveTransactions();
	getHistoryTransactions();
	$('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
	$('.tab ul.tabs li a').on('click', function (g) {
		var tab = $(this).closest('.tab'),
			index = $(this).closest('li').index();
		tab.find('ul.tabs > li').removeClass('current');
		$(this).closest('li').addClass('current');
		tab
			.find('.tab_content')
			.find('div.tabs_item')
			.not('div.tabs_item:eq(' + index + ')')
			.slideUp();
		tab
			.find('.tab_content')
			.find('div.tabs_item:eq(' + index + ')')
			.slideDown();
		g.preventDefault();
	});
});

function getActiveTransactions(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirection = 'ASC'
) {
	let query = '';
	query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;

	$.ajax({
		type: 'GET',
		url: `${global.base_url}transaction/getActiveTransaction?${query}`,
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
			}
			content += /*html*/ `
				<tr>
					<td>${numbering++}</td>
					<td>Rp. ${global.rupiahFormat(transaction.total_price)}</td>
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
		$('#next-transaction-button').attr('disabled', false);
	} else {
		content += `
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
	getActiveTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#prev-transaction-button').on('click', function () {
	if (page > 0) page--;
	updateNumbering(page);
	getActiveTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#next-transaction-button').on('click', function () {
	page++;
	updateNumbering(page);
	getActiveTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#filter-transaction').on('change', function () {
	filterKey = this.value;
	updateNumbering(page);
	getActiveTransactions(searchKeyword, page, filterKey, orderDirection);
});

$('#order-direction-button').on('click', function () {
	isASC = !isASC;
	orderDirection = isASC ? 'ASC' : 'DESC';

	if (isASC) {
		$('#order-direction-button').html("<i class='bx bx-sort-a-z'></i>");
	} else {
		$('#order-direction-button').html("<i class='bx bx-sort-z-a'></i>");
	}

	updateNumbering(page);
	getActiveTransactions(searchKeyword, page, filterKey, orderDirection);
});

function updateNumbering(pagination) {
	numbering = pagination * 10 + 1;
}
