<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
	private $token;

	public function __construct()
	{
		$this->token = $this->session->userdata('token');
	}

	// get
	public function getAllCategories($params = null)
	{
		$end = 'api/v1/admin/dashboard/category/getCategories';

		return get_curl($end, $this->token, $params);
	}

	public function getCategory($id)
	{
		$end = 'api/v1/admin/dashboard/category/getCategory/'.$id;

		return get_curl($end, $this->token);
	}

	// post
	public function createCategory($data)
	{
		$end = 'api/v1/admin/dashboard/category/create';

		return post_curl($end, $data, $this->token, true);
	}

	// put
	public function updateCategory($id, $data)
	{
		$end = 'api/v1/admin/dashboard/category/update';

		return put_curl($end, $id, $data, $this->token);
	}

	// delete
	public function deactiveCategory($id)
	{
		$end = 'api/v1/admin/dashboard/category/deactiveCategory';

		return delete_curl($end, $id, $this->token);
	}

	public function countAllCategory($search = null)
	{
		return count($this->getAllCategories(array('search' => $search))['data']);
	}
}
