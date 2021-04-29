<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->helper('login_helper');

		if (!isNotLogin()) {
			$userLevel = $this->session->userdata('level');

			if ($userLevel == 'admin') {
				redirect('/admin');
			}
			redirect('/');
		}
		
		$this->load->view('login');
	}

	public function login()
	{
		$data = $this->input->post(null, true);

		$headers = [
			'Content-Type' => 'application/json'
		];

		$result = request('/api/v1/auth/user/login', 'POST', $data, $headers);

		$result = json_decode($result, true);

		if ($result['code'] == 200) {
			$userData = $result['data'];
			$userData['login'] = true;
	
			$this->session->set_userdata($userData);
		}

		response($result, true);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/auth', 'refresh');
	}

}

/* End of file Auth.php */
