<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if (isLogin()) {
			if (isAdmin()) {
				redirect('/admin');
			}
			redirect('/');
		}
		
		$this->load->view('auth/login');
	}

	public function register()
	{
		if (isLogin()) {
			if (isAdmin()) {
				redirect('/admin');
			}
			redirect('/');
		}

		$this->load->view('auth/register');
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
			$this->load->model('Address_model', 'address');
			
			$userAddress = $this->address->getCurrentAddress();
			$this->session->set_userdata('have_address', $userAddress['code'] == 200);
		}
		
		response($result, true);
	}

	public function showSendEmailForm()
	{
		if (isLogin()) {
			if (isAdmin()) {
				redirect('/admin');
			}
			redirect('/');
		}

		$this->load->view('auth/send_email_form');
	}
	
	public function doSendEmail()
	{
		$this->load->model('Auth_model', 'auth');

		$data = $this->input->post(null, true);

		$result = $this->auth->doSendEmail($data);

		response($result);
	}

	public function forgotPassword()
	{
		$email = $this->input->get('email', true);
		$token = $this->input->get('token', true);

		if (empty($email) || empty($token)) {
			redirect('/auth');
		}

		$this->load->view('auth/forgot_password', [
			'email' => $email,
			'token' => $token
		]);
	}
	
	public function doResetPassword()
	{
		$this->load->model('Auth_model', 'auth');

		$password = $this->input->post('password', true);
		$email = $this->input->post('email', true);
		$token = $this->input->post('token', true);

		$result = $this->auth->doResetPassword($password, $email, $token);
		
		response($result);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/auth');
	}

}

/* End of file Auth.php */
