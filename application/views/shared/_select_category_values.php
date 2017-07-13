<select id="select-category" class="form-control bg-white-color" <?php if (isset($name)) echo 'name="'.$name.'"'; ?>>
	<option value="">Choisir une catégorie ...</option>
	<?php foreach ($categories as $category) { ?>
		<option value="c-<?php echo $category->id; ?>" data-chained="t-<?php echo $category->type->id; ?>" <?php if ($category->id == $selected) echo 'selected'; ?>><?php echo $category->name; ?></option>
	<?php } ?>
</select>