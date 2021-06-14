<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getPayments($data)
	{
		$data['search'] = urlencode($data['search']);
		
		$endpoint = "api/v1/admin/dashboard/payment/getPayments";

		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}

	public function getPayment($paymentId)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/getPayment/'. $paymentId;

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function insertPayment($data)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/create';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function updatePayment($data, $paymentId)
	{
		$endpoint = 'api/v1/admin/dashboard/payment/update';

		$result = put_curl($endpoint, $paymentId, $data, $this->token);

		return $result;
	}

	public function changePaymentThumbnail($data, $paymentId)
	{
		$endpoint = '/api/v1/admin/dashboard/payment/changePhoto/'.$paymentId;

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function deletePayment($paymentId)
	{
		$endpoint = '/api/v1/admin/dashboard/payment/deactivePayment';

		$result = delete_curl($endpoint, $paymentId, $this->token);

		return $result;
		
	}
}

/* End of file Payment_model.php */
