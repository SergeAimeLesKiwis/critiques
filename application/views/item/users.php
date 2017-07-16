<div class="container card-block">
	<h3 class="blue-color text-center">
		<i class="fa fa-eercast"></i>&nbsp;<?php echo $item->title; ?> <small>(<?php echo $item->getClassification(); ?>)</small>
	</h3>

	<hr class="mb-2">

	<?php
		if (!empty($users)) {
			echo '<div class="row">';
				foreach ($users as $user) {
					if ($user != null) {
						$this->load->view('shared/_user_container', array('user' => $user));
					}
				}
			echo '</div>';
		} else {
			echo '<div class="text-center"><em>Aucun utilisateur n\'a cet oeuvre disponible actuellement</em></div>';
		}
	?>
</div>