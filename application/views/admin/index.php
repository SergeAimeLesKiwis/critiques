<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-home">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Page d'accueil</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-home">
		<?php
			$home['concept'] = $concept;
			$home['highlights'] = $highlights;
			$home['items'] = $items;
			$this->load->view('admin/_home', $home); 
		?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-add-item">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Ajouter du contenu</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-add-item">
		<?php //$this->load->view('admin/_home', array('XXX' => $XXX)); ?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-update-item">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Modifier du contenu</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-update-item">
		<?php //$this->load->view('admin/_home', array('XXX' => $XXX)); ?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-types-categories">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Types / Catégories</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-types-categories">
		<?php //$this->load->view('admin/_home', array('XXX' => $XXX)); ?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-rooms">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Salons</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-rooms">
		<?php //$this->load->view('admin/_home', array('XXX' => $XXX)); ?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading toggle-slide" data-slide="#admin-users">
		<div class="row">
			<div class="col-sm-11">
				<h3 class="panel-title">Utilisateurs</h3>
			</div>

			<div class="col-sm-1">
				<span class="glyphicon glyphicon-plus slide-toggle-icon" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
			</div>
		</div>
	</div>
	<div class="panel-body" id="admin-users">
		<?php //$this->load->view('admin/_home', array('XXX' => $XXX)); ?>
	</div>
</div>