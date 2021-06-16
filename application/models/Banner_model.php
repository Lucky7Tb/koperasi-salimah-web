<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function getBanners()
	{
		$endpoint = 'api/v1/user/banner';

		$result = get_curl($endpoint, null);

		return $result;
	}

}

/* End of file Banner_model.php */
/* Location: ./application/models/Banner_model.php */