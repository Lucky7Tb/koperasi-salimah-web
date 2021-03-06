<?php

class Product_Categories extends CI_Controller
{
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

		$this->load->model('admin/Category_model', 'category');
	}

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Kategori Produk';

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

		$config['base_url'] = base_url('admin/product_Categories/index');
		$config['first_url'] = base_url('admin/product_Categories/index/1/') . $search;
		$config['suffix'] = '/' . $search;

		$data['total'] = $this->category->countAllCategory($params['search']);
		$config['total_rows'] = $data['total'];

		// initialize
		$this->pagination->initialize($config);

		$data['kategori'] = $this->category->getAllCategories($params);
		$data['page'] = $page * 10;

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

			if ($this->category->createCategory($data)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori produk berhasil ditambah</div>');

				redirect('admin/product_Categories');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kategori produk gagal ditambah</div>');

				redirect('admin/product_Categories');
			}
		}
	}

	public function hapus($id)
	{
		if ($this->category->deactiveCategory($id)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori produk berhasil dihapus</div>');

			redirect('admin/product_Categories');
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kategori produk gagal dihapus</div>');

		redirect('admin/product_Categories');
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Kategori Produk';

		$data['category'] = $this->category->getCategory($id);

		$this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/product_categories/edit', $data);
		} else {
			$data['category'] = $this->input->post('nama_kategori');
			$data['slug'] = strtolower($this->input->post('nama_kategori'));
			$data['description'] = $this->input->post('deskripsi');
			$data['is_visible'] = $this->input->post('status');

			if ($this->category->updateCategory($id, $data)) {

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori Produk berhasil diubah</div>');

				redirect('admin/product_Categories');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori Produk gagal diubah</div>');

				redirect('admin/product_Categories');
			}
		}
	}

	public
	function cari()
	{
//		$keyword = $this->input->post('keywords');
		echo "ok";
	}

}

/* End of file ProductCategories.php */
