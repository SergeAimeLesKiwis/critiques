<?php foreach ($actives as $room) { ?>
	<tr id="room-<?php echo $room->id; ?>">
		<?php $this->load->view('admin/rooms/_active', array('room' => $room)); ?>
	</tr>
<?php } ?>