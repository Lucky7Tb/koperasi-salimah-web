<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('isNotLogin')) {
	function isNotLogin()
	{
		// Get current CodeIgniter instance
		$CI = &get_instance();
		// We need to use $CI->session instead of $this->session
		$user = $CI->session->userdata('login');
		return !isset($user);
	}
}
