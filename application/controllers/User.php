<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();

		if (!isLogin()) {
			redirect('auth');
		}

		if (isAdmin()) {
			redirect('/admin');
		}

		if (!haveAddress()) {
			redirect('/profile');
		}

		$this->load->model('Product_model','produk');		
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['produk'] = $this->produk->getAllProductsUser();
		$this->load->view('index', $data);
	}
}
