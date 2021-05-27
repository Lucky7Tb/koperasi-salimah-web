<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

	public function getPayments($data)
	{
		$endpoint = "api/v1/admin/dashboard/payment/getPayments";
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token, $data);

		return $result;
	}

	public function getPayment($paymentId)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/getPayment/'. $paymentId;
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token);

		return $result;
	}

	public function insertPayment($data)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/create';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}

	public function updatePayment($data, $paymentId)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/update';
		$token = $this->session->userdata('token');

		$result = put_curl($endpoint, $paymentId, $data, $token);

		return $result;
	}

	public function changePaymentThumbnail($data, $paymentId)
	{
		$endpoint = '/api/v1/admin/dashboard/payment/changePhoto/'.$paymentId;
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}

	public function deletePayment($paymentId)
	{
		$endpoint = '/api/v1/admin/dashboard/payment/deactivePayment';
		$token = $this->session->userdata('token');

		$result = delete_curl($endpoint, $paymentId, $token);

		return $result;
		
	}
}

/* End of file Payment_model.php */
