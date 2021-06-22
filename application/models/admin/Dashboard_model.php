<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getDashboardData()
	{
		$endpoint = 'api/v1/admin/dashboard/overview';
	
		$result = get_curl($endpoint, $this->token);

		return $result;
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/admin/Dashboard_model.php */