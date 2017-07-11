<div class="row">
	<div class="col-md-4">
		<h3>
			<span>Types</span>
			<button id="create-type" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
		</h3>
		<table class="table table-sm">
			<tbody id="type-list">
				<?php $this->load->view('admin/types_categories/_type_list', array('types' => $types)); ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<h3>
			<span>Catégories</span>
			<button id="create-category" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
		</h3>
		<table class="table table-sm" id="categories">
			<tbody>
				<?php foreach ($categories as $category) { ?>
					<tr>
						<td><?php echo $category->name; ?></td>
						<td><span class="badge indigo"><?php echo $category->type->name; ?></span></td>
						<td>
							<button class="btn btn-sm btn-danger pull-right remove-category" data-category="<?php echo $category->id; ?>"><i class="fa fa-trash"></i></button>
							<button class="btn btn-sm btn-warning pull-right edit-category" data-category="<?php echo $category->id; ?>"><i class="fa fa-pencil"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm cascading-modal" role="document">
		<div class="modal-content">
			<div class="modal-header light-blue darken-3 white-text">
				<button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="title"><i class="fa fa-pencil"></i> Édition d'un type</h4>
			</div>
			<div class="modal-body mb-0">
				<div class="md-form form-sm">
					<i class="fa fa-envelope prefix"></i>
					<input type="text" id="form19" class="form-control" />
					<label for="form19">Your name</label>
				</div>
				<div class="text-center mt-1-half">
					<button class="btn btn-info mb-2">Valider <i class="fa fa-check ml-1"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>