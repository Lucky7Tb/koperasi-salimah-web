<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title><?= SITE_NAME . ' | ' . $title ?></title>
		<link rel="shortcut icon" href="<?= base_url('dist/images/logo2.png') ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<input type="hidden" value="<?= base_url() ?>" id="base-url">
		<link rel="stylesheet" href="<?= base_url('dist/vendors/tata/index.css') ?>">
		<link rel="stylesheet" href="<?= base_url('dist/admin/assets/css/styles.css') ?>">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
		</script>
		<?= isset($css) ? $css : ''; ?>
	</head>
	<body class="sb-nav-fixed">
		<?php $this->load->view('admin/template/navbar'); ?>
		
		<div id="layoutSidenav">
			<?php $this->load->view('admin/template/sidebar'); ?>
			<div id="layoutSidenav_content">
				<main>
