<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{	
	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
		$this->load->model('Product_model','produk');
		
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['produk'] = $this->produk->getAllProductsUser($this->token);
		$this->load->view('index', $data);
	}
}
