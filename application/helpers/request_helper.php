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
			if ($value == 'multipart/form-data') {
				$delimiter = "-------------" . uniqid();
				$headers[] = $key . ': ' . $value. '; boundary='. $delimiter;
			}
			$headers[] = $key .': '. $value;
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		if (isset($optionHeader['Content-Type'])) {
			if ($optionHeader['Content-Type'] == 'application/json') {
				$data = json_encode($data);
			} elseif($optionHeader['Content-Type'] == 'multipart/form-data') {
				$key = $data['file_key'];
				$tmpName =  $_FILES[$key]['tmp_name'];
				$fileName =  $_FILES[$key]['name'];
				$fileType =  $_FILES[$key]['type'];
				$data['photo'] = curl_file_create($tmpName, $fileType, $fileName);
				unset($data['file_key']);
			}
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		if ($method == 'POST') {
			curl_setopt($ch, CURLOPT_POST, 1);
		} else {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		}

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		
		return $result;
	}
}
