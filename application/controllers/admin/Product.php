<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$data['title'] = 'Produk';

		$this->load->model('Product_model', 'produk');

		$token = $this->session->userdata('token');

		$data['produk'] = $this->produk->getAllProducts($token);

		$this->load->view('admin/product/index', $data);
	}
}

/* End of file Product.php */
