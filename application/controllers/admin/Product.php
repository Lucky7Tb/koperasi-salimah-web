<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	private $token;

	public function __construct()
	{
		parent::__construct();

		if (!isLogin()) {
			redirect('auth');
		}

		if (!isAdmin()) {
			redirect('/');
		}

		if (!haveAddress()) {
			redirect('/admin/profile');
		}

		$this->load->model('admin/Product_model', 'produk');
		$this->load->model('admin/Category_model', 'category');
	}

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Produk';

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
			'search' => $search,
			'order-by' => 'id_m_products',
			'order-direction' => 'DESC',
		);

		$config['base_url'] = base_url('admin/product/index');
		$config['first_url'] = base_url('admin/product/index/1/') . $search;
		$config['suffix'] = '/' . $search;

		$data['total'] = $this->produk->countAllProducts($search);
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

		$data['category'] = $this->category->getActiveCategory($this->token);

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
		$data['category'] = $this->category->getAllCategories();

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
			$data = $this->input->post(array('product_name', 'price', 'stock', 'weight', 'description', 'is_visible'), true);
			$data['slug'] = str_replace(' ', '-', strtolower($this->input->post('product_name')));
			$data['width'] = 1;
			$data['length'] = 1;
			$data['height'] = 1;

			$kategori['categories'] = $this->input->post('categories');

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

	public function foto($id)
	{
		$data['title'] = 'Foto';
		$data['produk'] = $this->produk->getProduct($id);
		$this->session->set_userdata('id_produk', $id);

		if ($data['produk']['code'] === 200) {
			$this->load->view('admin/product/foto', $data);
		}
	}

	public function hapusFoto($id)
	{
		$idProduk = $this->session->userdata('id_produk');
		if ($this->produk->deteleProductPhoto($id)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Foto Produk berhasil dihapus</div>');

			redirect('admin/product/foto/' . $idProduk);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Foto Produk gagal dihapus</div>');

			redirect('admin/product/foto/' . $idProduk);
		}
	}

	public function tambahPhoto($id)
	{
		$data['id_m_products'] = $id;
		$data['file_key'] = 'photo';

		$this->produk->addProductPhotos($data);

		echo base_url('admin/product/foto/').$id;
	}
}

/* End of file Product.php */
