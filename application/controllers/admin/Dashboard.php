<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	
		if (!isLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}

		if (!haveAddress()) {
			redirect('/admin/profile');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view("admin/dashboard", $data);
	}
}
