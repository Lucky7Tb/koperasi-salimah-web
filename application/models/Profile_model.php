<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function getProfile()
	{
		$endpoint = 'api/v1/auth/user/getProfile';
		$token = $this->session->userdata('token');
		
		$result = get_curl($endpoint, $token);
		
		return $result;
	}

	public function changeProfile($data)
	{
		$endpoint = 'api/v1/auth/user/updateProfile';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token, true);

		return $result;
	}
	
	public function changePhotoProfile($data)
	{
		$endpoint = 'api/v1/auth/user/updatePhotoProfile';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}
}

/* End of file Profile_model.php */
