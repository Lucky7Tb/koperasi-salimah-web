<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!isLogin()) {
			redirect('auth');
		}

		if (isAdmin()) {
			redirect('/admin');
		}

		if (!haveAddress()) {
			redirect('/profile');
		}
			
		$this->load->model('Cart_model', 'cart');
	}

	public function index()
	{
		$data['title'] = 'Cart';
		$this->load->view('user/cart/index', $data);
	}

	public function getCart()
	{
		$result = $this->cart->getCart();

		response($result, true);
	}

	public function addToCart()
	{
		$data = $this->input->post(null, true);

		$result = $this->cart->addToCart($data);

		response($result, true);
	}

	public function updateCartQty()
	{
		$data = $this->input->post(null, true);
		$idProduct = $this->input->get('id', true);

		$result = $this->cart->updateProductQty($data, $idProduct);

		response($result, true);
	}

	public function removeCart()
	{
		$idCart = $this->input->get('id', true);

		$result = $this->cart->removeCart($idCart);

		response($result, true);
	}
	
	public function checkout()
	{
		$data['title'] = 'Checkout';
		$this->load->view('user/cart/checkout', $data);
	}

	public function doCheckout()
	{
		$data['id_cart'] = $this->input->post('id_cart', true);
		$data['id_cart'] = explode(',', $data['id_cart']);

		$result = $this->cart->doCheckout($data);

		response($result, true);
	}
}
