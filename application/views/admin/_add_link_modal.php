<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title">
		<span>Lien</span>
		<i class="fa fa-info-circle pull-right" data-toggle="tooltip" data-placement="right" title="Attention, l'url doit être complète !"></i>
	</h4>
</div>

<div class="modal-body mb-0">
	<div class="md-form form-sm">
		<select id="internal-links" class="form-control bg-white-color">
			<option value="">Choisir un lien interne ...</option>
			<?php foreach ($pages as $page) { ?>
				<option data-url="<?php echo $page->getFullUrl(); ?>" value="<?php echo $page->name; ?>"><?php echo $page->label; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="md-form form-sm">
		<i class="fa fa-envelope prefix"></i>
		<input type="text" id="link-url" class="form-control" />
		<label for="link-url">Url</label>
	</div>
	<div class="md-form form-sm">
		<i class="fa fa-envelope prefix"></i>
		<input type="text" id="link-label" class="form-control" />
		<label for="link-label">Label</label>
	</div>
	<div class="text-center mt-1-half">
		<button id="add-link" class="btn btn-info mb-2">Valider&nbsp;<i class="fa fa-check ml-1"></i></button>
	</div>
</div>