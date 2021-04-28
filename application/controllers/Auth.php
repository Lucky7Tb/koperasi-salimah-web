<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->helper('login_helper');

		if (!isNotLogin()) {
			$userLevel = $this->session->userdata('level');

			if ($userLevel == 'admin') {
				redirect('/admin', 'refresh');
			}
			redirect('/', 'refresh');
		}
		
		$this->load->view('login');
	}

	public function login()
	{
		$data = json_encode($this->input->post(null, true));

		$headers = [
			"Content-Type" => "application/json"
		];

		$result = request('/api/v1/auth/user/login', 'POST', $data, $headers);

		$result = json_decode($result, true);

		$userData = $result['data'];
		$userData['login'] = true;

		$this->session->set_userdata($userData);

		die(json_encode($result));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Auth', 'refresh');
	}

}

/* End of file Auth.php */
