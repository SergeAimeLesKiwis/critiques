<div class="container card-block">
	<h3 class="blue-color text-center"><i class="fa fa-eercast"></i> Contenus</h3>

	<form method="post" action="">
		<input type="hidden" name="search" value="1" />
		<div class="row">
			<div class="md-form col-md-12">
				<input type="text" id="searchTitle" list="items" name="searchTitle" class="input-select form-control bg-white-color" value="<?php echo $searchTitle; ?>" />
				<label for="searchTitle">Titre de l'oeuvre</label>
				<datalist id="items">
					<?php foreach ($datalistItems as $item) { ?>
						<option value="<?php echo $item->title; ?>" data-item="<?php echo $item->id; ?>"><?php echo $item->getClassification(); ?></option>
					<?php } ?>
				</datalist>
			</div>
		</div>
		<div class="row">
			<div class="md-form col-md-3">
				<input type="text" id="searchAuthor" name="searchAuthor" class="form-control" value="<?php echo $searchAuthor; ?>" />
				<label for="searchAuthor">Auteur</label>
			</div>
			<div class="md-form col-md-3">
				<?php
					$select_type['name'] = 'searchType';
					$select_type['types'] = $types;
					$select_type['selected'] = $searchType;
					$this->load->view('shared/_select_type_values', $select_type);
				?>
			</div>
			<div class="md-form col-md-3">
				<?php
					$select_category['name'] = 'searchCategory';
					$select_category['categories'] = $categories;
					$select_category['selected'] = $searchCategory;
					$this->load->view('shared/_select_category_values', $select_category);
				?>
			</div>
			<div class="md-form col-md-3">
				<button type="submit" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-search"></i> &nbsp;Filtrer</button>
			</div>
		</div>
		
	</form>

	<hr class="mb-2">

	<?php
		if (isset($search)) {
			if (!empty($items)) {
				echo '<div class="row">';
					foreach ($items as $item) {
						$this->load->view('shared/_item_container', array('item' => $item)); 
					}
				echo '</div>';
			} else {
				echo '<div><em>Aucune oeuvre ne correspond à vos critères ...</em></div>';
			}
		} else {
			echo '<div><em>Veuillez sélectionner des critères ...</em></div>';
		}
	?>
</div>