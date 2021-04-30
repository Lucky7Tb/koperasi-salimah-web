<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_Categories extends CI_Controller
{

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
		$data['title'] = 'Kategori Produk';

		$this->load->model('Category_model', 'category');

		$token = $this->session->userdata('token');

		$data['kategori'] = $this->category->getAllCategories($token);

		$this->load->view('admin/product_categories/index', $data);
	}
}

/* End of file ProductCategories.php */
