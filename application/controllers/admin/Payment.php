<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Payment_model', 'payment');
		
		if (isNotLogin()) {
			redirect('auth');
		}
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

		response($result);
	}

	public function getPayment()
	{
		$paymentId = $this->input->get('id');
		$result = $this->payment->getPayment($paymentId);

		response($result);
	}

	public function create()
	{
		$data['title'] = 'Tambah pembayaran';
		$this->load->view('admin/payment/create', $data);
	}

	public function insertPayment()
	{
		$data = $this->input->post(null, true);

		$tmpName =  $_FILES['photo']['tmp_name'];
		$fileName =  $_FILES['photo']['name'];
		$fileType =  $_FILES['photo']['type'];
		$data['photo'] = curl_file_create($tmpName, $fileType, $fileName);

		$result = $this->payment->insertPayment($data);

		response($result);
	}

	public function edit()
	{
		$data['title'] = 'Edit pembayaran';
		$this->load->view('admin/payment/edit', $data);
	}

	public function updatePayment()
	{
		$paymentId = $this->input->get('id');
		$data = $this->input->post(null, true);

		$result = $this->payment->updatePayment($data, $paymentId);

		response($result);
	}

	public function changePaymentThumbnail()
	{
		$paymentId = $this->input->get('id');

		$tmpName =  $_FILES['photo']['tmp_name'];
		$fileName =  $_FILES['photo']['name'];
		$fileType =  $_FILES['photo']['type'];
		$data['photo'] = curl_file_create($tmpName, $fileType, $fileName);

		$result = $this->payment->changePaymentThumbnail($data, $paymentId);

		response($result);
	}

public function deletePayment()
	{
		$paymentId = $this->input->get('id');

		$result = $this->payment->deletePayment($paymentId);

		response($result);
	}
}

/* End of file Payment.php */
