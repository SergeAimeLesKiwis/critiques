<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- BOOTSTRAP -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
		
<!-- SITE -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles/site.css" />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/site.js"></script>

<!-- SPECIFIC -->
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
					<a class="navbar-brand" href="#">Le Club des Critiques</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><?php echo anchor('/', 'Accueil', 'title="Accueil"'); ?></li>
						<li><?php echo anchor('/item/index', 'Contenus', 'title="Voir les différentes oeuvres"'); ?></li>
						<li><?php echo anchor('/room/index', 'Salons', 'title="Voir les différents salons"'); ?></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">	
						<li><?php 
							if ($this->session->user) { 
								echo '<li>'.anchor('/backend/index', 'Administration', 'title="Administrer l\'application"').'</li>';
							}
						?></li>
						<li><?php echo anchor('/profil/index', 'Mon compte / Se connecter', 'title="Mon compte"'); ?></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">