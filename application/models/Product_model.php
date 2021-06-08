<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();

		$this->token = $this->session->userdata('token');
	}

	// get
	public function getAllProducts($token, $params = null)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return get_curl($end, $token, $params);
	}

	public function getProduct($id, $token)
	{
		$end = 'api/v1/admin/dashboard/product/getDetailProduct/' . $id;

		return get_curl($end, $token);
	}

	public function getAllProductsUser($params = null)
	{
		$end = 'api/v1/user/product/getAllProducts';

		return get_curl($end, $this->token, $params);
	}

	public function getDetailProduct($idProduct)
	{
		$endpoint = 'api/v1/user/product/getDetailProduct/'.$idProduct;
		
		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function updateProductCategory($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/updateProductCategories';

		return put_curl($end, $id, $data, $token);
	}

	public function countAllProducts($search)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return count(get_curl($end, $this->token, array('search' => $search))['data']);
	}

	public function getProductUser($id, $token)
	{
		$end = 'api/v1/user/product/getDetailProduct/' . $id;

		return get_curl($end, $token);
	}

	public function countAllProductsUser($search = null)
	{
		$end = 'api/v1/user/product/getAllProducts';

		return count(get_curl($end, $this->token, array('search' => $search))['data']);
	}

	public function countAllNotVisible($params = null)
	{
		return count($this->notVisibleUser($params));
	}

	public function notVisibleUser($params = null)
	{
		$end = 'api/v1/user/product/getAllProducts';

		$data = get_curl($end, $this->token, $params)['data'];

		$array = array();
		$finish = $this->countAllProducts($params['search']);
		$i = 0;
		$j = 0;
		while ($i < $finish) {
			if ($data[$i]['is_visible'] == 1) {
				$array[$j++] = $data[$i];
			}
			$i++;
		}

		return $array;
	}
}

/* End of file Product_model.php */
