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
		$this->load->view('admin/product_categories/index');
	}

}

/* End of file ProductCategories.php */
