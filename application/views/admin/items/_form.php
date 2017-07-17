<div class="row">
	<div class="md-form col-md-9">
		<i class="fa fa-thermometer-quarter prefix"></i>
		<input type="text" id="item-title" class="form-control" value="<?php echo $item->title; ?>" />
		<label for="item-title" <?php if ($item->id > 0) echo 'class="active"'; ?>>Titre</label>
	</div>

	<div class="md-form col-md-3">
		<button id="api-loader" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-eercast"></i>&nbsp;Charger</button>
	</div>

	<div class="row">
		<div class="md-form col-md-9">
			<?php
				$datalist_items['items'] = $datalistItems;
				$datalist_items['placeholder'] = 'Choisir une oeuvre';
				$this->load->view('shared/_datalist_items', $datalist_items);
			?>
		</div>

		<div id="icons-loader" class="md-form col-md-1 text-center">
			<i class="fa fa-times red-color invisible animated"></i>
			<i class="fa fa-check green-color invisible animated"></i>
		</div>
		<div class="md-form col-md-2">
			<button id="api-loader" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-search"></i>&nbsp;Rechercher</button>
		</div>
	</div>
</div>

<input type="hidden" id="item-id" value="<?php echo $item->id; ?>" />

<div class="row">
	<div class="md-form col-md-4">
		<i class="fa fa-thermometer-quarter prefix"></i>
		<input type="text" id="item-title" class="form-control" value="<?php echo $item->title; ?>" />
		<label for="item-title" <?php if ($item->id > 0) echo 'class="active"'; ?>>Titre</label>
	</div>

	<div class="md-form col-md-4">
		<i class="fa fa-user prefix"></i>
		<input type="text" id="item-author" class="form-control" value="<?php echo $item->author; ?>" />
		<label for="item-author" <?php if ($item->id > 0) echo 'class="active"'; ?>>Auteur</label>
	</div>

	<div class="md-form col-md-4">
		<i class="fa fa-thermometer-quarter prefix"></i>
		<input type="date" id="item-publish-date" class="form-control" value="<?php echo $item->publish_date; ?>" />
		<label for="item-publish-date" class="active">Date de sortie</label>
	</div>
</div>

<div class="row">
	<div class="md-form offset-md-1 col-md-4">
		<?php
			$select_type['types'] = $types;
			$select_type['selected'] = $item->category->type->id;
			$this->load->view('shared/_select_type_values', $select_type);
		?>
	</div>

	<div class="md-form offset-md-2 col-md-4">
		<?php
			$select_category['categories'] = $categories;
			$select_category['selected'] = $item->category->id;
			$this->load->view('shared/_select_category_values', $select_category);
		?>
	</div>
</div>

<div class="row">
	<div class="md-form col-md-12">
		<i class="fa fa-file-image-o prefix"></i>
		<input type="text" id="item-image" class="form-control" value="<?php echo $item->image; ?>" />
		<label for="item-image" <?php if ($item->id > 0) echo 'class="active"'; ?>>Image</label>
	</div>
</div>

<?php
	$editable['id'] = 'item-description';
	$editable['content'] = $item->description;
	$editable['is_active'] = $item->id > 0;
	$editable['label'] = 'Description';
	$this->load->view('shared/_editable', $editable);
?>

<div class="text-center">
	<button id="send-infos" class="btn bg-green-hover" data-action="<?php echo $url; ?>"><i class="fa fa-thermometer-full"></i>&nbsp;Valider</button>
	<?php if ($url == 'update_item') { ?>
		<button id="remove-item" class="btn btn-danger" data-action="item" data-key="<?php echo $item->id; ?>">
			<i class="fa fa-trash"></i>&nbsp;Supprimer
		</button>
	<?php } ?>
</div>