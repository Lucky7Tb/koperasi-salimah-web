<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('isAdmin')) {
	function isAdmin()
	{
		// Get current CodeIgniter instance
		$CI = &get_instance();
		// We need to use $CI->session instead of $this->session
		$level = $CI->session->userdata('level');
		return $level === 'admin';
	}
}
