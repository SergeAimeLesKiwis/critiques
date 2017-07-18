<div class="container card-block">
	<h3 class="blue-color text-center">
		<i class="fa fa-eercast"></i>&nbsp;<?php echo $item->title; ?> <small>(<?php echo $item->getClassification(); ?>)</small>
	</h3>

	<hr class="mb-2" />

	<?php
		if (!empty($rooms)) {
			echo '<div class="row">';
				foreach ($rooms as $room) {
					if ($room != null) {
						$this->load->view('shared/_room_container', array('room' => $room));
					}
				}
			echo '</div>';
		} else {
			echo '<div class="text-center"><em>Aucun salon n\'est actuellement ouvert concernant cet oeuvre</em></div>';
		}
	?>
</div>