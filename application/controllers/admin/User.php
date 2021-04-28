<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('/login', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->view('admin/user/index');
	}

	public function getUser()
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endpoint = "/api/v1/admin/dashboard/user/getAllUsers?";
		$data = $this->input->get();

		$endpoint = $endpoint . 'search=' . $data['search'];
		$endpoint = $endpoint . '&page=' . $data['page'];
		$endpoint = $endpoint . '&order-by=' . $data['order-by'];
		$endpoint = $endpoint . '&order-direction=' . $data['order-direction'];

		$result = request($endpoint, 'GET', null, $headers);

		response($result);
	}

	public function create()
	{
		$this->load->view('admin/user/create');
	}

}

/* End of file User.php */
