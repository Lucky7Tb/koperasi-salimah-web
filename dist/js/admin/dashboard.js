function getDashboardData() {
	$.ajax({
		url: `${global.base_url}admin/dashboard/getDashboardData`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				$('#transaction_proof_pending').text(response.data.transaction_proof_pending);
				$('#process_transaction').text(response.data.process_transaction);
				$('#sent_transaction').text(response.data.sent_transaction);
				$('#verified_transaction').text(response.data.verified_transaction);
				$('#success_transaction').text(response.data.success_transaction);

				$('#total_product').text(response.data.total_product);
				$('#total_active_product').text(response.data.total_active_product);

				const latest_product = response.data.last_product

				$('#latest_product').append(`
					<div class="card mb-3">
						<div class="card-content">
							<div class="card-image business-card">
								<div class="background-image-maker" style="background-image: url(${latest_product.uri});"></div>
								<div class="holder-image">
									<img src="${latest_product.uri}" alt="${latest_product.product_name}" class="img-fluid">
								</div>
							</div>
							<div class="card-body text-center">
								<h4 class="card-title mb-3 mt-2">${latest_product.product_name}</h4>
								<p class="card-text text-truncate">${latest_product.description}</p>
							</div>
						</div>
					</div>
				`);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		}
	});
}
