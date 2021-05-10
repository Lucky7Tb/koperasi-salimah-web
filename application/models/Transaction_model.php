<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

	public function getTransactions($data)
	{
		$token = $this->session->userdata('token');
		$endpoint = 'api/v1/admin/dashboard/transaction/listTransaction';

		$result = get_curl($endpoint, $token, $data);

		return $result;
	}
	
	public function getTransactionWithProof($data)
	{
		$token = $this->session->userdata('token');
		$endpoint = 'api/v1/admin/dashboard/transaction/listTransactionWithProof';

		$result = get_curl($endpoint, $token, $data);

		return $result;
	}

	public function getDetailTransaction($idTransaction)
	{
		$token = $this->session->userdata('token');
		$endpoint = 'api/v1/admin/dashboard/transaction/detailTransaction/'.$idTransaction;
		
		$result = get_curl($endpoint, $token);

		return $result;
	}

	public function changeTransactionStatus($data)
	{
		$token = $this->session->userdata('token');
		$endpoint = 'api/v1/admin/dashboard/transaction/changeStatusTransaction';

		$result = put_curl($endpoint, $data['id'], $data, $token);

		return $result;
	}

	public function changeTransactionWithProof($data)
	{
		$token = $this->session->userdata('token');
		$endpoint = 'api/v1/admin/dashboard/transaction/changeStatusProof';

		$result = put_curl($endpoint, $data['transaction-proof-id'], $data, $token);

		return $result;
	}
}

/* End of file Transaction_model.php */
