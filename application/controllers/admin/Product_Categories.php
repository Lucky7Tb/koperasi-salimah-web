<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (isNotLogin()) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('admin/product_categories/index');
	}

}

/* End of file ProductCategories.php */
