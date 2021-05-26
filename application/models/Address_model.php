<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

	private $token;
	private $rajaOngkirKey = '2a97d6ba5a1b8566843fa3fb001e6b97';

	public function __construct()
	{
		parent::__construct();
		
		$this->token = $this->session->userdata('token');	
	}

	public function getAllAddress()
	{
		$endpoint = 'api/v1/user/address/getAllMyAddress';

		$result = get_curl($endpoint, $this->token);
		
		return $result;
	}

	public function getCurrentAddress()
	{
		$endpoint = 'api/v1/user/address/getCurrent';

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function getProvinces()
	{
		$endpoint = 'https://pro.rajaongkir.com/api/province';
		$headers = [
			'key' => $this->rajaOngkirKey
		];

		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

}

/* End of file Address_model.php */
/* Location: ./application/models/Address_model.php */