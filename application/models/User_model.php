<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getAllUser($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endPoint = "api/v1/admin/dashboard/user/getAllUsers?";

		if (isset($data['search'])) {
			$endPoint = $endPoint . 'search=' . $data['search'];
		} else {
			$endPoint = $endPoint . 'page=' . $data['page'];
		}
		$endPoint = $endPoint . '&order-by=' . $data['order-by'];
		$endPoint = $endPoint . '&order-direction=' . $data['order-direction'];

		$result = request($endPoint, 'GET', null, $headers);

		return $result;
	}

	public function getUser($userId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endPoint = 'api/v1/admin/dashboard/user/getUser/' . $userId;

		$result = request($endPoint, 'GET', null, $headers);

		return $result;
	}
	
	public function insertUser($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$endpoint = 'api/v1/admin/dashboard/user/create';

		$result = request($endpoint, 'POST', $data, $headers);

		return $result;
	}

	public function updateUser($data, $userId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'application/json'
		];

		$endpoint = 'api/v1/admin/dashboard/user/update/' . $userId;

		$result = request($endpoint, 'PUT', $data, $headers);

		return $result;
	}
}

/* End of file User_model.php */
