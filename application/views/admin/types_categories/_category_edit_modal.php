<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title"><i class="fa fa-pencil"></i> Édition</h4>
</div>
<div class="modal-body mb-0">
	<input id="send-infos-url" type="hidden" value="admin/update_type" />
	<div class="md-form form-sm">
		<i class="fa fa-envelope prefix"></i>
		<input type="hidden" id="category_id" class="form-control" value="<?php echo $category->id; ?>" />
		<input type="text" id="category_name" class="form-control" value="<?php echo $category->name; ?>" placeholder="Label" />
	</div>
	<div class="md-form form-sm">
		<select id="category_type" class="form-control">
			<option value="">Choisir un type ...</option>
			<?php foreach ($types as $type) { ?>
				<option value="<?php echo $type->id; ?>" <?php if ($type->id == $category->type->id) echo 'selected'; ?>><?php echo $type->name; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="text-center mt-1-half">
		<button id="send-type-modal-edit" class="btn btn-info mb-2">Valider <i class="fa fa-check ml-1"></i></button>
	</div>
</div>