<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	private $token;

	public function __construct()
	{
		parent::__construct();

		if (isNotLogin()) {
			redirect('auth');
		}
		$this->token = $this->session->userdata('token');

		$this->load->model('admin/Product_model', 'produk');
		$this->load->model('admin/Category_model', 'category');
	}

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Produk';

		if ($page != null AND $page > 0) {
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

		$config['base_url'] = base_url('admin/product/index');
		$config['first_url'] = base_url('admin/product/index/1/') . $search;
		$config['suffix'] = '/' . $search;

		$data['total'] = $this->produk->countAllProducts($params['search']);
		$config['total_rows'] = $data['total'];

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProducts($params);

		$this->load->view('admin/product/index', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Produk';

		$data['produk'] = $this->produk->getProduct($id);

		if ($data['produk']['code'] === 200) {
			$this->load->view('admin/product/detail', $data);
		}
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Produk';

		$data['category'] = $this->category->getAllCategories($this->token);

		$error = array(
			'required' => '{field} harus diisi',
			'numeric' => '{filed} harus angka',
		);

		$this->form_validation->set_rules('product_name', 'Nama produk', 'trim|required', $error);
		$this->form_validation->set_rules('price', 'Harga', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('weight', 'Berat', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required', $error);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/product/add', $data);
		} else {
			$data = $this->input->post(null, true);
			$data['slug'] = strtolower($this->input->post('product_name'));
			$data['width'] = 1;
			$data['length'] = 1;
			$data['height'] = 1;
			$data['categories'] = '[' . implode(',', $this->input->post('categories')) . ']';
			$data['file_key'] = 'cover';

			if ($this->produk->createProduct($data)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk berhasil ditambah</div>');

				redirect('admin/product');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal ditambah</div>');

				redirect('admin/product');
			}
		}
	}

	public function hapus($id)
	{
		if ($this->produk->deteleProduct($id)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk berhasil dihapus</div>');

			redirect('admin/product');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal dihapus</div>');

			redirect('admin/product');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Produk';

		$data['produk'] = $this->produk->getProduct($id);
		$data['category'] = $this->category->getAllCategories($this->token);

		$error = array(
			'required' => '{field} harus diisi',
			'numeric' => '{filed} harus angka'
		);

		$this->form_validation->set_rules('product_name', 'Nama produk', 'trim|required', $error);
		$this->form_validation->set_rules('price', 'Harga', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('weight', 'Berat', 'trim|required|numeric', $error);
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required', $error);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/product/edit', $data);
		} else {
			$data = $this->input->post(array('product_name', 'price', 'stock', 'weight', 'description'), true);
			$data['slug'] = str_replace(' ', '-', strtolower($this->input->post('product_name')));
			$data['width'] = 1;
			$data['length'] = 1;
			$data['height'] = 1;

			$kategori['categories'] = array($this->input->post('categories'));

			$photo['file_key'] = 'cover';

			if ($this->produk->updateProduct($id, $data) &&
				$this->produk->updateProductCategory($id, $kategori)) {

				if (isset($_FILES) && $_FILES[$photo['file_key']]['size'] > 0) {
					$this->produk->changeProductCover($id, $photo);
				}

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk berhasil diubah</div>');

				redirect('admin/product');

			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal diubah</div>');

				redirect('admin/product');
			}
		}
	}

//	public function data($page = 0, $keyword = '')
//	{
//		$params = array(
//			'search' => $keyword,
//			'page' => $page
//		);
//
//		$data['produk'] = $this->produk->getAllProducts($params);
//
//		if ($data['produk']['code'] === 200) {
//			$this->load->view('admin/product/data', $data);
//		}
//	}

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

		$totalData = $this->produk->countAllProducts($params['search']);
		$config['total_rows'] = $totalData;

		// initialize
		$this->pagination->initialize($config);

		$data['produk'] = $this->produk->getAllProducts($params);
		$data['pagination'] = $this->pagination->create_links();
		$data['page'] = $page;

//		echo json_encode($data);
		var_dump($data);
	}
}

/* End of file Product.php */
