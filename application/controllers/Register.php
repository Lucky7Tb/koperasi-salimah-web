<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register');
	}

	public function simpan(){
		$this->load->model('m_user');

        $data = array(
			'username'       => $this->input->post('username'),
			'email'          => $this->input->post('email'),
			'password'       => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'status'		 => "user",    
        );

        $register = $this->m_user->simpan_register($data);

        if($register) {

            echo "success";

        } else {

            echo "error";

        }
	}
}
