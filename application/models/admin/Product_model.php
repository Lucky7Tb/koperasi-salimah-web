<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	private $token;

	/**
	 * Product_model constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	// get
//	public function getAllProducts($params = null, $start = 0, $finish = null)
//	{
//		$end = 'api/v1/admin/dashboard/product/getProducts';
//
//		$data = get_curl($end, $this->token, $params);
//
//		if ($finish == null or $start > $finish) {
//			$finish = $this->countNotVisible();
//		}
//
//		$arrProduk = array();
//		$j = 0;
//		foreach ($data['data'] as $produk) {
//			$arrProduk[$j++] = $produk;
//		}
//
//		$data['data'] = array();
//
//		$i = $start;
//		$j = 0;
//		while ($j < $finish) {
//			if ($arrProduk[$i]['is_visible'] == 1) {
//				$data['data'][$j++] = $arrProduk[$i];
//			}
//			$i++;
//		}
//
//		$data['size'] = count($data['data']);
//
//		return $data;
//	}

	public function getAllProducts($params = null)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return get_curl($end, $this->token, $params);
	}

	public function getProduct($id)
	{
		$end = 'api/v1/admin/dashboard/product/getDetailProduct/' . $id;

		return get_curl($end, $this->token);
	}

	// post
	public function createProduct($data)
	{
		$end = 'api/v1/admin/dashboard/product/create';

		return post_curl($end, $data, $this->token);
	}

	public function addProductPhotos($data)
	{
		$end = 'api/v1/admin/dashboard/product/productPhotos';

		return post_curl($end, $data, $this->token);
	}

	// delete
	public function deteleProduct($id)
	{
		$end = 'api/v1/admin/dashboard/product/blockProduct';

		return delete_curl($end, $id, $this->token);
	}

	public function deteleProductPhoto($id)
	{
		$end = 'api/v1/admin/dashboard/product/deleteProductPhoto';

		return delete_curl($end, $id, $this->token);
	}

	//put
	public function changeProductCover($id, $data)
	{
		$end = 'api/v1/admin/dashboard/product/changeProductCover/' . $id;

		return post_curl($end, $data, $this->token);
	}

	public function updateProduct($id, $data)
	{
		$end = 'api/v1/admin/dashboard/product/updateProductData';

		return put_curl($end, $id, $data, $this->token);
	}

	public function updateProductCategory($id, $data)
	{
		$end = 'api/v1/admin/dashboard/product/updateProductCategories';

		return put_curl($end, $id, $data, $this->token);
	}

	public function countAllProducts($search = null)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

		return count(get_curl($end, $this->token, array('search' => $search))['data']);
	}

	public function countAllNotVisible($params = null)
	{
		return count($this->notVisible($params));
	}

	public function notVisible($params = null)
	{
		$end = 'api/v1/admin/dashboard/product/getProducts';

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
