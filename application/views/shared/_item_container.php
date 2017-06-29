<div class="col-md-4 portfolio-item thumbnail">
	<?php echo $item->getImageTag(); ?>
	<h3>
		<a href="<?php echo 'room/'.$item->title;?>" class="text-center"><?php echo $item->title; ?></a>
	</h3>
	<p><?php echo $item->author; ?></p>
</div>