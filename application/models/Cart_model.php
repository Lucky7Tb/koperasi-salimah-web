<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function addToCart($data)
	{
		$endpoint = 'api/v1/user/cart/addCart';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token, true);

		return $result;
	}

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */