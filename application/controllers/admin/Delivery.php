<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
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

		$this->load->model('Delivery_model', 'pengiriman');
	}

	public function index()
	{
		$data['title'] = 'Pengiriman';

		$data['pengiriman'] = $this->pengiriman->getAllDelivery($this->token);

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

			if ($this->pengiriman->createCourier($data, $this->token)) {
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
		if ($this->pengiriman->deactiveDelivery($id, $this->token)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengiriman berhasil dihapus</div>');

			redirect('admin/delivery');
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pengiriman gagal dihapus</div>');

		redirect('admin/delivery');
	}
}

/* End of file Delivery.php */
