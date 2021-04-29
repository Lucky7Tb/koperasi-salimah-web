<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
	// get
	public function getAllCategories($token, $params = null)
	{
		$end = 'admin/dashboard/category/getCategories';

		return get_curl($end, $token, $params);
	}

	public function getCategory($id, $token, $params)
	{
		$end = 'admin/dashboard/category/getCategory/'.$id;

		return get_curl($end, $token);
	}

	// post
	public function createCategory($data, $token)
	{
		$end = 'admin/dashboard/category/create';

		return post_curl($end, $data, $token);
	}

	// put
	public function updateCategory($id, $data, $token)
	{
		$end = 'admin/dashboard/category/update';

		return put_curl($end, $id, $data, $token);
	}

	// delete
	public function deactiveCategory($id, $token)
	{
		$end = 'admin/dashboard/category/deactiveCategory';

		return delete_curl($end, $id, $token);
	}
}
