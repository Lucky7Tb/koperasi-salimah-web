<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

	private $token;
	private $rajaOngkirKey = 'b6c970c10f811f37c2566defe70f76a7';

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

	public function getCities($provincesId)
	{
		$endpoint = 'https://pro.rajaongkir.com/api/city?province='.$provincesId;
		$headers = [
			'key' => $this->rajaOngkirKey
		];
	
		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

	public function getSubdistricts($cityId)
	{
		$endpoint = 'https://pro.rajaongkir.com/api/subdistrict?city='.$cityId;
		$headers = [
			'key' => $this->rajaOngkirKey
		];
	
		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

	public function addAddress($data)
	{
		$endpoint = 'api/v1/user/address/create';

		$result = post_curl($endpoint, $data, $this->token, true);
		
		return $result;
	}

	public function getDetailAddress($addressId)
	{
		$endpoint = 'api/v1/user/address/getDetailAddress/'.$addressId;

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function updateAddress($data, $idAddress)
	{

		$endpoint = 'api/v1/user/address/updateAddress/'.$idAddress;

		$result = post_curl($endpoint, $data, $this->token, true);
		
		return $result;
	}

	public function changeActiveAddress($data)
	{
		$endpoint = 'api/v1/user/address/changeActiveAddress';

		$result = put_curl($endpoint, null, $data, $this->token);

		return $result;
	}
}

/* End of file Address_model.php */
/* Location: ./application/models/Address_model.php */
