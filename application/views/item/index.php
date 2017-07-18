<div class="card-block">
	<h3 class="blue-color text-center"><i class="fa fa-eercast"></i>&nbsp;Contenus</h3>

	<form method="post" action="" class="container">
		<input type="hidden" name="search" value="1" />
		<div class="row">
			<div class="md-form col-md-12">
				<?php
					$list['items'] = $all_items;
					$list['placeholder'] = 'Titre de l\'oeuvre';
					$list['name'] = 'search_title';
					$list['value'] = $search_title;
					$this->load->view('shared/_datalist_items', $list);
				?>
			</div>
		</div>
		<div class="row">
			<div class="md-form col-md-3">
				<input type="text" id="search_author" name="search_author" class="form-control" value="<?php echo $search_author; ?>" />
				<label for="search_author">Auteur</label>
			</div>
			<div class="md-form col-md-3">
				<?php
					$select_type['types'] = $types;
					$select_type['name'] = 'search_type';
					$select_type['selected'] = $search_type;
					$this->load->view('shared/_select_type_values', $select_type);
				?>
			</div>
			<div class="md-form col-md-3">
				<?php
					$select_category['categories'] = $categories;
					$select_category['name'] = 'search_category';
					$select_category['selected'] = $search_category;
					$this->load->view('shared/_select_category_values', $select_category);
				?>
			</div>
			<div class="md-form col-md-3">
				<button id="load-item" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-search"></i>&nbsp;Filtrer</button>
			</div>
		</div>
	</form>

	<hr class="mb-2" />

	<?php
		if (isset($search)) {
			if (!empty($items)) {
				echo '<div class="row">';
					foreach ($items as $item) {
						$this->load->view('shared/_item_container', array('item' => $item)); 
					}
				echo '</div>';
			} else {
				echo '<div class="text-center"><em>Aucune oeuvre ne correspond à vos critères ...</em></div>';
			}
		} else {
			echo '<div class="text-center"><em>Veuillez sélectionner des critères ...</em></div>';
		}
	?>
</div>