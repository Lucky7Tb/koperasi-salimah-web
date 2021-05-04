<?php
function get_curl($endpoints, $token, array $params = null)
{
	$url = API . '/' . $endpoints;

	if ($params != null) {
		$url = API . '/' . $endpoints . '?';

		$i = 0;
		foreach ($params as $k => $v) {
			$url .= $k . '=' . $v;

			if ($i < count($params) - 1) {
				$url .= '&';
			}
		}
	}

//	echo $url;
//	die;

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_HTTPHEADER => array(
			'authorization:' . $token,
		),
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_RETURNTRANSFER => 1,
	));

	$result = json_decode(curl_exec($curl), 1);

	curl_close($curl);

	return $result;
}

function post_curl($endpoints, $data, $token = null, $json = false)
{
	$url = API . '/' . $endpoints;

	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, '1');

	if (isset($data['file_key'])) {
		$key = $data['file_key'];
		$tmpName = $_FILES[$key]['tmp_name'];
		$fileType = $_FILES[$key]['type'];
		$fileName = $_FILES[$key]['name'];
		$data[$key] = curl_file_create($tmpName, $fileType, $fileName);
		unset($data['file_key']);
	}

	if ($json) {
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Authorization:' . $token,
			'Content-Type: application/json'
		));
		$data = json_encode($data);
	} else {
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Authorization:' . $token
		));
	}

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_BUFFERSIZE, '10');

	$result = json_decode(curl_exec($curl), 1);

	if (curl_errno($curl)) {
		curl_close($curl);
		return 'Error:' . curl_error($curl);
	}
	curl_close($curl);

	return $result;
}

function put_curl($endpoints, $id, $data, $token)
{
	$url = API . '/' . $endpoints . '/' . $id;

	$data = json_encode($data);

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_HTTPHEADER => array(
			'authorization:' . $token,
		),
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_BUFFERSIZE => 10,
		CURLOPT_POST => 1,
		CURLOPT_RETURNTRANSFER => 1,
	));

	$result = json_decode(curl_exec($curl), 1);

	curl_close($curl);

	return $result;
}

function delete_curl($endpoints, $id, $token)
{
	$url = API . '/' . $endpoints . '/' . $id;

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_CUSTOMREQUEST => 'DELETE',
		CURLOPT_HTTPHEADER => array(
			'Authorization:' . $token,
		),
	));

	$result = json_decode(curl_exec($curl), 1);

	curl_close($curl);

	return $result;
}
