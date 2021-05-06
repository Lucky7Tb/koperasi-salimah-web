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

		$data['produk'] = $this->produk->getAllProducts($this->token);

		$this->load->view('admin/product/index', $data);
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
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal dihapus</div>');

			redirect('admin/product');
		}
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Produk';

		$data['produk'] = $this->produk->getProduct($id, $this->token);
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
			$data['slug'] = strtolower($this->input->post('product_name'));
			$data['width'] = 1;
			$data['length'] = 1;
			$data['height'] = 1;

			$kategori['categories'] = array($this->input->post('categories'));

			$photo['file_key'] = 'cover';

			if ($this->produk->updateProduct($id, $data, $this->token) &&
				$this->produk->updateProductCategory($id, $kategori, $this->token)) {

				if (isset($_FILES) && $_FILES[$photo['file_key']]['size'] > 0) {
					$this->produk->changeProductCover($id, $photo, $this->token);
				}

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Produk berhasil diubah</div>');

				redirect('admin/product');

			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Produk gagal diubah</div>');

				redirect('admin/product');
			}
		}
	}

	public function cari()
	{
		$data['title'] = 'Produk';

		$keyword = $this->input->post('keyword');

		$params = array('search' => $keyword);

		$data['produk'] = $this->produk->getAllProducts($this->token, $params);

		echo $this->load->view('admin/product/index', $data);
	}
}

/* End of file Product.php */
