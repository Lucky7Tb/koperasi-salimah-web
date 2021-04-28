<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('login_helper');

		if (isNotLogin()) {
			redirect('/login', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->view('admin/user/index');
	}

}

/* End of file User.php */
