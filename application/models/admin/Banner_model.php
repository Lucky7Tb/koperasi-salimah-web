<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		
		$this->token = $this->session->userdata('token');
	}

	public function getBanners()
	{
		$endpoint = 'api/v1/admin/dashboard/banner/getBanners';

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function getOneBanner($idBanner)
	{
		$endpoint = 'api/v1/admin/dashboard/banner/getBanner/'.$idBanner;

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function createBanner($data)
	{
		$endpoint = 'api/v1/admin/dashboard/banner/create';

		$result = post_curl($endpoint, $data, $this->token);

		return $result;
	}

	public function deleteBanner($idBanner)
	{
		$endpoint = 'api/v1/admin/dashboard/banner/deleteBanner';

		$result = delete_curl($endpoint, $idBanner, $this->token);

		return $result;
	}

}

/* End of file Banner_model.php */
/* Location: ./application/models/admin/Banner_model.php */