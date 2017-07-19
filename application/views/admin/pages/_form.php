<input type="hidden" id="page-id" value="<?php echo $page->id; ?>" />

<div class="row">
	<div class="md-form col-md-4">
		<i class="fa fa-bookmark-o prefix"></i>
		<input type="text" id="page-name" class="form-control" value="<?php echo $page->name; ?>" />
		<label for="page-name" <?php if (!empty($page->name)) echo 'class="active"'; ?>>Nom</label>
	</div>

	<div class="md-form offset-md-2 col-md-4">
		<i class="fa fa-user prefix"></i>
		<input type="text" id="page-label" class="form-control" value="<?php echo $page->label; ?>" />
		<label for="page-label" <?php if (!empty($page->name)) echo 'class="active"'; ?>>Label</label>
	</div>
</div>

<div class="row">
	<div class="md-form col-md-12">
		<i class="fa fa-file-text-o prefix"></i>
		<input type="text" id="page-title" class="form-control" value="<?php echo $page->title; ?>" />
		<label for="page-title" <?php if (!empty($page->name)) echo 'class="active"'; ?>>Titre</label>
	</div>
</div>

<?php
	$editable['id'] = 'page-text';
	$editable['content'] = $page->text;
	$editable['is_active'] = !empty($page->name);
	$editable['label'] = 'Texte';
	$this->load->view('shared/_editable', $editable);
?>

<div class="text-center">
	<button id="send-infos" class="btn bg-green-hover" data-action="<?php echo $url; ?>"><i class="fa fa-thermometer-full"></i>&nbsp;Valider</button>
	<?php if ($url == 'update_page') { ?>
		<button id="remove-page" class="btn btn-danger" data-action="page" data-key="<?php echo $page->id; ?>">
			<i class="fa fa-trash"></i>&nbsp;Supprimer
		</button>
	<?php } ?>
</div>