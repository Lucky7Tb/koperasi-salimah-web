<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!isLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}

		$this->load->model('admin/Payment_model', 'payment');
	}
	
	public function index()
	{
		$data['title'] = 'Metode pembayaran';
		$this->load->view('admin/payment/index', $data);
	}

	public function getPayments()
	{
		$data = $this->input->get(null, true);

		$result = $this->payment->getPayments($data);

		response($result, true);
	}

	public function getPayment()
	{
		$paymentId = $this->input->get('id', true);

		$result = $this->payment->getPayment($paymentId);

		response($result, true);
	}

	public function create()
	{
		$data['title'] = 'Tambah pembayaran';
		$this->load->view('admin/payment/create', $data);
	}

	public function insertPayment()
	{
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';

		$result = $this->payment->insertPayment($data);

		response($result, true);
	}

	public function edit()
	{
		$data['title'] = 'Edit pembayaran';
		$this->load->view('admin/payment/edit', $data);
	}

	public function updatePayment()
	{
		$paymentId = $this->input->get('id', true);
		$data = $this->input->post(null, true);

		$result = $this->payment->updatePayment($data, $paymentId);

		response($result, true);
	}

	public function changePaymentThumbnail()
	{
		$paymentId = $this->input->get('id', true);
		$data['file_key'] = 'photo';

		$result = $this->payment->changePaymentThumbnail($data, $paymentId);

		response($result, true);
	}

public function deletePayment()
	{
		$paymentId = $this->input->get('id', true);

		$result = $this->payment->deletePayment($paymentId);

		response($result, true);
	}
}

/* End of file Payment.php */
