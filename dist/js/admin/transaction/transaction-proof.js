let paginateProof = 0;
let numberingProof = 0;
let isNoDataProof = false;

function getTransactionsProof(
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
		url: `${global.base_url}admin/transaction/getTransactionWithProof?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderTransactionWithProofData(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});
}

function renderTransactionWithProofData(transactions) {
	let content = '';
	$('#transaction-with-proof-data-content').html('');
	$('#prev-button').attr('disabled', paginateProof === 0);

	if (transactions.length > 0) {
		isNoDataProof = false;
		transactions.forEach((transaction) => {
			let status = '';
			let badge = '';
			switch (transaction.status) {
				case '0':
					status = 'Belum upload bukti';
					badge = 'secondary';
					break;
				case '1':
					status = 'Menunggu persetujuan admin';
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
					<td>${++numberingProof}</td>
					<td>
						<a href='${transaction.proof}' data-fancybox data-caption='Bukti pembayaran - ${transaction.full_name}'>
							<div style="width: 64px; height: 64px; background-size: cover; background-image: url('${
								transaction.proof
							}'); background-position: center;" class='mx-auto'></div>
						</a>
					</td>
					<td>${transaction.full_name}</td>
					<td>${transaction.total_price}</td>
					<td>
						<span class="badge badge-${badge}">${status}</span>
					</td>
					<td>${transaction.transaction_token}</td>
					<td>${transaction.created_at}</td>
					<td>
						<a href="#transaction-proof-modal" data-toggle="modal" class='btn btn-lg btn-info text-white' onclick="changeStatus(${
							transaction.id
						})">	
							<i class='icon-eye'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$('#next-button').attr('disabled', false);
	} else {
		isNoDataProof = true;
		numberingProof -= numberingProof % 10;
		content += /*html*/ `
			<tr>
				<td colspan='8' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-button').attr('disabled', true);
	}

	$('#transaction-with-proof-data-content').append(content);
}

$('#button-transaction-with-proof-search').on('click', function () {
	getTransactionsProof($('#input-search-transaction-with-proof').val());
});

$('#prev-transaction-with-proof-button').on('click', function () {
	if (paginateProof > 0) {
		paginateProof--;
	}

	decNumberingProof();

	if ($('#input-search-transaction-with-proof').val()) {
		getTransactionsProof($('#input-search-transaction-with-proof').val(), paginateProof);
		return;
	}
	getTransactionsProof('', paginateProof);
});

$('#next-transaction-with-proof-button').on('click', function () {
	paginateProof++;

	if ($('#input-search-transaction-with-proof').val()) {
		getTransactionsProof($('#input-search-transaction-with-proof').val(), paginateProof);
		return;
	}

	getTransactionsProof('', paginateProof);
});

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
				getTransactionsProof();
				toastr.success(response.message);
			} else {
				toastr.error(response.message);
			}
		},
		complete: function () {
			global.loading('btn-change-proof-status', 'primary', false, 'Ubah');
		},
	});
});

function decNumberingProof() {
	const row = $('#transaction-with-proof-data-content td').closest('tr').length;

	if (numberingProof % 10 === 0) {
		if (!isNoDataProof) {
			numberingProof = numberingProof - row * 2;
		}
	} else {
		numberingProof = numberingProof - row - 10;
	}
}

function changeStatus(transactionId) {
	$('#transaction-proof-id').val(transactionId);
}
