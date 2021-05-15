<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/User_model', 'user');
		
		if (isNotLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}
	}

	public function index()
	{
		$data['title'] = 'Manajemen Pengguna';
		$this->load->view('admin/user/index', $data);
	}

	public function getAllUsers()
	{
		$data = $this->input->get(null, true);
		$result = $this->user->getAllUser($data);
		
		response($result, true);
	}

	public function getUser()
	{
		$userId = $this->input->get('id', true);
		$result = $this->user->getUser($userId);

		response($result, true);
	}

	public function create()
	{
		$data['title'] = 'Tambah user';
		$this->load->view('admin/user/create', $data);
	}

	public function insertUser()
	{
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';

		$result = $this->user->insertUser($data);

		response($result, true);
	}

	public function edit()
	{
		$data['title'] = 'Edit user';
		$this->load->view('admin/user/edit', $data);
	}

	public function updateUser($id)
	{
		$data = $this->input->post(null, true);
		$result = $this->user->updateUser($data, $id);

		response($result, true);
	}
}

/* End of file User.php */
