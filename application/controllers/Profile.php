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

		$this->load->model('Profile_model', 'profile');
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

	public function changeProfile()
	{
		$data = $this->input->post(null, true);

		$data['phone_number'] = str_replace(' ', '', $data['phone_number']);
		$data['phone_number'] = str_replace('-', '', $data['phone_number']);

		$result = $this->profile->changeProfile($data);
		
		response($result, true);
	}

	public function changePhotoProfile()
	{
		$data['file_key'] = 'photo';

		$result = $this->profile->changePhotoProfile($data);

		response($result, true);
	}
}
