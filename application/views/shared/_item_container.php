<div class="card col-md-3 spacer show-infos" data-target="#modal-lg" data-action="URL AJAX" data-key="ID">
	<div class="view overlay hm-zoom">
		<?php echo $item->getImageTag(); ?>
		<a><div class="mask waves-effect waves-light"></div></a>
	</div>
	<div class="card-block">
		<h4 class="card-title"><a href="#" class="link-card"><b><?php echo $item->title; ?></b></a></h4>
		<p class="card-text"><em><?php echo $item->getLightInfos(); ?></em></p>
		<span class="text-center"><?php echo $item->getClassification(); ?></span>
	</div>
</div>
