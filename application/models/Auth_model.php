<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function doLogin($data)
	{
		$endPoint = 'api/v1/auth/user/login';
		$result = post_curl($endPoint, $data, null, true);

		return $result;
	}

	public function doRegister($data)
	{
		$endPoint = 'api/v1/auth/user/register';
		$result = post_curl($endPoint, $data, null, true);
		
		return $result;
	}

}

/* End of file Auth_model.php */
