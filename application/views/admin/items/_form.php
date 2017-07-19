<div class="text-center">
	<button id="api-google" class="btn bg-green-hover"><i class="fa fa-google"></i>&nbsp;Utiliser l'API Google</button>
</div>

<hr />

<input type="hidden" id="item-id" value="<?php echo $item->id; ?>" />

<div class="row">
	<div class="md-form col-md-4">
		<i class="fa fa-bookmark-o prefix"></i>
		<input type="text" id="item-title" class="form-control" value="<?php echo $item->title; ?>" />
		<label for="item-title" <?php if ($item->id > 0) echo 'class="active"'; ?>>Titre</label>
	</div>

	<div class="md-form col-md-4">
		<i class="fa fa-user prefix"></i>
		<input type="text" id="item-author" class="form-control" value="<?php echo $item->author; ?>" />
		<label for="item-author" <?php if ($item->id > 0) echo 'class="active"'; ?>>Auteur</label>
	</div>

	<div class="md-form col-md-4">
		<i class="fa fa-calendar prefix"></i>
		<input type="date" id="item-publish-date" class="form-control" value="<?php if ($item->id > 0) echo $item->getDateFormated(); ?>" />
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
	<div class="md-form col-md-10">
		<i class="fa fa-file-image-o prefix"></i>
		<input type="text" id="item-image" class="form-control" value="<?php echo $item->image; ?>" />
		<label for="item-image" <?php if ($item->id > 0) echo 'class="active"'; ?>>Image</label>
	</div>
	<div class="md-form offset-md-1 col-md-1">
		<button id="show-image" class="btn btn-sm bg-darkgrey-color"><i class="fa fa-eye"></i></button>
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
	<button id="send-infos" class="btn bg-green-hover" data-action="<?php echo $url; ?>"><i class="fa fa-check"></i>&nbsp;Valider</button>
	<?php if ($url == 'update_item') { ?>
		<button id="remove-item" class="btn btn-danger" data-action="item" data-key="<?php echo $item->id; ?>">
			<i class="fa fa-trash"></i>&nbsp;Supprimer
		</button>
	<?php } ?>
</div>