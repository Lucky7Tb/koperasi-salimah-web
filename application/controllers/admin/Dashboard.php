<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	
		if (isNotLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view("admin/dashboard", $data);
	}
}
