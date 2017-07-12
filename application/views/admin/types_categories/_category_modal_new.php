<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title"><i class="fa fa-pencil"></i> Ajout</h4>
</div>
<div class="modal-body mb-0">
	<input id="action" type="hidden" value="admin/add_category" />
	<div class="md-form form-sm">
		<i class="fa fa-envelope prefix"></i>
		<input type="text" id="category_name" class="form-control" placeholder="Label" />
	</div>
	<div class="md-form form-sm">
		<select id="category_type" class="form-control">
			<option value="">Choisir un type ...</option>
			<?php foreach ($types as $type) { ?>
				<option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="text-center mt-1-half">
		<button id="send-category-modal-new" class="btn btn-info mb-2">Valider <i class="fa fa-check ml-1"></i></button>
	</div>
</div>