<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getAllUser($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endpoint = "/api/v1/admin/dashboard/user/getAllUsers?";

		if (isset($data['search'])) {
			$endpoint = $endpoint . 'search=' . $data['search'];
		} else {
			$endpoint = $endpoint . 'page=' . $data['page'];
		}
		$endpoint = $endpoint . '&order-by=' . $data['order-by'];
		$endpoint = $endpoint . '&order-direction=' . $data['order-direction'];

		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

	public function getUser($userId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endpoint = '/api/v1/admin/dashboard/user/getUser/' . $userId;

		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}
	
	public function insertUser($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$endpoint = '/api/v1/admin/dashboard/user/create';

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

		$endpoint = '/api/v1/admin/dashboard/user/update/' . $userId;

		$result = request($endpoint, 'PUT', $data, $headers);

		return $result;
	}
}

/* End of file User_model.php */
