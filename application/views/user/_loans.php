<?php foreach ($loans as $loan) { ?>
	<div class="card">
		<div class="view overlay hm-zoom">
			<?php echo $loan->getImageTag(); ?>
			<a><div class="mask waves-effect waves-light"></div></a>
		</div>
		<div class="card-block">
			<h4 class="card-title"><?php echo $loan->title; ?></h4>
			<p class="card-text"><em><?php echo $loan->getLightInfos(); ?></em></p>
			<span class="text-center"><?php echo $loan->getClassification(); ?></span>
		</div>
	</div>
<?php } ?>