<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!isLogin()) {
			response([
				'code' => 401,
				'message' => 'Harap login terlebih dahulu'
			], true);
		}

		$this->load->model('Address_model', 'address');
	}

	public function getAllAddress()
	{
		$result = $this->address->getAllAddress();

		response($result, true);
	}

	public function getCurrentAddress()
	{
		$result = $this->address->getCurrentAddress();

		response($result, true);
	}

	public function getProvinces()
	{
		$result = $this->address->getProvinces();

		response($result);
	}
	
}

/* End of file Address.php */
/* Location: ./application/controllers/Address.php */