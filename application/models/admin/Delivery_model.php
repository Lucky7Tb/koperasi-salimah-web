<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery_model extends CI_Model
{
	private $token;
	/**
	 * Delivery_model constructor.
	 */
	public function __construct()
	{
		$this->token = $this->session->userdata('token');
	}

	// get
	public function getAllDelivery($params = null)
	{
		$end = 'api/v1/admin/dashboard/CourierService/getDeliveryServices';

		return get_curl($end, $this->token, $params);
	}

	public function getDelivery($id)
	{
		$end = 'api/v1/admin/dashboard/CourierService/getDeliveryService/' . $id;

		return get_curl($end, $this->token);
	}

	// post
	public function createCourier($data)
	{
		$end = 'api/v1/admin/dashboard/CourierService/create';

		return post_curl($end, $data, $this->token);
	}

	// put
	public function updateCourier($id, $data)
	{
		$end = 'api/v1/admin/dashboard/CourierService/update';

		return put_curl($end, $id, $data, $this->token);
	}

	public function changeCourierPhoto($id, $data)
	{
		$end = 'api/v1/admin/dashboard/CourierService/changePhoto/' . $id;

		return post_curl($end, $data, $this->token);
	}

	// delete
	public function deactiveDelivery($id)
	{
		$end = 'api/v1/admin/dashboard/CourierService/deactiveDeliveryService';

		return delete_curl($end, $id, $this->token);
	}

	public function countAllDelivery($search = null)
	{
		return count($this->getAllDelivery(array('search' => $search))['data']);
	}
}
