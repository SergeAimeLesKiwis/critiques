<div class="card col-md-3 spacer show-infos wow zoomIn" data-key="<?php echo $item->id; ?>">
	<div class="view overlay hm-zoom">
		<?php echo $item->getImageTag(); ?>
		<a><div class="mask waves-effect waves-light"></div></a>
	</div>
	<div class="card-block">
		<h4 class="card-title"><b class="link-card"><?php echo $item->title; ?></b></h4>
		<p class="card-text"><em><?php echo $item->getLightInfos(); ?></em></p>
		<span class="text-center"><?php echo $item->getClassification(); ?></span>
	</div>
</div>