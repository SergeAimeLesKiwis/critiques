<?php foreach ($types as $type) { ?>
	<tr id="type-line-<?php echo $type->id; ?>">
		<?php $this->load->view('admin/types_categories/_type_line', array('type' => $type)); ?>
	</tr>
<?php } ?>