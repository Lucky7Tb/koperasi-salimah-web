<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Wishlist';
		$this->load->view('user/wishlist/index', $data);
	}
}
