<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {

	public function getWishlist()
	{
		$endpoint = 'api/v1/user/wishlist/getWishlist';
		$token = $this->session->userdata('token');

		$result = get_curl($endpoint, $token);

		return $result;
	}

	public function addWishlist($data)
	{
		$endpoint = 'api/v1/user/wishlist/addWishlist';
		$token = $this->session->userdata('token');

		$result = post_curl($endpoint, $data, $token, true);

		return $result;
	}

	public function deleteWishlist($idWishlist)
	{
		$endpoint = 'api/v1/user/wishlist/deleteWishlist';
		$token = $this->session->userdata('token');

		$result = delete_curl($endpoint, $idWishlist, $token);

		return $result;
	}
}

/* End of file Wishlist_model.php */
/* Location: ./application/models/Wishlist_model.php */
