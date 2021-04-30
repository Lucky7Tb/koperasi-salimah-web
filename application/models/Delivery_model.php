<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery_model extends CI_Model
{
	// get
	public function getAllDelivery($token, $params=null)
	{
		$end = 'api/v1/admin/dashboard/CourierService/getDeliveryServices';
		
		return get_curl($end, $token, $params);
	}

	public function getDelivery($id, $token)
	{
		$end = 'api/v1/admin/dashboard/CourierService/getDeliveryService/'.$id;
		
		return get_curl($end, $token);
	}
	
	// post
	public function createCourier($data, $token)
	{
		$end = 'api/v1/admin/dashboard/CourierService/create';

		return post_curl($end, $data, $token);
	}
	
	// put
	public function updateCourier($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/CourierService/update';

		return put_curl($end, $id, $data, $token);
	}

	public function changeCourierPhoto($id, $data, $token)
	{
		$end = 'api/v1/admin/dashboard/CourierService/changePhoto';
		
		return put_curl($end, $id, $data, $token);
	}
	
	// delete
	public function deactiveDelivery($id, $token)
	{
		$end = 'api/v1/admin/dashboard/CourierService/deactiveDeliveryService';
		
		return delete_curl($end, $id, $token);
	}
}
