<!DOCTYPE html>
<html>

<head>
	<title><?= SITE_NAME . ' | ' . $title ?></title>
	<link rel="shortcut icon" href="<?= base_url('img/logo2.png') ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<input type="hidden" value="<?= base_url() ?>" id="base-url">

	<!-- START: Template CSS-->
	<link rel="stylesheet" href="<?= base_url('dist/vendors/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('dist/vendors/simple-line-icons/css/simple-line-icons.css') ?>">

	<!-- START: Custom CSS-->
	<link rel="stylesheet" href="<?= base_url('dist/css/main.css') ?>">
	<!-- END: Custom CSS-->

	<!-- css buatan sendiri -->
	<link rel="stylesheet" href="<?= base_url('dist/css/styles.css') ?>">
	<!-- css buatan sendiri -->
	<?= isset($css) ? $css : '' ?>
</head>

<body id="main-container" class="default horizontal-menu">
	<?php $this->load->view('template/navbar'); ?>
	<main>
