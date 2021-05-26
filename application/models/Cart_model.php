<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function getCart()
	{
		$endpoint = 'api/v1/user/cart/getCart';
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token);

		return $result;
	}

	public function addToCart($data)
	{
		$endpoint = 'api/v1/user/cart/addCart';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token, true);

		return $result;
	}

	public function updateProductQty($data, $idProduct)
	{
		$endpoint = 'api/v1/user/cart/changeQty';
		$token = $this->session->userdata('token');

		$result = put_curl($endpoint, $idProduct, $data, $token);

		return $result;
	}

	public function removeCart($idCart)
	{
		$endpoint = 'api/v1/user/cart/removeCart';
		$token = $this->session->userdata('token');

		$result = delete_curl($endpoint, $idCart, $token);

		return $result;
	}

	public function doCheckout($data)
	{
		$endpoint = 'api/v1/user/cart/doCheckout';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token, true);

		return $result;
	}

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */