<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('auth');
		}
	}
	
	public function index()
	{
		$this->load->view('admin/user/index');
	}

	public function getUser()
	{
		$headers = [
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

	public function insert()
	{
		$headers = [
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$endpoint = '/api/v1/admin/dashboard/user/create';
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';
		
		$result = request($endpoint, 'POST', $data, $headers);

		var_dump($result);
		die;

		response($data, true);
	}

}

/* End of file User.php */
