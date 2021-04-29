<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		// Pesan error
		$error = array(
			'required' => 'Harap diisi',
			'valid_email' => 'Email tidak valid',
			'min_length' => 'Password harus 8 digit',
			'matches' => 'Password tidak sama'
		);

		// Set Rules
		$this->form_validation->set_rules('username', 'Username', 'required|trim', $error);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', $error);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', $error);
		$this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]', $error);

		// Judul halaman
		$data['title'] = 'Koperasi Salimah | Register';

		// Load model
		$this->load->model('User_model', 'user');

		// cek form sudah sesuai atau belum
		if ($this->form_validation->run() == false) {
			$this->load->view('register');
		} else {
			$data = array(
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'status' => "user",
			);

        $register = $this->m_user->simpan_register($data);

        if($register) {

            echo "success";

        } else {

            echo "error";

        }
	}
}
