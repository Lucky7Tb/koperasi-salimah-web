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

	public function getDashboardData()
	{
		$this->load->model('admin/Dashboard_model', 'dashboard');
		$result = $this->dashboard->getDashboardData();

		response($result, true);
	}
}
