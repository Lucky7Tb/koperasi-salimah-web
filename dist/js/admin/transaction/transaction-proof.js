let pageProof = 0;
let numberingProof = pageProof * 10 + 1;
let searchKeywordProof = $('#input-search-transaction-proof').val();
let filterKeyProof = $('#filter-transaction-proof').val();
let orderDirectionProof = 'ASC';
let isASCProof = true;

function getTransactionsProof(
	search = '',
	page = 0,
	orderBy = 'id',
	orderDirection = 'DESC'
) {
	let query = '';
	query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/transaction/getTransactionWithProof?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderTransactionWithProofData(response.data);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
	});
}

function renderTransactionWithProofData(transactions) {
	let content = '';
	$('#transaction-proof-data-content').html('');
	$('#prev-transaction-proof-button').attr('disabled', pageProof === 0);

	if (transactions.length > 0) {
		transactions.forEach((transaction) => {
			const date = moment(transaction.updated_at).format('DD-MMM-YYYY HH:mm');
			let status = '';
			let badge = '';
			switch (transaction.status_proof) {
				case '0':
					status = 'Belum upload bukti';
					badge = 'secondary';
					break;
				case '1':
					status = 'Menunggu persetujuan';
					badge = 'warning';
					break;
				case '2':
					status = 'Disetujui';
					badge = 'success';
					break;
				case '3':
					status = 'Ditolak';
					badge = 'danger';
					break;
			}
			content += /*html*/ `
				<tr>
					<td>${numberingProof++}</td>
					<td>
						<a href='${transaction.proof}' data-fancybox data-caption='Bukti pembayaran - ${
				transaction.full_name
			}'>
							<div style="width: 64px; height: 64px; background-size: cover; background-image: url('${
								transaction.proof
							}'); background-position: center;" class='mx-auto'></div>
						</a>
					</td>
					<td>${transaction.full_name}</td>
					<td>Rp. ${global.rupiahFormat(transaction.total_price)}</td>
					<td>
						<span class="badge bg-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${date}</td>
					<td>
						<button data-bs-toggle="modal" data-bs-target="#transaction-proof-modal" class='btn btn-info text-white' onclick="changeStatus(${
							transaction.id
						})">	
							<i class='fas fa-eye'></i>
						</button>
					</td>
				</tr>
			`;
		});
		$('#next-transaction-proof-button').attr('disabled', false);
	} else {
		content += /*html*/ `
			<tr>
				<td colspan='8' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-transaction-proof-button').attr('disabled', true);
	}

	$('#transaction-proof-data-content').append(content);
}

$('#transaction-proof-form').on('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/transaction/changeTransactionProofStatus`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-change-proof-status', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$('#transaction-proof-modal').modal('hide');
				$('#transaction-proof-form').trigger('reset');
				updateHistoryNumbering(pageProof);
				updateNumbering(page);
				getTransactionsProof();
				getTransactions();
				tata.success('Sukses', 'Berhasil mengubah status pembayaran');
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-change-proof-status', 'primary', false, 'Ubah');
		},
	});
});

$('#button-transaction-proof-search').on('click', function () {
	pageProof = 0;
	updateHistoryNumbering(pageProof);
	searchKeywordProof = $('#input-search-transaction-proof').val();
	getTransactionsProof(
		searchKeywordProof,
		pageProof,
		filterKeyProof,
		orderDirectionProof
	);
});

$('#prev-transaction-proof-button').on('click', function () {
	if (pageProof > 0) pageProof--;
	updateHistoryNumbering(pageProof);
	getTransactionsProof(
		searchKeywordProof,
		pageProof,
		filterKeyProof,
		orderDirectionProof
	);
});

$('#next-transaction-proof-button').on('click', function () {
	pageProof++;
	updateHistoryNumbering(pageProof);
	getTransactionsProof(
		searchKeywordProof,
		pageProof,
		filterKeyProof,
		orderDirectionProof
	);
});

$('#filter-transaction-proof').on('change', function () {
	filterKeyProof = this.value;
	updateHistoryNumbering(page);
	getTransactionsProof(
		searchKeywordProof,
		pageProof,
		filterKeyProof,
		orderDirectionProof
	);
});

$('#order-direction-proof-button').on('click', function () {
	isASCProof = !isASCProof;
	orderDirectionProof = isASCProof ? 'ASC' : 'DESC';

	if (isASCProof) {
		$('#order-direction-proof-button').html('<i class="fas fa-sort-alpha-up"></i>');
	} else {
		$('#order-direction-proof-button').html('<i class="fas fa-sort-alpha-down"></i>');
	}

	updateHistoryNumbering(page);
	getTransactionsProof(
		searchKeywordProof,
		pageProof,
		filterKeyProof,
		orderDirectionProof
	);
});

function updateHistoryNumbering(pagination) {
	numberingProof = pagination * 10 + 1;
}

function changeStatus(transactionId) {
	$('#transaction-proof-id').val(transactionId);
}
