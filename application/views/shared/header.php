<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/mdb.min.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles/site.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/site.js"></script>

		<?php foreach ($links as $link) { echo $link; } ?>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url('home') ?>">Le Club des Critiques</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url('item') ?>">Contenus</a></li>
						<li><a href="<?php echo base_url('room') ?>">Salons</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">	
						<li>
							<?php 
								if ($this->session->user) { 
									echo '<li><a href="'.base_url('admin').'">Adminitration</a></li>';
								}
							?>
						</li>
						<li><?php echo anchor('/profil/index', 'Mon compte / Se connecter', 'title="Mon compte"'); ?></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">