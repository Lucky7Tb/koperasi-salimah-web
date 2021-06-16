<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

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
		$this->load->view("admin/banner/index", $data);
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */