<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('auth');
		}
	}
	
	public function index()
	{
		$data['title'] = 'Pembayaran';
		$this->load->view('admin/payment/index', $data);
	}

}

/* End of file Payment.php */
