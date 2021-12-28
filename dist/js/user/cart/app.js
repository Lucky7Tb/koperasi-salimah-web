const listCart = [];
let delayTimer;

function getCart() {
	listCart.splice(0, listCart.length);
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
				<td class="product-thumbnail">
					<a href="#">
						<img s src="${cart.product.uri}" alt="${cart.product.product_name}">
					</a>
				</td>

				<td class="product-name">
					<a href="#">${cart.product.product_name}</a>
				</td>

				<td class="product-quantity">
					<div class="input-counter">
						<input 
							type="number"
							min="1"
							value="${cart.qty}"
							onblur="updateProductQty(${cart.id}, this)" 
							onchange="changeProducQty(${cart.id}, this)" 
						>
					</div>
				</td>

				<td class="product-subtotal">
					<span class="subtotal-amount">
						Rp. ${global.rupiahFormat(productPrice.toString())}
					</span>

					<a href="javascript:void(0)" onclick="removeFormCart(${
						cart.id
					})" class="remove">
						<i class='bx bx-trash'></i>
					</a>
				</td>
			</tr>
			`;
		});
		content += `
			<tr>
				<td colspan="3">
					<strong>Total harga</strong>
				</td>
				<td>Rp. ${global.rupiahFormat(totalPrice.toString())}</td>
			</tr>;
		`
	} else {
		content += `
			<tr>
				<td colspan="4" class="text-center">Yah, cart nya kosong:(</td>
			</tr>
		`;
		$('#checkout-button').addClass('disabled');
		$('#cart-total-price').text('Rp. 0');
	}

	$('#cart-product-content').html(content);
}

function changeProducQty(id, form) {
	clearTimeout(delayTimer);
	delayTimer = setTimeout(function () {
		updateProductQty(id, form);	
	}, 1500);
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
	    	toastr.success('Produk berhasil dihapus dari cart');
	    	getCart();
	    }else {
	    	toastr.error('Terjadi kesalahan pada server')
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
				window.location.href = `${global.base_url}profile`
			}
		}
	})
});
