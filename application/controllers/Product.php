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

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Produk';

		if ($page != null and $page > 0) {
			$page--;
		} else {
			$page = 0;
		}

		if ($search != null) {
			$data['key'] = $search;
		} else {
			$data['key'] = '';
		}

		$params = array(
			'page' => $page,
			'search' => $search
		);

		$config['base_url'] = base_url('product/index');
		$config['first_url'] = base_url('product/index/1/') . $search;
		$config['suffix'] = '/' . $search;
		$config['uri_segment'] = 2;

		$data['total'] = $this->produk->countAllProductsUser($search);
		$config['total_rows'] = $data['total'];

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProductsUser($params);

		$this->load->view('user/product/index', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Detail produk';
		$data['produk'] = $this->produk->getDetailProduct($id, $this->token);
		$data['category'] = $this->category->getAllCategories();
		$this->load->view('user/product/detail_product', $data);
	}

	public function getDetailProduct()
	{
		$idProduct = $this->input->get('id', true);

		$result = $this->product->getDetailProduct($idProduct);
		
		response($result, true);
	}
	public function data($page = 1, $search = null)
	{
		if ($this->uri->segment(4)) {
			$page = $this->uri->segment(4) - 1;
		} else {
			$page--;
		}

		$params = array(
			'page' => $page,
			'search' => $search
		);

		$totalData = $this->produk->countAllProductsUser($params['search']);
		$config['total_rows'] = $totalData;

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProductsUser($params);
		$data['pagination'] = $this->pagination->create_links();
		$data['page'] = $page;

		var_dump($data);
	}

}

/* End of file Product.php */
