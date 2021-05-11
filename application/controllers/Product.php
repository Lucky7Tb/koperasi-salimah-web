<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Produk';
		$this->load->view('user/product/index', $data);
	}

	public function detail()
	{
		$data['title'] = 'Detail produk';
		$this->load->view('user/product/detail_product', $data);
	}

}

/* End of file Product.php */
