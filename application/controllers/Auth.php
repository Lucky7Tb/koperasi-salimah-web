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
		
		$this->load->view('auth/login');
	}

	public function register()
	{
		if (!isNotLogin()) {
			$userLevel = $this->session->userdata('level');

			if ($userLevel == 'admin') {
				redirect('/admin');
			}
			redirect('/');
		}

		$this->load->view('auth/register');
	}

	public function forgetPassword()
	{
		if (!isNotLogin()) {
			$userLevel = $this->session->userdata('level');

			if ($userLevel == 'admin') {
				redirect('/admin');
			}
			redirect('/');
		}

		$this->load->view('auth/forget_password');
	}

	public function doRegister()
	{
		$this->load->model('Auth_model', 'auth');

		$data = $this->input->post(null, true);

		$result = $this->auth->doRegister($data);

		response($result, true);
	}

	public function doLogin()
	{

		$this->load->model('Auth_model', 'auth');
		
		$data = $this->input->post(null, true);

		$result = $this->auth->doLogin($data);

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
