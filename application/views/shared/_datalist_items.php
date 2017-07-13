<input
	type="text"
	id="datalist-items"
	list="items"
	class="input-select form-control bg-white-color"
	<?php if (isset($name)) echo 'name="'.$name.'"'; ?>
	<?php if (isset($value)) echo 'value="'.$value.'"'; ?>
/>
<label for="datalist-items"><?php if (isset($title)) echo $title; ?></label>
<datalist id="items">
	<?php foreach ($items as $item) { ?>
		<option value="<?php echo $item->title; ?>" data-item="<?php echo $item->id; ?>"><?php echo $item->getClassification(); ?></option>
	<?php } ?>
</datalist>