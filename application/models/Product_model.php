<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	/**
	 * Product_model constructor.
	 */
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

	public function getAllProductsUser($params = null)
	{
		$end = 'api/v1/user/product/getAllProducts';

		return get_curl($end, $this->token, $params);
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

	public function countAllProducts($search)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return count(get_curl($end, $this->token, array('search' => $search))['data']);
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
