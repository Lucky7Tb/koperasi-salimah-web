<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();

		$this->token = $this->session->userdata('token');
	}

	public function getAllProductsUser()
	{
		$end = 'api/v1/user/product/getAllProducts';

		return get_curl($end, $this->token);
	}

	public function getDetailProduct($idProduct)
	{
		$endpoint = 'api/v1/user/product/getDetailProduct/'.$idProduct;
		
		$result = get_curl($endpoint, $this->token);

		return $result;
	}

}

/* End of file Product_model.php */
