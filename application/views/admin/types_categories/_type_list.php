<?php foreach ($types as $type) { ?>
	<tr>
		<td class="editable-type-<?php echo $type->id; ?>"><?php echo $type->name; ?></td>
		<td>
			<button class="btn btn-sm btn-warning pull-right edit-type" data-action="type" data-id="<?php echo $type->id; ?>"><i class="fa fa-pencil"></i></button>

			<?php if (!$type->hasCategories()) { ?>
				<button class="btn btn-sm btn-danger pull-right remove-type" data-action="type" data-id="<?php echo $type->id; ?>"><i class="fa fa-trash"></i></button>
			<?php } ?>
		</td>
	</tr>
<?php } ?>