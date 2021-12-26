<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

	private $token;
	private $rajaOngkirKey = 'b6c970c10f811f37c2566defe70f76a7';

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getActiveTransaction($data)
	{
		$endpoint = 'api/v1/user/transaction/listActiveTransaction';
	
		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}

	public function getHistoryTransaction($data)
	{
		$endpoint = 'api/v1/user/transaction/listHistoryTransaction';

		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}

	public function getDetailTransaction($transactionId)
	{
		$endpoint = 'api/v1/user/transaction/detailTransaction/'.$transactionId;

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function uploadTransactionProof($data)
	{
		$endpoint = 'api/v1/user/transaction/uploadProof';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function updateTransactionProof($data)
	{
		$endpoint = 'api/v1/user/transaction/changeProof';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function confirmTransaction($transactionId)
	{
		$endpoint = 'api/v1/user/transaction/confirmTransaction/'.$transactionId;

		$result = post_curl($endpoint, [], $this->token);
		
		return $result;
	}

	public function trackResi($data)
	{
		$headers = [
			'key' => $this->rajaOngkirKey
		];

		$endpoint = 'https://pro.rajaongkir.com/api/waybill';

		$result = request($endpoint, 'POST', $data, $headers);

		return $result;
	}
}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
