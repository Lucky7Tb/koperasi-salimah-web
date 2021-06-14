<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getAllUser($data)
	{
		$data['search'] = urlencode($data['search']);
		
		$endpoint = 'api/v1/admin/dashboard/user/getAllUsers';

		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}

	public function getUser($userId)
	{
		$endpoint = 'api/v1/admin/dashboard/user/getUser/'.$userId;

		$result = get_curl($endpoint, $this->token);

		return $result;
	}
	
	public function insertUser($data)
	{

		$endpoint = 'api/v1/admin/dashboard/user/create';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function updateUser($data, $userId)
	{

		$endpoint = '/api/v1/admin/dashboard/user/update';

		$result = put_curl($endpoint, $userId, $data, $this->token);

		return $result;
	}
}

/* End of file User_model.php */
