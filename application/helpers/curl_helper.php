<?php
function get_curl($endpoints, $token, array $params = null)
{
	$url = API . '/' . $endpoints;

	if ($params != null) {
		$url = API . '/' . $endpoints . '?';

		$key = array_keys($params);
		$i = 0;

		foreach ($key as $k) {
			$url .= $k . '=' . $params[$k];
			if ($i < count($params)-1) {
				$url .= '&';
			}
		}
	}

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_HTTPHEADER => array(
			'authorization:' . $token
		),
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_RETURNTRANSFER => 1
	));

	$result = json_decode(curl_exec($curl), 1);

	curl_close($curl);

	return $result;
}

function post_curl($endpoints, $data, $token)
{
	$url = API . '/' . $endpoints;

	$data = json_encode($data);

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_HTTPHEADER => array(
			'authorization:' . $token
		),
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_BUFFERSIZE => 10,
		CURLOPT_RETURNTRANSFER => 1
	));

	$result = json_decode(curl_exec($curl), 1);

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
			'authorization:' . $token
		),
		CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_BUFFERSIZE => 10,
		CURLOPT_POST => 1,
		CURLOPT_RETURNTRANSFER => 1
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
		CURLOPT_HTTPHEADER => array(
			'authorization:' . $token
		),
		CURLOPT_CUSTOMREQUEST => 'DELETE',
		CURLOPT_BUFFERSIZE => 10,
		CURLOPT_RETURNTRANSFER => 1
	));

	$result = json_decode(curl_exec($curl), 1);

	curl_close($curl);

	return $result;
}
