<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_Password extends CI_Controller {

	public function index()
	{
		$this->load->view('forget_password');
	}
}
