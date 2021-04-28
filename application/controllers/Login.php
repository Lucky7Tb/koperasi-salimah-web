<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$data = json_encode($this->input->post());

		$response = request('/api/v1/auth/user/login', 'POST', $data);

		$response = json_decode($response, true);

		$userData = $response['data'];
		$userData['login'] = true;

		$this->session->set_userdata($userData);

		die(
			json_encode($response)
		);
	}
	
	public function cek_login(){
		$this->load->model('m_user');
		
		$usermail = $this->input->post('usermail');
		$password = $this->input->post('password');

		$cek = $this->m_user->cek_login($usermail, $password);

		if(!empty($cek)){
			foreach($cek as $user){
				$session_data = array(
					'id_user' => $user->id_user,
					'username' => $user->username,
					'email' => $user->email,
					'status'=> $user->status
				);
				$this->session->set_userdata($session_data);
			}
			echo "success";
		}else{
			echo "error";
		}
	}
}
