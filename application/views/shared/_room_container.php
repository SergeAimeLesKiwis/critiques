<div class="card col-md-3 spacer wow zoomIn" data-key="<?php echo $room->id; ?>">
	<div class="card-block">
		<h4 class="card-title"><b class="link-card"><?php echo $room->name; ?></b></h4>
		<p class="card-text"><em><?php echo $room->getDateRange(); ?></em></p>
		<span class="text-center"><button class="btn bg-green-hover join" data-key="<?php echo $room->id; ?>">Rejoindre</button></span>
	</div>
</div>