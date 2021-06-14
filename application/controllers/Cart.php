<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (isAdmin()) {
			redirect('/admin');
		}
			
		$this->load->model('Cart_model', 'cart');
	}

	public function index()
	{
		if (!isLogin()) {
			redirect('auth');
		}

		$data['title'] = 'Cart';
		$this->load->view('user/cart/index', $data);
	}

	public function getCart()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$result = $this->cart->getCart();

		response($result, true);
	}

	public function getDeliveryService()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$this->load->model('Delivery_model', 'delivery');

		$result = $this->delivery->getDeliveryService();

		response($result, true);
	}

	public function getPaymentMethod()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$result = $this->cart->getPaymentMethod();

		response($result, true);
	}

	public function getWayFee()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$data = $this->input->post(null, true);

		$result = $this->cart->getWayFee($data);

		response($result);
	}

	public function addToCart()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$data = $this->input->post(null, true);

		$result = $this->cart->addToCart($data);

		response($result, true);
	}

	public function updateCartQty()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$data = $this->input->post(null, true);
		$idProduct = $this->input->get('id', true);

		$result = $this->cart->updateProductQty($data, $idProduct);

		response($result, true);
	}

	public function removeCart()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$idCart = $this->input->get('id', true);

		$result = $this->cart->removeCart($idCart);

		response($result, true);
	}
	
	public function checkout()
	{
		if (!isLogin()) {
			redirect('auth');
		}

		if (!haveAddress()) {
			redirect('profile');
		}

		$data['title'] = 'Checkout';
		$this->load->view('user/cart/checkout', $data);
	}

	public function doCheckout()
	{
		if (!haveAddress()) {
			response(["code" => 400, "message" => "Harap masukan alamat terlebih dahulu"], true);
		}
		
		$data['id_cart'] = $this->input->post('id_cart', true);
		$data['id_cart'] = explode(',', $data['id_cart']);

		$result = $this->cart->doCheckout($data);

		response($result, true);
	}

	public function prepareOrder()
	{
		$idCart = $this->input->post('id_cart', true);
		$data['id_cart'] = explode(',', $idCart);
		
		$result = $this->cart->prepareOrder($data);

		response($result, true);
	}

	public function createOrder()
	{
		$data = $this->input->post(null, true);
		$data['id_cart'] = explode(",", $data['id_cart']);
		
		$result = $this->cart->createOrder($data);

		response($result, true);
	}
}
