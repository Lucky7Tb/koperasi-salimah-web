<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$error = array(
			'required' => 'Harap diisi',
		);

		// cek validasi data yang masuk
		$this->form_validation->set_rules('usermail', 'Username / Email', 'required|trim', $error);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', $error);

		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$this->_login();
		}
	}

	private function _login() {
		$usermail = $this->input->post('usermail');
		$password = $this->input->post('password');

		$data = json_encode(array(
			'username' => $usermail,
			'password' => $password
		));

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://213.190.4.40/koperasi-salimah-backend/index.php/api/v1/auth/user/login',
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_RETURNTRANSFER => 1
		));
		$result = curl_exec($curl);

		curl_close($curl);

		$result = json_decode($result, true);

		if ($result['data'] != null) {
			$data = array(
				'login' => true,
				'username' => $result['data']['username'],
				'token' => $result['data']['token'],
				'level' => $result['data']['level']
			);
			$this->session->set_userdata($data);

			if ($result['data']['level'] == 'admin') {
				redirect(base_url(index_page().'/admin/dashboard'));
			} else {
				redirect(base_url(index_page().'/'));
			}

		} else {
			redirect(base_url(index_page().'/login'));
		}
	}

//	public function doLogin()
//	{
//		$data = json_encode($this->input->post());
//
//		$response = request('/api/v1/auth/user/login', 'POST', $data);
//
//		$response = json_decode($response, true);
//
//		$userData = $response['data'];
//		$userData['login'] = true;
//
//		$this->session->set_userdata($userData);
//
//		die (json_encode($response));
//	}
//
//	public function cek_login()
//	{
//
//		$usermail = $this->input->post('usermail');
//		$password = $this->input->post('password');
//
//		$this->load->model('m_user');
//
//		$cek = $this->m_user->cek_login($usermail, $password);
//
//		if (!empty($cek)) {
//
//			foreach ($cek as $user) {
//
//				$session_data = array(
//					'id_user' => $user->id_user,
//					'username' => $user->username,
//					'email' => $user->email,
//					'status' => $user->status
//				);
//
//				$this->session->set_userdata($session_data);
//
//			}
//			echo "success";
//
//		} else {
//
//			echo "error";
//
//		}
//	}
}
