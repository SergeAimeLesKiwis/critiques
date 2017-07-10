<div class="card col-md-4 highlight">

	<?php if ($item != null) { ?>

			<div class="view overlay hm-zoom">
				<?php echo $item->getImageTag(); ?>
				<a><div class="mask waves-effect waves-light"></div></a>
			</div>
			<div class="card-block">
				<h4 class="card-title"><?php echo $item->title; ?></h4>
				<p class="card-text"><?php echo $item->getLightInfos(); ?></p>
				<button class="btn btn-danger">Retirer de la une</button>
			</div>
		</div>

	<?php } else { ?>

		<div class="card col-md-4 highlight">
			<div class="view overlay hm-zoom">
				<?php echo '<img src="'.base_url().'assets/img/cover/unknown.png" alt="" class="img-fluid" />'; ?>
				<a><div class="mask waves-effect waves-light"></div></a>
			</div>
			<div class="card-block">
				<h4 class="card-title"></h4>
				<p class="card-text"></p>
				<button class="btn btn-primary">Ajouter à la une</button>
			</div>
			
	<?php } ?>

</div>