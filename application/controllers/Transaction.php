<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Transaction_model', 'transaction');

		if (isNotLogin()) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Transaksi';
		$this->load->view('user/transaction/index', $data);
	}
	
	public function detail()
	{
		$data['title'] = 'Detail transaksi';
		$data['id'] = $this->uri->segment(3);
		$this->load->view('user/transaction/detail_transaction', $data);
	}

	public function getActiveTransaction()
	{
		$data = $this->input->get(null, true);

		$result = $this->transaction->getActiveTransaction($data);

		response($result, true);
	}

	public function getHistoryTransaction()
	{
		$data = $this->input->get(null, true);

		$result = $this->transaction->getHistoryTransaction($data);

		response($result, true);
	}

	public function getDetailTransaction()
	{
		$transactionId = $this->input->get('id', null);

		$result = $this->transaction->getDetailTransaction($transactionId);

		response($result, true);
	}

	public function uploadTransactionProof()
	{
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';

		$result = $this->transaction->uploadTransactionProof($data);

		response($result, true);
	}

	public function updateTransactionProof()
	{
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';

		$result = $this->transaction->updateTransactionProof($data);

		response($result, true);
	}
}
