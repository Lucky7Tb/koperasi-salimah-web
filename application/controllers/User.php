<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
		$this->load->model('Product_model', 'produk');
	}

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Dashboard';

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

		$config['base_url'] = base_url('user/index');
		$config['first_url'] = base_url('user/index/1/') . $search;
		$config['suffix'] = '/' . $search;

		$data['total'] = $this->produk->countAllProductsUser($search);
		$config['total_rows'] = $data['total'];

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProductsUser($params);

		$this->load->view('index', $data);
	}

	// public function index($page = 1)
	// {
	// 	$data['title'] = 'Dashboard';
	// 	if ($page != null and $page > 0) {
	// 		$page--;
	// 	} else {
	// 		$page = 0;
	// 	}

	// 	$params = array(
	// 		'page' => $page
	// 		//'search' => $search
	// 	);

	// 	$config['base_url'] = base_url('index');
	// 	$config['first_url'] = base_url('index/1/');// . $search;
	// 	//$config['suffix'] = '/' . $search;

	// 	//$config['total_rows'] = $this->produk->gettAllProductsUser($search);

	// 	$this->pagination->initialize($config);

	// 	$data['produk'] = $this->produk->getAllProductsUser($this->token);
	// 	$this->load->view('index', $data);
	// }

	// public function index()
	// {
	// 	$data['title'] = 'Dashboard';
	// 	$data['produk'] = $this->produk->getAllProductsUser($this->token);
	// 	$this->load->view('index', $data);
	// }

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

//		$config['first_url'] = base_url('admin/product/index/1/') . $search;
//		$config['suffix'] = '/' . $search;

		$totalData = $this->produk->countAllProductsUser($params['search']);
		$config['total_rows'] = $totalData;

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProductsUser($params);
		$data['pagination'] = $this->pagination->create_links();
		$data['page'] = $page;

//		echo json_encode($data);
		var_dump($data);
	}
}
