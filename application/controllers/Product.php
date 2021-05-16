<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
		$this->load->model('Product_model','produk');
		$this->load->model('admin/Category_model', 'category');
		
	}

	public function index()
	{
		$data['title'] = 'Produk';
		$this->load->view('user/product/index', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Detail produk';
		$data['produk'] = $this->produk->getProductUser($id, $this->token);
		$data['category'] = $this->category->getAllCategories($this->token);
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
