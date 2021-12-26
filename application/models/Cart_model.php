<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	private $token;
	private $rajaOngkirKey = 'b6c970c10f811f37c2566defe70f76a7';

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getCart()
	{
		$endpoint = 'api/v1/user/cart/getCart';
	
		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function getPaymentMethod()
	{
		$endpoint = 'api/v1/user/Payment/get';

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function getWayFee($data)
	{
		$headers = [
			'key' => $this->rajaOngkirKey
		];

		$endpoint = 'https://pro.rajaongkir.com/api/cost';

		$result = request($endpoint, 'POST', $data, $headers);

		return $result;
	}

	public function addToCart($data)
	{
		$endpoint = 'api/v1/user/cart/addCart';
		
		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}

	public function updateProductQty($data, $idProduct)
	{
		$endpoint = 'api/v1/user/cart/changeQty';
		
		$result = put_curl($endpoint, $idProduct, $data, $this->token);

		return $result;
	}

	public function removeCart($idCart)
	{
		$endpoint = 'api/v1/user/cart/removeCart';
		
		$result = delete_curl($endpoint, $idCart, $this->token);

		return $result;
	}

	public function doCheckout($data)
	{
		$endpoint = 'api/v1/user/cart/doCheckout';
		
		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}

	public function prepareOrder($data)
	{
		$endpoint = 'api/v1/user/order/prepareOrder';

		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}

	public function createOrder($data)
	{
		$endpoint = 'api/v1/user/order/createOrder';

		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
