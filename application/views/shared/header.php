<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/mdb.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/toastr.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles/site.css" />

		<?php foreach ($styles as $style) { 
			echo '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/css/'.$style.'.css" />';
		} ?>
	</head>

	<body>
		<!--Navbar-->
		<nav class="navbar navbar-toggleable-md navbar-dark bg-primary bg-darkgrey-color">
		    <div class="container">
		        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		        </button>
		        <a class="navbar-brand" href="<?php echo base_url('home') ?>">
		            <img src="<?php echo base_url(); ?>assets/img/logo_white.png" alt="logo" height="57"/>
		        </a>
		        <div class="collapse navbar-collapse" id="navbarNav1">
		            <ul class="navbar-nav mr-auto">		            
		                <li class="nav-item">
		                    <a class="nav-link" href="<?php echo base_url('item') ?>">Contenus</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="<?php echo base_url('room') ?>">Salons</a>
		                </li>
		            </ul>
		            <ul class="navbar-nav">
						<?php if ($isAdmin) { ?>
							<li class="nav-item"><a href="<?php echo base_url('admin'); ?>" class="nav-link">Adminitration</a></li>
						<?php } ?>

						<?php if ($isLogged) { ?>
							<li class="nav-item"><a href="<?php echo base_url('/'); ?>" class="nav-link">Mon compte</a></li>
						<?php } else { ?>
								echo '<li class="nav-item"><a href="<?php echo base_url('/'); ?>" class="nav-link">Mon compte</a></li>
						<?php } ?>
						?>
					</ul>
		        </div>
		    </div>
		</nav>

		<div id="body-content">