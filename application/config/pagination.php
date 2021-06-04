<?php
$config['per_page'] = 10;

$config['uri_segment'] = 4;

//$config['enable_query_strings'] = TRUE;
//$config['query_string_segment'] = 'page';
//$config['page_query_string'] = TRUE;
$config['use_page_numbers'] = TRUE;
//$config['reuse_query_string'] = TRUE;

// styling pagination
$config['full_tag_open'] = '<div class="row">
							<div class="col-12 col-sm-12">
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-center">';
$config['full_tag_close'] = '</ul>
								</nav>
							</div>
						</div>';

$config['first_link'] = 'First';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li>';

$config['attributes'] = array('class' => 'page-link');