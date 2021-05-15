<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function getDetailProduct($idProduct)
	{
		$endpoint = 'api/v1/user/product/getDetailProduct/'.$idProduct;
		
		$result = get_curl($endpoint, null);

		return $result;
	}

}

/* End of file Product_model.php */
