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

	public function getAllUsers()
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$data = $this->input->get();
		$endPoint = "/api/v1/admin/dashboard/user/getAllUsers?";

		if (isset($data['search'])) {
			$endPoint = $endPoint . 'search=' . $data['search'];
		} else {
			$endPoint = $endPoint . 'page=' . $data['page'];
		}
		$endPoint = $endPoint . '&order-by=' . $data['order-by'];
		$endPoint = $endPoint . '&order-direction=' . $data['order-direction'];

		$result = request($endPoint, 'GET', null, $headers);

		response($result);
	}

	public function getUser()
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$userId = $this->input->get('id');
		$endPoint = '/api/v1/admin/dashboard/user/getUser/'.$userId;

		$result = request($endPoint, 'GET', null, $headers);

		response($result);
	}

	public function create()
	{
		$this->load->view('admin/user/create');
	}

	public function insert()
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$data = $this->input->post(null, true);
		$endpoint = '/api/v1/admin/dashboard/user/create';

		$tmpName =  $_FILES['photo']['tmp_name'];
		$fileName =  $_FILES['photo']['name'];
		$fileType =  $_FILES['photo']['type'];
		$data['photo'] = curl_file_create($tmpName, $fileType, $fileName);

		$result = request($endpoint, 'POST', $data, $headers);

		response($result);
	}


	public function edit()
	{
		$this->load->view('admin/user/edit');
	}

	public function update($id)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'application/json'
		];

		$data = $this->input->post(null, true);
		$endpoint = '/api/v1/admin/dashboard/user/update/'.$id;

		$result = request($endpoint, 'PUT', $data, $headers);

		response($result);
	}
}

/* End of file User.php */
