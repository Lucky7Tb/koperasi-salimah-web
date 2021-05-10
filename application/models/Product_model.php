<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
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

	// post
	public function createProduct($data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/create';

		return post_curl($end, $data, $token);
	}

	public function addProductPhotos($data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/productPhotos';

		return post_curl($end, $data, $token);
	}

	// delete
	public function deteleProduct($id, $token)
	{
		$end = 'api/v1/admin/dashboard/product/blockProduct';

		return delete_curl($end, $id, $token);
	}

	public function deteleProductPhoto($id, $token)
	{
		$end = 'api/v1/admin/dashboard/product/deleteProductPhoto';

		return delete_curl($end, $id, $token);
	}

	//put
	public function changeProductCover($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/changeProductCover/' . $id;

		return post_curl($end, $data, $token);
	}

	public function updateProduct($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/updateProductData';

		return put_curl($end, $id, $data, $token);
	}

	public function updateProductCategory($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/product/updateProductCategories';

		return put_curl($end, $id, $data, $token);
	}
}
