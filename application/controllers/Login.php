<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');

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
