<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {

	private $token;

	public function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
	}

	public function getWishlist()
	{
		$endpoint = 'api/v1/user/wishlist/getWishlist';

		$result = get_curl($endpoint, $this->token);

		return $result;
	}

	public function addWishlist($data)
	{
		$endpoint = 'api/v1/user/wishlist/addWishlist';

		$result = post_curl($endpoint, $data, $this->token, true);

		return $result;
	}

	public function deleteWishlist($idWishlist)
	{
		$endpoint = 'api/v1/user/wishlist/deleteWishlist';

		$result = delete_curl($endpoint, $idWishlist, $this->token);

		return $result;
	}
}

/* End of file Wishlist_model.php */
/* Location: ./application/models/Wishlist_model.php */
