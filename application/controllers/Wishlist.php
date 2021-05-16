<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Wishlist_model', 'wishlist');
		
		if (isNotLogin()) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Wishlist';
		$this->load->view('user/wishlist/index', $data);
	}

	public function getWishlist()
	{
		$result = $this->wishlist->getWishlist();

		response($result, true);
	}

	public function addWishlist()
	{
		$data = $this->input->post(null, true);
		
		$result = $this->wishlist->addWishlist($data);

		response($result, true);
	}

	public function deleteWishlist()
	{
		$wishlistId = $this->input->get('id', true);

		$result = $this->wishlist->deleteWishlist($wishlistId);
		
		response($result, true);
	}
}
