<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function doLogin($data)
	{
		$endpoint = 'api/v1/auth/user/login';
		$result = post_curl($endpoint, $data, null, true);

		return $result;
	}

	public function doRegister($data)
	{
		$endpoint = 'api/v1/auth/user/register';
		$result = post_curl($endpoint, $data, null, true);
		
		return $result;
	}

	public function doSendEmail($data)
	{
		$endpoint = API.'/api/v1/auth/user/sendEmail';
		$result = request($endpoint, 'POST', $data, [
			'Content-Type' => 'application/json'
		]);

		return $result;
	}

	public function doResetPassword($password, $email, $token)
	{
		$endpoint = API.'/api/v1/auth/user/changePassword?email='.$email.'&token='.$token;
		$result = request($endpoint, 'POST', ['password' => $password], [
			'Content-Type' => 'application/json'
		]);

		return $result;
	}
}

/* End of file Auth_model.php */
