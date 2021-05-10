<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

	public function getPayments($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endpoint = "/api/v1/admin/dashboard/payment/getPayments?";

		if (isset($data['search'])) {
			$endpoint = $endpoint . 'search=' . $data['search'];
		} else {
			$endpoint = $endpoint . 'page=' . $data['page'];
		}
		$endpoint = $endpoint . '&order-by=' . $data['order-by'];
		$endpoint = $endpoint . '&order-direction=' . $data['order-direction'];

		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

	public function getPayment($paymentId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token')
		];

		$endpoint = '/api/v1/admin/dashboard/payment/getPayment/'. $paymentId;

		$result = request($endpoint, 'GET', null, $headers);

		return $result;
	}

	public function insertPayment($data)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$endpoint = '/api/v1/admin/dashboard/payment/create';

		$result = request($endpoint, 'POST', $data, $headers);

		return $result;
	}

	public function updatePayment($data, $paymentId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'application/json'
		];

		$endpoint = '/api/v1/admin/dashboard/payment/update/'. $paymentId;

		$result = request($endpoint, 'PUT', $data, $headers);

		return $result;
	}

	public function changePaymentThumbnail($data, $paymentId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
			'Content-Type' => 'multipart/form-data'
		];

		$endpoint = '/api/v1/admin/dashboard/payment/changePhoto/'.$paymentId;

		$result = request($endpoint, 'POST', $data, $headers);

		return $result;
	}

	public function deletePayment($paymentId)
	{
		$headers = [
			'accept' => 'application/json',
			'authorization' => $this->session->userdata('token'),
		];

		$endpoint = '/api/v1/admin/dashboard/payment/deactivePayment/' . $paymentId;

		$result = request($endpoint, 'DELETE', null, $headers);

		return $result;
		
	}
}

/* End of file Payment_model.php */
