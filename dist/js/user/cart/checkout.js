const checkout = {
	cart: [],
	listIdCart: [],
	listCartPerSeller: [],
	totalPrice: 0,
	productWeight: [],
	origin: [],
	destination: '',
	courier: '',
	courierService: [],
	wayFee: [],
	userAddressId: '',
	deliveryId: '',
	paymentId: ''
};

$(document).ready(function () {
	$('.sw-theme-default .toolbar > .btn').css('background-color', '#761fa8');
	$('.sw-theme-default .toolbar > .btn').css('border', '#761fa8');
});

function initPluginOption() {
	$('#smartwizard').smartWizard({
		lang: {
			next: 'Selanjutnya',
			previous: 'Sebelumnya',
		},
	});
	$('#shipping-row').slimScroll({
		height: '500px',
	});

}

function getData() {
	global.getCart(function(response) {
		$.each(response.data, function(_, cart) {
			checkout.cart.push(cart);
			checkout.listIdCart.push(cart.id);
		});
		renderCart(response.data);
		prepareOrder();
	});

	global.getCurrentAddress(function(response) {
		checkout.userAddressId = response.id;
		$('address').text(`${response.address}, ${response.city}, ${response.subdistrict}, ${response.province}`);
		checkout.destination = response.subdistrict_id;
	});

	getDeliveryService();
	getPaymentMethod();
}

function getDeliveryService() {
	$.ajax({
		url: `${global.base_url}cart/getDeliveryService`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$.each(response.data, function(_, courier) {
				 	$('#courier-select').append(`
						<option data-id="${courier.id}" value="${courier.courier_code}">${courier.name_expedition}</option>
					`);
				});

				checkout.deliveryId = response.data[0].id;
				checkout.courier = $('#courier-select option:first').val();
				$('#courier-select').trigger('select');
				$('#courier-select').niceSelect();
			}else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		}
	})
}

function getPaymentMethod() {
	$.ajax({
		url: `${global.base_url}cart/getPaymentMethod`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				$.each(response.data, function(_, bank) {
					 $('#payment-select').append(`
						<option value="${bank.id}">${bank.bank_name} - ${bank.bank_code}</option>
					`);
				});
				$('#payment-select').val($('#payment-select option:first').val());
				$('#payment-select').trigger('change');
			}else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		}
	});	
}

function getWayFee() {
	const formData = new FormData;

	let counter = 0;
	$.each(checkout.origin, function(index, origin) {
		formData.set('origin', origin);
		formData.set('originType', 'subdistrict');
		formData.set('destination', checkout.destination);
		formData.set('destinationType', 'subdistrict');
		formData.set('weight', checkout.productWeight[index]);
		formData.set('courier', checkout.courier);

		$.ajax({
			url: `${global.base_url}cart/getWayFee`,
			type: 'POST',
			processData: false,
			contentType: false,
			data: formData,
			success: function(response) {
				response = JSON.parse(response);
				const { rajaongkir } = response;
				if (rajaongkir.status.code === 200) {
					checkout.wayFee.push(rajaongkir.results[0].costs[0].cost[0].value);
					checkout.courierService.push(rajaongkir.results[0].costs[0].service);
					let content = `
						<div class='row mt-1'>
						<p>Seller-${counter + 1}</p>
					`;

					$.each(rajaongkir.results[0].costs, function(index, courier) {
						content += `
							<div class="col-3">
					 			<div class="form-check form-check-inline">
									<input type="radio" class="form-check-input" name="courier-service-${counter}}" id="courier-${index}-${counter}" value="${courier.cost[0].value}" ${index === 0 ? 'checked' : ''} onchange="changeCourierService(this)" data-service="${courier.service}"/>
									<label class="form-check-label" for="courier-${index}-${counter}">${courier.service}</label>
								</div>
				 			</div>
						`
					});
					content += '</div>';
					$('#courier-service-container').append(content);
				}else {
					tata.error('Error', 'Terjadi kesalahan pada server');
				}
			},
			complete: function() {
				counter++;
				renderTotalPrice();
			}
		});
	});
}

function prepareOrder() {
	const formData = new FormData;
	formData.append('id_cart', checkout.listIdCart);

	$.ajax({
		url: `${global.base_url}cart/prepareOrder`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$.each(response.data, function(_, seller) {
					let weight = 0
					$.each(seller.products, function(_, product) {
						weight += parseInt(product.weight);
					});

					const idCartFilter = checkout.cart.filter(function(cart) {
						return cart.product.id_m_users == seller.address.id_m_users
					})
					.map(function(cart) {
						return cart.id;
					});

					checkout.productWeight.push(weight);

					checkout.origin.push(seller.address.subdistrict_id);
						
					checkout.listCartPerSeller.push(idCartFilter);
				});

				getWayFee();
			}else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		}
	});	
}

function changeCourier(form) {
	checkout.wayFee.splice(0, checkout.wayFee.length);
	checkout.courierService.splice(0, checkout.courierService.length);
	checkout.courier = form.value;
	checkout.deliveryId = $('#courier-select option:selected').attr('data-id');
	$('#courier-service-container').html('');
	getWayFee();
}

function changePaymentMethod(form) {
	checkout.paymentId = form.value;
}

function changeCourierService(form) {
	$('input[type=radio]:checked').each(function(index, radio) {
		checkout.wayFee[index] = radio.value
		checkout.courierService[index] = radio.dataset.service;
	});

	renderTotalPrice();
}

function renderTotalPrice() {
	let totalWayFee = 0;
	$.each(checkout.wayFee, function(_, wayFee) {
		totalWayFee += parseInt(wayFee);
	});

	$('.cart-wayFee').text(`Rp. ${global.rupiahFormat(totalWayFee.toString())}`);
	
	const totalPrice = totalWayFee + checkout.totalPrice;

	$('#cart-total').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
	$('#cart-total-final').html(`<strong>Rp. ${global.rupiahFormat(totalPrice.toString())}</strong>`);
}

function renderCart(data) {
	let content = '';
	$('#cart-product-content').html('');

	if (data.length > 0) {
		$.each(data, function(_, cart) {
			const productPrice = parseInt(cart.product.price_after_discount);
			checkout.totalPrice += productPrice * cart.qty;
			content += `
				<tr>
					<td class="product-thumbnail">
						<img src="${cart.product.uri}" alt="${
				cart.product.product_name
			}" class="img-fluid" width="60">
					</td>
					<td class="product-name">${cart.product.product_name}</td>
					<td class="w-25 product-quantity">
						${cart.qty}
					</td>
					<td class="product-price">Rp. ${global.rupiahFormat(
						productPrice.toString()
					)}</td>
				</tr>
			`;
		});
		$('#cart-total-price').text(`Rp. ${global.rupiahFormat(checkout.totalPrice.toString())}`);
		$('.cart-subTotal').text(`Rp. ${global.rupiahFormat(checkout.totalPrice.toString())}`);
	}

	$('#cart-product-content').html(content);
}

function createOrder() {
	const formData = new FormData;

	global.loading('btn-createOrder', 'primary', true, null);
	for (let i = 0; i < checkout.listCartPerSeller.length; i++) {
		formData.set('id_u_detail_address', checkout.userAddressId);
		formData.set('id_m_delivery_services', checkout.deliveryId);
		formData.set('cost_delivery', checkout.wayFee[i]);
		formData.set('service', checkout.courierService[i]);
		formData.set('id_m_payment', checkout.paymentId);
		formData.set('id_cart', checkout.listCartPerSeller[i]);

		$.ajax({
			url: `${global.base_url}cart/createOrder`,
			type: 'POST',
			processData: false,
			contentType: false,
			data: formData,
			success: function(response) {
				response = JSON.parse(response);
				if (response.code === 200) {
					tata.success('Sukses', 'Sukses membuat transaksi');
				}else {
					tata.error('Error', 'Terjadi kesalahan pada server')
				}
			},
			complete: function() {
				if (i === (checkout.listCartPerSeller.length - 1)) {
					setTimeout(function() {
						window.location.href = `${global.base_url}transaction`
					}, 2000);
				}
			}
		});
	}
}
