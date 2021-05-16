<?php

class Product_model extends CI_Model
{
	// get
	public function getAllProducts($token, $params = null)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return get_curl($end, $token, $params);
	}

	public function getAllProductsUser($token, $params = null)
	{
		$end = 'api/v1/user/product/getAllProducts';

		return get_curl($end, $token, $params);
	}

	public function getProduct($id, $token)
	{
		$end = 'api/v1/admin/dashboard/product/getDetailProduct/' . $id;

		return get_curl($end, $token);
	}
	public function getProductUser($id, $token)
	{
		$end = 'api/v1/user/product/getDetailProduct/' . $id;

		return get_curl($end, $token);
	}

	// post
	public function createProduct($data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/create';

		return post_curl($end, $data, $token);
	}

	public function addProductPhotos($data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/productPhotos';
	}
}

/* End of file Product_model.php */
