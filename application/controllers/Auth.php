<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
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

		$this->load->model('Login_model', 'login');
		
		$data = $this->input->post(null, true);

		$result = $this->login->doLogin($data);

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
		redirect('/auth');
	}

}

/* End of file Auth.php */
