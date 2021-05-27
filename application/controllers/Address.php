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

	public function getCities()
	{
		$provincesId = $this->input->get('province', true);

		$result = $this->address->getCities($provincesId);

		response($result);
	}
	
	public function getSubdistricts()
	{
		$cityId = $this->input->get('city', true);

		$result = $this->address->getSubdistricts($cityId);

		response($result);
	}

	public function addAddress()
	{
		$data = $this->input->post(null, true);

		$result = $this->address->addAddress($data);

		if (!haveAddress() && $result['code'] == 200) {
			$this->session->set_userdata('have_address', true);
		}	

		response($result, true);
	}

	public function changeActiveAddress()
	{
		$data['id_address'] = $this->input->get('id_address', true);

		$result = $this->address->changeActiveAddress($data);

		response($result, true);
	}
}

/* End of file Address.php */
/* Location: ./application/controllers/Address.php */
