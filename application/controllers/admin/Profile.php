<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Profile_model', 'profile');

		if (isNotLogin()) {
			redirect('auth');
		}
	}
	
	public function index()
	{
		$data['title'] = 'Profile';
		$this->load->view('admin/profile/index', $data);
	}

	public function getProfile()
	{
		$result = $this->profile->getProfile();

		return response($result, true);
	}

	public function changeProfile()
	{
		$data = $this->input->post(null, true);

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

/* End of file Profile.php */
