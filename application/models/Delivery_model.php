<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_model extends CI_Model {

	public function getDeliveryService()
	{
		$endpoint = 'api/v1/user/DeliveryService/get';

		$result = get_curl($endpoint, $this->session->userdata('token'));

		return $result;
	}

}

/* End of file Delivery_model.php */
/* Location: ./application/controllers/Delivery_model.php */