<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (isAdmin()) {
			redirect('/admin');
		}

		$this->load->model('Wishlist_model', 'wishlist');
	}

	public function index()
	{
		if (!isLogin()) {
			redirect('auth');
		}

		$data['title'] = 'Wishlist';
		$this->load->view('user/wishlist/index', $data);
	}

	public function getWishlist()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$result = $this->wishlist->getWishlist();

		response($result, true);
	}

	public function addWishlist()
	{
		if (!isLogin()) {
			response(["code" => 401, "message" => "Harap login terlebih dahulu"], true);
		}

		$data = $this->input->post(null, true);
		
		$result = $this->wishlist->addWishlist($data);

		response($result, true);
	}

	public function deleteWishlist()
	{
		if (!isLogin()) {
			response(["code" => 403, "message" => "Harap login terlebih dahulu"], true);
		}

		$wishlistId = $this->input->get('id', true);

		$result = $this->wishlist->deleteWishlist($wishlistId);
		
		response($result, true);
	}
}
