<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getTransactions($data)
	{
		$data['search'] = urlencode($data['search']);

		$endpoint = 'api/v1/admin/dashboard/transaction/listTransaction';

		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}
	
	public function getTransactionWithProof($data)
	{
		$data['search'] = urlencode($data['search']);
		
		$endpoint = 'api/v1/admin/dashboard/transaction/listTransactionWithProof';

		$result = get_curl($endpoint, $this->token, $data);

		return $result;
	}

	public function getDetailTransaction($idTransaction)
	{
		$endpoint = 'api/v1/admin/dashboard/transaction/detailTransaction/'.$idTransaction;
		
		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function changeTransactionStatus($data)
	{
		$endpoint = 'api/v1/admin/dashboard/transaction/changeStatusTransaction';

		$result = put_curl($endpoint, $data['id'], $data, $this->token);

		return $result;
	}

	public function changeTransactionWithProof($data)
	{
		$endpoint = 'api/v1/admin/dashboard/transaction/changeStatusProof';

		$result = put_curl($endpoint, $data['transaction-proof-id'], $data, $this->token);

		return $result;
	}

	public function downloadTransaction($data)
	{
		$endpoint = 'api/v1/admin/dashboard/Transaction/downloadTransaction';

		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}
}

/* End of file Transaction_model.php */
