<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Order';
		$this->load->view('user/order/index', $data);
	}
	
	public function detail()
	{
		$data['title'] = 'Detail order';
		$this->load->view('user/order/detail_order', $data);
	}
}
