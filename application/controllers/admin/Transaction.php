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
		$this->load->view('admin/transaction/index', $data);
	}

	public function detailTrasaction()
	{
		$data['title'] = 'Detail transaksi';
		$this->load->view('admin/transaction/detail', $data);
	}

	public function getTransactions()
	{
		$data = $this->input->get(null, true);
		
		$result = $this->transaction->getTransactions($data);

		response($result, true);
	}

	public function getTransactionWithProof()
	{
		$data = $this->input->get(null, true);
		
		$result = $this->transaction->getTransactionWithProof($data);

		response($result, true);
	}

	public function getDetailTransaction()
	{
		$idTransaction = $this->input->get('id', true);

		$result = $this->transaction->getDetailTransaction($idTransaction);
		
		response($result, true);
	}

	public function changeTransactionStatus()
	{
		$data = $this->input->post(null, true);

		$result = $this->transaction->changeTransactionStatus($data);
		
		response($result, true);
	}

	public function changeTransactionProofStatus()
	{
		$data = $this->input->post(null, true);

		$result = $this->transaction->changeTransactionWithProof($data);

		response($result, true);
	}

}

/* End of file Transaction.php */
