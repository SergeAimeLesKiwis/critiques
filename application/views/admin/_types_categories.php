<div class="row">
	<div class="col-md-5">
		<h3>Types</h3>
		<table class="table table-sm table-bordered" id="types">
			<tbody>
				<?php foreach ($types as $type) { ?>
					<tr>
						<td>
							<a class="editable" data-key="<?php echo $type->id; ?>"><?php echo $type->name; ?></a>
							<button class="btn btn-sm btn-danger pull-right remove-type" data-type="<?php echo $type->id; ?>"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td>
						<a id="new-type" class="editable"></a>
						<button class="btn btn-sm btn-primary pull-right create-type" data-type="<?php echo $type->id; ?>"><i class="fa fa-plus"></i></button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-5">
		<h3>Catégories</h3>
	</div>
</div>