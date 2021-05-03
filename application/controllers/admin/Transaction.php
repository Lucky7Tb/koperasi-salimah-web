<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		if (isNotLogin()) {
			redirect('auth');
		}
	}
	

	public function index()
	{
		$data['title'] = 'Transaksi';
		$this->load->view('admin/transaction/index', $data);
	}

}

/* End of file Transaction.php */
