<!DOCTYPE html>
<html class="has-navbar-fixed-top">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>REGIOS</title>
		<link rel="stylesheet" href="<?php echo base_url('asset/css/bulma.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/css/all.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/css/bulma-calendar.min.css'); ?>">
		<script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('asset/js/angular.min.js'); ?>"></script>
		<script src="<?php echo base_url('asset/js/dirPagination.js'); ?>"></script>
		<script src="<?php echo base_url('asset/js/bulmadropdown.js'); ?>"></script>
		<script src="<?php echo base_url('asset/js/bulma-calendar.min.js'); ?>"></script>
	</head>
	
	<body ng-app="app" ng-controller="ctrl" ng-cloak>
	
		<nav class="navbar is-fixed-top is-info" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<a class="navbar-item" href="<?php echo site_url('control/home'); ?>">
			<span class="icon is-medium has-text-white">
				<i class="fas fa-2x fa-layer-group"></i>
			</span>
			<span class="has-text-weight-bold is-size-4">&nbsp;Admin FRM</span>
		</a>
		<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	</div>
	<div class="navbar-menu">
		<div class="navbar-start">
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link">
					Administrasi
				</a>
				<div class="navbar-dropdown">
					<a class="navbar-item" href="<?php echo site_url('control/createadmin'); ?>">
						Masuk Administrasi
					</a>
					<a class="navbar-item" href="<?php echo site_url('control/listadmin'); ?>">
						Laporan Administrasi
					</a>
				</div>
			</div>			
		</div>
		
		<div class="navbar-end">
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link is-arrowless">
					<span class="icon has-text-white">
						<i class="fas fa fa-user"></i>
					</span>
				</a>
				<div class="navbar-dropdown is-right">
					<div class="navbar-item">
						<i class="fas fa fa-user"></i>&nbsp;<?php echo $username; ?>
					</div>
					<hr class="navbar-divider">
					<a class="navbar-item" href="<?php echo site_url('control/userprofile'); ?>">
						<i class="fas fa fa-edit"></i>&nbsp;User Profile
					</a>
					<a class="navbar-item" href="<?php echo site_url('control/logout'); ?>">
						<i class="fa fa-sign-out-alt"></i>&nbsp;Keluar
					</a>
				</div>
			</div>
			<div class="navbar-item">
				<span class="has-text-weight-bold is-size-6"><?php echo $subtitle; ?></span>
			</div>
		</div>
	</div>
</nav>