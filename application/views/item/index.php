<div class="container card-block">
	<h3 class="blue-color text-center"><i class="fa fa-eercast"></i> Contenus</h3>

	<form method="post" action="">
		<div class="row">
			<div class="col-md-12">
				<div class="md-form">
					<input type="text" id="searchTitle" list="items" name="searchTitle" class="input-select form-control bg-white-color" value="<?php echo $searchTitle; ?>" />
					<label for="searchTitle">Titre de l'oeuvre</label>
					<datalist id="items">
						<?php foreach ($allItems as $item) { ?>
							<option value="<?php echo $item->title; ?>" data-item="<?php echo $item->id; ?>"><?php echo $item->getClassification(); ?></option>
						<?php } ?>
					</datalist>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="md-form">
					<input type="text" id="searchAuthor" name="searchAuthor" class="form-control" value="<?php echo $searchAuthor; ?>" />
					<label for="searchAuthor">Auteur</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="md-form">
					<select id="searchType" class="form-control" name="searchType">
						<option value="">Choisir un type ...</option>
						<?php foreach ($types as $type) { ?>
							<option value="t-<?php echo $type->id; ?>" <?php if ($type->id == $searchType) echo 'selected'; ?>><?php echo $type->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="md-form">
					<select id="searchCategory" class="form-control" name="searchCategory">
						<option value="">Choisir une catégorie ...</option>
						<?php foreach ($categories as $category) { ?>
							<option value="c-<?php echo $category->id; ?>" data-chained="t-<?php echo $category->type->id; ?>" <?php if ($category->id == $searchCategory) echo 'selected'; ?>><?php echo $category->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="md-form">
					<button type="submit" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-search"></i> &nbsp;Filtrer</button>
				</div>
			</div>
		</div>
		
	</form>

	<hr class="mb-2">

	<?php
		if (!empty($items)) {
			echo '<div class="row">';
				foreach ($items as $item) {
					$this->load->view('shared/_item_container', array('item' => $item)); 
				}
			echo '</div>';
		} else {
			echo '<div><em>Veuillez sélectionner des critères ...</em></div>';
		}
	?>
</div>