<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getProfile()
	{
		$endpoint = 'api/v1/auth/user/getProfile';
		
		$result = get_curl($endpoint, $this->token);
		
		return $result;
	}

	public function changeProfile($data)
	{
		$endpoint = 'api/v1/auth/user/updateProfile';

		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}
	
	public function changePhotoProfile($data)
	{
		$endpoint = 'api/v1/auth/user/updatePhotoProfile';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}
}

/* End of file Profile_model.php */
