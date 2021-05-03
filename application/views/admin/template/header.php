<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?= SITE_NAME . ' | ' . $title ?></title>
	<link rel="shortcut icon" href="<?= base_url('img/logo2.png') ?>"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<input type="hidden" value="<?= base_url() ?>" id="base-url">

	<!-- START: Main CSS-->
	<link rel="stylesheet" href="<?= base_url('dist/vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/css/main.css') ?>">
	<!-- END: Main CSS-->

	<link rel="stylesheet" href="<?= base_url('dist/vendors/toastr/toastr.min.css') ?>">

	<!-- START: Costume CS -->
	<link rel="stylesheet" href="<?= base_url('dist/css/styles.css') ?>">
	<!-- END: Costume CSS -->

	<!-- START: Icons CSS-->
	<link rel="stylesheet" href="<?= base_url('dist/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
	<!-- END: Icons CSS-->

	<!-- Other css -->
	<?= isset($css) ? $css : ''; ?>
</head>

<body id="main-container" class="default">

<!-- START: Pre Loader-->
<div class="se-pre-con">
	<div class="loader"></div>
</div>
<!-- END: Pre Loader-->

<!-- START: Navbar-->
<?php $this->load->view('admin/template/navbar'); ?>
<!-- END: Navbar-->

<!-- START: Sidenav -->
<?php $this->load->view('admin/template/sidebar'); ?>
<!-- END: Sidenav -->

<!-- START: Main Content-->
<main>
