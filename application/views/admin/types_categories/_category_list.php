<?php foreach ($categories as $category) { ?>
	<tr>
		<td class="editable-category-<?php echo $category->id; ?>"><?php echo $category->name; ?></td>
		<td><span class="badge bg-darkgrey-color editable-type-<?php echo $category->type->id; ?>"><?php echo $category->type->name; ?></span></td>
		<td>
			<button class="btn btn-sm btn-warning pull-right edit-category" data-action="category" data-id="<?php echo $category->id; ?>"><i class="fa fa-pencil"></i></button>

			<?php if (!$category->hasItems()) { ?>
				<button class="btn btn-sm btn-danger pull-right remove-category" data-action="category" data-id="<?php echo $category->id; ?>"><i class="fa fa-trash"></i></button>
			<?php } ?>
		</td>
	</tr>
<?php } ?>