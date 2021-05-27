<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getAllUser($data)
	{
		$endpoint = "api/v1/admin/dashboard/user/getAllUsers";
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token, $data);
	
		return $result;
	}

	public function getUser($userId)
	{
		$endpoint = 'api/v1/admin/dashboard/user/getUser/'.$userId;
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token);

		return $result;
	}
	
	public function insertUser($data)
	{

		$endpoint = 'api/v1/admin/dashboard/user/create';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}

	public function updateUser($data, $userId)
	{

		$endpoint = '/api/v1/admin/dashboard/user/update';
		$token = $this->session->userdata('token');

		$result = put_curl($endpoint, $userId, $data, $token);

		return $result;
	}
}

/* End of file User_model.php */
