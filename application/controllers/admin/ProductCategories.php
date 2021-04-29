<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategories extends CI_Controller {

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
		$token = $this->session->userdata('token');

		$this->load->model('Delivery_model', 'category');

		$result = $this->category->getAllDelivery($token);

		var_dump($result);
		die;

		$this->load->view('admin/product_categories/index');
	}

}

/* End of file ProductCategories.php */
