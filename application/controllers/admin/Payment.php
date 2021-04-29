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
		$this->load->view('admin/payment/index');
	}

}

/* End of file Payment.php */
