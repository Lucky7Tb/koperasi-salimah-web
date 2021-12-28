<!DOCTYPE html>
<html>

	<head>
		<title><?= SITE_NAME . ' | ' . $title ?></title>
		<link rel="shortcut icon" href="<?= base_url('dist/images/logo2.png') ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<input type="hidden" value="<?= base_url() ?>" id="base-url">

		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/animate.min.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/boxicons.min.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/meanmenu.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/style.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/user/assets/css/responsive.css')?>">
		<link rel="stylesheet" href="<?= base_url('dist/vendors/toastr/toastr.min.css') ?>">

		<!-- END: Custom CSS-->
		<?= isset($css) ? $css : '' ?>
	</head>

	<body id="main-container">
		<?php $this->load->view('user/template/navbar'); ?>
		<main>
