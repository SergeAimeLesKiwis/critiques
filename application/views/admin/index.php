<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-tabs md-pills pills-primary flex-column" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#admin-home" role="tab"><i class="fa fa-user"></i> Page d'accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-static" role="tab"><i class="fa fa-user"></i> Pages statiques</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-types-categories" role="tab"><i class="fa fa-user"></i> Types / Catégories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-add-item" role="tab"><i class="fa fa-user"></i> Ajouter du contenu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-update-item" role="tab"><i class="fa fa-user"></i> Modifier du contenu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-rooms" role="tab"><i class="fa fa-user"></i> Salons</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin-users" role="tab"><i class="fa fa-user"></i> Utilisateurs</a>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="tab-content vertical">
			<div class="tab-pane fade in show active" id="admin-home" role="tabpanel">
				<br />
				<p>
					<?php
						$home['concept'] = $concept;
						$home['highlights'] = $highlights;
						$home['items'] = $items;
						$this->load->view('admin/_home', $home); 
					?>
				</p>
			</div>
			<div class="tab-pane fade" id="admin-static" role="tabpanel">
				<br />
				<p>STATIC</p>
			</div>
			<div class="tab-pane fade" id="admin-types-categories" role="tabpanel">
				<br />
				<p>TYPE CATEGORIES</p>
			</div>
			<div class="tab-pane fade" id="admin-add-item" role="tabpanel">
				<br />
				<p>ADD ITEM</p>
			</div>
			<div class="tab-pane fade" id="admin-update-item" role="tabpanel">
				<br />
				<p>UPDATE ITEM</p>
			</div>
			<div class="tab-pane fade" id="admin-rooms" role="tabpanel">
				<br />
				<p>ROOMS</p>
			</div>
			<div class="tab-pane fade" id="admin-users" role="tabpanel">
				<br />
				<p>USERS</p>
			</div>
		</div>
	</div>
</div>