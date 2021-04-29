<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('response')) {
	function response($response, $encoded = false)
	{

		if ($encoded) {
			die(json_encode($response));
		}

		die($response);
	}
}
