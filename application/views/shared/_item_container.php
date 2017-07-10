<div class="card col-md-4">
	<div class="view overlay hm-zoom">
		<?php echo $item->getImageTag(); ?>
		<a><div class="mask waves-effect waves-light"></div></a>
	</div>
	<div class="card-block">
		<h4 class="card-title"><?php echo $item->title; ?></h4>
		<p class="card-text"><?php echo $item->getLightInfos(); ?></p>
	</div>
</div>