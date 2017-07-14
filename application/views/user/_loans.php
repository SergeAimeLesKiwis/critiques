<?php foreach ($items as $item) { ?>
	<div class="card">
		<div class="view overlay hm-zoom">
			<?php echo $item->getImageTag(); ?>
			<a><div class="mask waves-effect waves-light"></div></a>
		</div>
		<div class="card-block">
			<h4 class="card-title"><?php echo $item->title; ?></h4>
			<p class="card-text"><em><?php echo $item->getLightInfos(); ?></em></p>
			<span class="text-center"><?php echo $item->getClassification(); ?></span>
			<?php echo $item->loan_status->getStatusBadge('pull-right'); ?>
			<span class="badge green loan-status pull-right">&nbsp;</span>
		</div>
	</div>
<?php } ?>