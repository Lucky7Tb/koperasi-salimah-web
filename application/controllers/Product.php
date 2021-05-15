<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('user/Product_model', 'product');
	}
	

	public function index()
	{
		$data['title'] = 'Produk';
		$this->load->view('user/product/index', $data);
	}

	public function detail()
	{
		$data['title'] = 'Detail produk';
		$data['id'] = $this->uri->segment(3);
		$this->load->view('user/product/detail_product', $data);
	}

	public function getDetailProduct()
	{
		$idProduct = $this->input->get('id', true);

		$result = $this->product->getDetailProduct($idProduct);
		
		response($result, true);
	}
}

/* End of file Product.php */
