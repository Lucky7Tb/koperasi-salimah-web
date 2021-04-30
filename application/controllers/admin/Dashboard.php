<?php

class Dashboard extends CI_Controller
{
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
		$data['title'] = 'Dashboard';
		$this->load->view("admin/dashboard", $data);
	}
}
