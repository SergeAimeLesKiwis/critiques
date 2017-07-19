<div class="row">
	<div class="md-form col-md-11">
		<i class="fa fa-paper-plane-o prefix"></i>
		<div id="<?php echo $id; ?>" class="md-textarea editable" contenteditable="true"><?php echo $content; ?></div>
		<label for="<?php echo $id; ?>" <?php if ($is_active) echo 'class="active"'; ?>><?php echo $label; ?></label>
	</div>
	<div class="md-form col-md-1">
		<button id="show-add-link" class="btn btn-sm bg-darkgrey-color"><i class="fa fa-link"></i></button>
	</div>
</div>