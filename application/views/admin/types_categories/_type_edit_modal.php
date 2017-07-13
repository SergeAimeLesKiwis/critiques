<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title"><i class="fa fa-pencil"></i> Édition</h4>
</div>
<div class="modal-body mb-0">
	<input id="send-infos-url" type="hidden" value="admin/update_type" />
	<div class="md-form form-sm">
		<i class="fa fa-envelope prefix"></i>
		<input type="hidden" id="type_id" class="form-control" value="<?php echo $type->id; ?>" />
		<input type="text" id="type_name" class="form-control" value="<?php echo $type->name; ?>" placeholder="Label" />
	</div>
	<div class="text-center mt-1-half">
		<button id="send-type-modal-edit" class="btn btn-info mb-2">Valider <i class="fa fa-check ml-1"></i></button>
	</div>
</div>