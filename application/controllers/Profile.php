<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!isLogin()) {
			redirect('auth');
		}	
		
		if (isAdmin()) {
			redirect('/admin');
		}

		$this->load->model('admin/Profile_model', 'profile');
	}

	public function index()
	{
		$data['title'] = 'Profile';
		$this->load->view('user/profile/index', $data);
	}

	public function getProfile()
	{
		$result = $this->profile->getProfile();

		return response($result, true);
	}
}
