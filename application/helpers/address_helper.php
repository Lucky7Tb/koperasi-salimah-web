<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('haveAddress')) {
	function haveAddress()
	{
		// Get current CodeIgniter instance
		$CI = &get_instance();
		// We need to use $CI->session instead of $this->session
		return $CI->session->userdata('have_address');
	}
}
