<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (isNotLogin()) {
			redirect('auth');
		}
	}
	
	public function index()
	{
		$data['title'] = 'Pengiriman';

		$this->load->model('Delivery_model', 'delivery');

		$token = $this->session->userdata('token');

		$data['pengiriman'] = $this->delivery->getAllDelivery($token);

		$this->load->view('admin/delivery/index', $data);
	}

}

/* End of file Delivery.php */
