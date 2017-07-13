<select id="select-type" class="form-control bg-white-color" <?php if (isset($name)) echo 'name="'.$name.'"'; ?>>
	<option value="">Choisir un type ...</option>
	<?php foreach ($types as $type) { ?>
		<option value="t-<?php echo $type->id; ?>" <?php if ($type->id == $selected) echo 'selected'; ?>><?php echo $type->name; ?></option>
	<?php } ?>
</select>