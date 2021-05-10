<?php 
 
class Login_model extends CI_Model{	
	function doLogin($data){
		$headers = [
			'accept' => 'application/json',
			'Content-Type' => 'application/json'
		];

		$result = request('/api/v1/auth/user/login', 'POST', $data, $headers);

		$result = json_decode($result, true);

		return $result;
	}	
}
