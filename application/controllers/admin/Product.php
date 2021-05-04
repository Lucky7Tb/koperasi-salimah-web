<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('auth');
		}
		$this->token = $this->session->userdata('token');

		$this->load->model('Product_model', 'produk');
		$this->load->model('Category_model', 'category');
	}

	public function index()
	{
		$data['title'] = 'Produk';

		$params = array('page' => '0');

		$data['produk'] = $this->produk->getAllProducts($this->token, $params);

		$this->load->view('admin/product/index', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Produk';

		$data['category'] = $this->category->getAllCategories($this->token);

		$error = array(
			'required' => '{field} harus diisi',
			'numeric' => '{filed} harus angka'
		);

		$this->form_validation->set_rules('product_name', 'Nama produk', 'trim|required|alpha_numeric', $error);
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
			$data['categories'] = '[' . $this->input->post('categories') . ']';
			$data['file_key'] = 'cover';


			if ($this->produk->createProduct($data, $this->token)) {
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
		if ($this->produk->deteleProduct($id, $this->token)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk berhasil dihapus</div>');

			redirect('admin/product');
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal dihapus</div>');

		redirect('admin/product');
	}
}

/* End of file Product.php */
