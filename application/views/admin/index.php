<div class="row">
	<div class="col-md-2" id="admin-menu">
		<ul class="nav nav-tabs md-pills pills-primary flex-column" role="tablist">
			<li class="nav-item">
				<a class="nav-link brown-hover active" data-toggle="tab" href="#admin-home" role="tab"><i class="fa fa-home"></i> Page d'accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-static" role="tab"><i class="fa fa-address-card-o"></i> Pages statiques</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-types-categories" role="tab"><i class="fa fa-file-o"></i> Types / Catégories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-add-item" role="tab"><i class="fa fa-bookmark-o"></i> Ajouter une oeuvre</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-update-item" role="tab"><i class="fa fa-pencil-square-o"></i> Modifier une oeuvre</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-rooms" role="tab"><i class="fa fa-comment-o"></i> Salons</a>
			</li>
			<li class="nav-item">
				<a class="nav-link brown-hover" data-toggle="tab" href="#admin-users" role="tab"><i class="fa fa-user-o"></i> Utilisateurs</a>
			</li>
		</ul>
	</div>
	<div class="col-md-10 bg-lightblue-color">
		<div class="tab-content vertical">
			<div class="tab-pane fade in show active" id="admin-home" role="tabpanel">
				<br />
				<p>
					<?php
						$home['concept'] = $concept;
						$home['highlights'] = $highlights;
						$home['items'] = $items;
						$this->load->view('admin/home/_home', $home); 
					?>
				</p>
			</div>
			<div class="tab-pane fade" id="admin-static" role="tabpanel">
				<br />
				<p>
					<?php
						$static['osef'] = null;
						$this->load->view('admin/_static', $static); 
					?>
				</p>
			</div>
			<div class="tab-pane fade" id="admin-types-categories" role="tabpanel">
				<br />
				<p>
					<?php
						$types_categories['types'] = $types;
						$types_categories['categories'] = $categories;
						$this->load->view('admin/types_categories/_types_categories', $types_categories); 
					?>
				</p>
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