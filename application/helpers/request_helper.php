<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('request')) {
	function request($endpoint, $method, $data, $optionHeader)
	{
		$ch = curl_init();

		$url = 'http://213.190.4.40/koperasi-salimah-backend/index.php'. $endpoint;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$headers = [];
		foreach ($optionHeader as $key => $value) {
			$headers[] = $key .': '. $value;
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		if ($method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, 1);
		} else {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		}

		if (isset($optionHeader['Content-Type'])) {
			if ($optionHeader['Content-Type'] == 'application/json') {
				$data = json_encode($data);
			}
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		
		return $result;
	}
}
