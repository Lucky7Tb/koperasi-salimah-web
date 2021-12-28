<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $token;

	public function __construct()
	{
		parent::__construct();
		
		if (isAdmin()) {
			redirect('/admin');
		}

		$this->token = $this->session->userdata('token');
		$this->load->model('Product_model', 'produk');

		$this->load->model('Banner_model', 'banner');
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
		$config['attributes'] = array('class' => 'page-numbers');
		$config['next_link'] = '<i class="bx bx-chevron-right"></i>';
		$config['prev_link'] = '<i class="bx bx-chevron-left"></i>';
		$config['cur_tag_open'] = '<span class="page-numbers current" aria-current="page">';
		$config['cur_tag_close'] = '</span>';
		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProductsUser($params);
		$data['banners'] = $this->banner->getBanners();

		$this->load->view('index', $data);
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
