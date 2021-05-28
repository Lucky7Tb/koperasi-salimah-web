<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
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
		$this->load->model('admin/Delivery_model', 'pengiriman');
	}

	public function index($page = 1, $search = null)
	{
		$data['title'] = 'Pengiriman';

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

		$config['base_url'] = base_url('admin/delivery/index');
		$config['first_url'] = base_url('admin/delivery/index/1/') . $search;
		$config['suffix'] = '/' . $search;

		$data['total'] = $this->pengiriman->countAllDelivery($params['search']);
		$config['total_rows'] = $data['total'];

		// initialize
		$this->pagination->initialize($config);

		$data['pengiriman'] = $this->pengiriman->getAllDelivery($params);
		$data['page'] = $page * 10;

		$this->load->view('admin/delivery/index', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Pengiriman';

		$this->form_validation->set_rules('name_expedition', 'Nama ekspedisi', 'required|trim');
		$this->form_validation->set_rules('courier_code', 'Nama ekspedisi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/delivery/add', $data);
		} else {
			$data = $this->input->post(null, true);
			$data['file_key'] = 'photo';

			if ($this->pengiriman->createCourier($data)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Layanan pengiriman berhasil ditambah</div>');

				redirect('admin/delivery');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Layanan pengiriman gagal ditambah</div>');

				redirect('admin/delivery');
			}
		}
	}

	public function hapus($id)
	{
		if ($this->pengiriman->deactiveDelivery($id)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengiriman berhasil dihapus</div>');

			redirect('admin/delivery');
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pengiriman gagal dihapus</div>');

		redirect('admin/delivery');
	}

	public function ubah($id)
	{
		$data['title'] = 'Ubah Pengiriman';

		$data['pengiriman'] = $this->pengiriman->getDelivery($id);

		$this->form_validation->set_rules('name_expedition', 'Nama ekspedisi', 'required|trim');
		$this->form_validation->set_rules('courier_code', 'Nama ekspedisi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/delivery/edit', $data);
		} else {
			$data = $this->input->post(null, true);
			$img['file_key'] = 'photo';

			if ($this->pengiriman->updateCourier($id, $data)) {

				if (isset($_FILES) && $_FILES[$img['file_key']]['size'] > 0) {
					$this->pengiriman->changeCourierPhoto($id, $img);
				}

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Layanan pengiriman berhasil diubah</div>');

				redirect('admin/delivery');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Layanan pengiriman gagal diubah</div>');

				redirect('admin/delivery');
			}
		}
	}
}

/* End of file Delivery.php */
