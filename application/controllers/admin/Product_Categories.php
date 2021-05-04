<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_Categories extends CI_Controller
{
	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('auth');
		}

		$this->load->model('Category_model', 'category');
		$this->token = $this->session->userdata('token');
	}

	public function index()
	{
		$data['title'] = 'Kategori Produk';

		$data['kategori'] = $this->category->getAllCategories($this->token);

		$this->load->view('admin/product_categories/index', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Kategori Produk';

		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/product_categories/add', $data);
		} else {
			$namaKategori = $this->input->post('nama_kategori');
			$deskripsi = $this->input->post('deskripsi');

			$data = array(
				'category' => $namaKategori,
				'slug' => strtolower($namaKategori),
				'description' => $deskripsi
			);

			if ($this->category->createCategory($data, $this->token)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori produk berhasil ditambah</div>');

				redirect( 'admin/product_categories');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kategori produk gagal ditambah</div>');

				redirect( 'admin/product_categories');
			}
		}
	}

	public function hapus($id)
	{
		if ($this->category->deactiveCategory($id, $this->token)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori produk berhasil dihapus</div>');

			redirect( 'admin/product_categories');
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kategori produk gagal dihapus</div>');

		redirect( 'admin/product_categories');
	}

	public function cari()
	{
//		$keyword = $this->input->post('keywords');
		echo "ok";
	}
}

/* End of file ProductCategories.php */
