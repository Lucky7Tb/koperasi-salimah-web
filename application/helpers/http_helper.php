<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('request')) {
	function request($endpoint, $method, $data)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, '213.190.4.40/koperasi-salimah-backend/index.php'.$endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		if ($method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, 1);
		} else {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		}

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		
		return $result;
	}
}
