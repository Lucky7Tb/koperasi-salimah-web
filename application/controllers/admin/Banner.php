<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

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

		$this->load->model('admin/Banner_model', 'banner');
	}

	public function index()
	{
		$data['title'] = 'Banner';
		$this->load->view("admin/banner/index", $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah banner';
		$this->load->view("admin/banner/create", $data);
	}

	public function getBanners()
	{
		$result = $this->banner->getBanners();

		response($result, true);
	}

	public function getOneBanner()
	{
		$idBanner = $this->input->get('id', true);

		$result = $this->banner->getOneBanner($idBanner);

		response($result, true);
	}

	public function createBanner()
	{
		$data = $this->input->post(null, true);
		$data['file_key'] = 'photo';

		$result = $this->banner->createBanner($data);

		response($result, true);	
	}

	public function deleteBanner()
	{
		$idBanner = $this->input->post('idBanner', true);
		
		$result = $this->banner->deleteBanner($idBanner);

		response($result, true);
	}

}

/* End of file Banner.php */
/* Location: ./application/controllers/admin/Banner.php */
