<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

	public function getActiveTransaction($data)
	{
		$endpoint = 'api/v1/user/transaction/listActiveTransaction';
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token, $data);

		return $result;
	}

	public function getHistoryTransaction($data)
	{
		$endpoint = 'api/v1/user/transaction/listHistoryTransaction';
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token, $data);

		return $result;
	}

	public function getDetailTransaction($transactionId)
	{
		$endpoint = 'api/v1/user/transaction/detailTransaction/'.$transactionId;
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token);

		return $result;
	}

	public function uploadTransactionProof($data)
	{
		$endpoint = 'api/v1/user/transaction/uploadProof';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}

	public function updateTransactionProof($data)
	{
		$endpoint = 'api/v1/user/transaction/changeProof';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token);

		return $result;
	}
}

/* End of file Order_model.php */
/* Location: ./application/models/Order_model.php */
