const listCart = [];

function getCart() {
	global.getCart(function(response) {
		$.each(response.data, function(_, cart) {
  		listCart.push(cart.id);
  	});
  	renderCart(response.data);
	});
}

function renderCart(data) {
	let content = '';
	let totalPrice = 0;
	$('#cart-product-content').html('');

	if (data.length > 0) {
		$.each(data, function(_, cart) {
			const productPrice = parseInt(cart.product.price_after_discount);
			totalPrice += productPrice * cart.qty;
			content += `
				<tr>
					<td>
						<img src="${cart.product.uri}" alt="${cart.product.product_name}" class="img-fluid" width="60">
					</td>
					<td class="align-middle">${cart.product.product_name}</td>
					<td class="align-middle">Rp. ${global.rupiahFormat(productPrice.toString())}</td>
					<td class="w-25 align-middle">
						<input type="number" class="form-control" value="${cart.qty}" onblur="updateProductQty(${cart.id}, this)" min="1">
					</td>
					<td class="align-middle">
						<a href="javascript:void(0)" onclick="removeFormCart(${cart.id})">
							<i class="icon-trash"></i>
						</a>
					</td>
				</tr>
			`
		});
		$('#cart-total-price').text(`Rp. ${global.rupiahFormat(totalPrice.toString())}`);
	}else {
		content += `
			<tr>
				<td colspan="5" class="text-center">Yah, cart nya kosong:(</td>
			</tr>
		`;
		$('#checkout-button').addClass('disabled');
		$('#cart-total-price').text('Rp. 0');
	}

	$('#cart-product-content').html(content);
}

function updateProductQty(idCart, form) {
	if (form.value == 0) {
		form.value = 1;
	}

	const formData = new FormData;
	formData.append('qty', form.value);
	
	$.ajax({
	  url: `${global.base_url}cart/updateCartQty?id=${idCart}`,
	  type: 'POST',
	  processData: false,
		contentType: false,
		data: formData,
	  success: function(response) {
	    response = JSON.parse(response);
	    if (response.code === 200) {
	    	getCart();
	    }else {
	    	toastr.error(response.message)
	    }
	  },
	});	
}

function removeFormCart(idCart) {
	$.ajax({
	  url: `${global.base_url}cart/removeCart?id=${idCart}`,
	  type: 'POST',
	  processData: false,
		contentType: false,
	  success: function(response) {
	    response = JSON.parse(response);
	    if (response.code === 200) {
	    	toastr.success(response.message);
	    	getCart();
	    }else {
	    	toastr.error(response.message)
	    }
	  },
	});	
}

$('#checkout-button').on('click', function(e) {
	e.preventDefault();

	const formData = new FormData;
	formData.append('id_cart', listCart);

	$.ajax({
		url: `${global.base_url}cart/doCheckout`,
	  type: 'POST',
	  processData: false,
		contentType: false,
		data: formData,
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				window.location.href = `${global.base_url}cart/checkout`
			} else {
				toastr.error(response.message);
			}
		}
	})
});
