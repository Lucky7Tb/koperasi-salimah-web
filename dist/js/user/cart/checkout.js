const checkout = {
	listCart: [],
	totalPrice: 0,
	cartWeight: 0,
	origin: '',
	originType: 'subdistrict',
	destination: '',
	destinationType: 'subdistrict',
	courier: '',
	courierService: '',
	wayFee: 0,
	addressId: '',
	deliveryId: '',
	paymentId: ''
};


function initPluginOption() {
	$('select').select2();
}

function getData(argument) {
	global.getCart(function(response) {
		$.each(response.data, function(_, cart) {
			checkout.listCart.push(cart.id);
		});
		renderCart(response.data);
		prepareOrder();
	});

	global.getCurrentAddress(function(response) {
		checkout.addressId = response.id;

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
			}else {
				toastr.error(response.message);
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
				toastr.error(response.message);
			}
		}
	});	
}

function getWayFee() {
	const formData = new FormData;

	formData.append('origin', checkout.origin);
	formData.append('originType', checkout.originType);
	formData.append('destination', checkout.destination);
	formData.append('destinationType', checkout.destinationType);
	formData.append('weight', checkout.cartWeight);
	formData.append('courier', checkout.courier);

	$.ajax({
		url: `${global.base_url}cart/getWayFee`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(response) {
			response = JSON.parse(response);
			const { rajaongkir } = response;
			if (rajaongkir.status.code) {
				$('#courier-service-container').html('');
				checkout.wayFee = rajaongkir.results[0].costs[0].cost[0].value;
				checkout.courierService = rajaongkir.results[0].costs[0].service;
				$.each(rajaongkir.results[0].costs, function(index, courier) {
					 $('#courier-service-container').append(`
					 		<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="courier-service" id="courier-${index}" value="${courier.cost[0].value}" ${index === 0 ? 'checked' : ''} onchange="changeCourierService(this)" />
								<label class="form-check-label" for="courier-${index}">${courier.service}</label>
							</div>
					 `)
				});
				$('.cart-wayFee').text(`Rp. ${global.rupiahFormat(rajaongkir.results[0].costs[0].cost[0].value.toString())}`);
				const totalPrice = checkout.wayFee + checkout.totalPrice;
				$('#cart-total').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
				$('#cart-total-final').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
			}else {
				toastr('Terjadi kesalahan pada server');
			}
		}
	});
}

function prepareOrder() {
	const formData = new FormData;
	formData.append('id_cart', checkout.listCart);

	$.ajax({
		url: `${global.base_url}cart/prepareOrder`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				checkout.origin = response.data[0].address.subdistrict_id;
				$.each(response.data, function(_, data) {
					$.each(data.products, function(_, product) {
						checkout.cartWeight += parseInt(product.weight);
					});				
				});

				getWayFee();
			}else {
				toastr.error(response.message);
			}
		}
	});	
}

function changeCourier(form) {
	checkout.courier = form.value;
	checkout.deliveryId = $('#courier-select option:selected').attr('data-id');
	getWayFee();
}

function changePaymentMethod(form) {
	checkout.paymentId = form.value;
}

function changeCourierService(form) {
	checkout.wayFee = parseInt(form.value);
	const totalPrice = checkout.wayFee + checkout.totalPrice;
	$('.cart-wayFee').text(`Rp. ${global.rupiahFormat(checkout.wayFee.toString())}`);
	$('#cart-total').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
	$('#cart-total-final').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
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
					<td>
						<img src="${cart.product.uri}" alt="${cart.product.product_name}" class="img-fluid" width="60">
					</td>
					<td class="align-middle">${cart.product.product_name}</td>
					<td class="align-middle">Rp. ${global.rupiahFormat(productPrice.toString())}</td>
					<td class="w-25 align-middle">
						${cart.qty}
					</td>
				</tr>
			`
		});
		$('#cart-total-price').text(`Rp. ${global.rupiahFormat(checkout.totalPrice.toString())}`);
		$('.cart-subTotal').text(`Rp. ${global.rupiahFormat(checkout.totalPrice.toString())}`);
	}

	$('#cart-product-content').html(content);
}

function createOrder() {
	const formData = new FormData;
	formData.append('id_u_detail_address', checkout.addressId);
	formData.append('id_m_delivery_services', checkout.deliveryId);
	formData.append('cost_delivery', checkout.wayFee);
	formData.append('service', checkout.courierService);
	formData.append('id_m_payment', checkout.paymentId);
	formData.append('id_cart', checkout.listCart);

	$.ajax({
		url: `${global.base_url}cart/createOrder`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				setTimeout(function() {
					window.location.href = global.base_url + "transaction";
				}, 2000);
				toastr.success(response.message);
			}else {
				toastr.error(response.message)
			}
		}
	});
}
