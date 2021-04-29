<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('/login', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->view('admin/product/index');
	}

	public function list_product()
	{
		$this->load->model('Product_model', 'produk');

		$data['title'] = SITE_NAME. ' | List Produk';
		$data['isi'] = $this->produk->getAllProducts($this->session->userdata('token'));

		$this->load->view('admin/list_produk', $data);
	}

	public function tambah_produk()
	{
		$data['title'] = SITE_NAME. ' | Tambah Produk';
		$this->load->view('admin/tambah_produk', $data);
	}
}

/* End of file Product.php */
