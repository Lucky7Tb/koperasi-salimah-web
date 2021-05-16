<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (isNotLogin()) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Cart';
		$this->load->view('user/cart/index', $data);
	}
	
	public function checkout()
	{
		$data['title'] = 'Checkout';
		$this->load->view('user/cart/checkout', $data);
	}
}
