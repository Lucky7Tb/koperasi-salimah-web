<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	// get
	public function getAllProducts($token, $params = null)
	{
		$end = 'admin/dashboard/product/getProducts';

		return get_curl($end, $token);
	}

	public function getProduct($id, $token)
	{
		$end = API.'admin/dashboard/product/getDetailProduct/'.$id;

		return get_curl($end, $token);
	}

	// post
	public function createProduct($data, $token)
	{
		$end = 'admin/dashboard/product/create';
		
		return post_curl($end, $data, $token);
	}

	public function addProductPhotos($data, $token)
	{
		$end = 'admin/dashboard/product/productPhotos';
		
		return post_curl($end, $data, $token);
	}

	// delete
	public function deteleProduct($id, $token)
	{
		$end = 'admin/dashboard/product/blockProduct';

		return delete_curl($end, $id, $token);
	}

	public function deteleProductPhoto($id, $token)
	{
		$end = 'admin/dashboard/product/deleteProductPhoto';

		return delete_curl($end, $id, $token);
	}
	
	//put
	public function changeProductCover($id, $data, $token)
	{
		$end = 'admin/dashboard/product/changeProductCover';

		return put_curl($end, $id, $data, $token);
	}

	public function updateProduct($id, $data, $token)
	{
		$end = 'admin/dashboard/product/updateProductData';

		return put_curl($end, $id, $data, $token);
	}

	public function updateProductCategory($id, $data, $token)
	{
		$end = 'admin/dashboard/product/updateProductCategories';

		return put_curl($end, $id, $data, $token);
	}
}
