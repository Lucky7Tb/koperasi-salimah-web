<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Pembelian extends CI_Controller {

	public function index()
	{
		$this->load->view('detail_pembelian');
	}
}
