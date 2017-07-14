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
		<input type="text" id="item-image" class="form-control" />
		<label for="item-image">Image</label>
	</div>
</div>

<div class="row">
	<div class="md-form col-md-11">
		<i class="fa fa-thermometer-three-quarters prefix"></i>
		<div id="item-description" class="md-textarea editable" contenteditable="true"></div>
		<label for="item-description" <?php if ($item->id > 0) echo 'class="active"'; ?>>Description</label>
	</div>
	<div class="md-form col-md-1">
		<button id="show-add-link" class="btn btn-sm bg-darkgrey-color"><i class="fa fa-link"></i></button>
	</div>
</div>

<div class="text-center">
	<button id="send-infos" class="btn bg-green-hover" data-action="<?php echo $url; ?>"><i class="fa fa-thermometer-full"></i>&nbsp;Valider</button>
</div>