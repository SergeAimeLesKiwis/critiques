<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title"><i class="fa fa-archive"></i> <?php echo $item->title; ?></h4>
</div>
<div class="modal-body mb-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="view overlay hm-zoom">
					<?php echo $item->getImageTag(); ?>
					<a><div class="mask waves-effect waves-light"></div></a>
				</div>
			</div>
			<div class="col-md-7">
				<h4 class="card-title"><b class="link-card"><?php echo $item->getClassification(); ?></b></h4>
				<p class="card-text"><em><?php echo $item->getLightInfos(); ?></em></p>
				<p class="card-text"><?php echo $item->description; ?></p>
			</div>
		</div>

		<hr />
		<div id="item-relations" class="text-center mb-2 row">
			<div class="text-center col-md-6">
				<button class="btn bg-green-hover see-infos" data-action="users" data-key="<?php echo $item->id; ?>">
					<i class="fa fa-thermometer-full"></i>&nbsp;Voir les utilisateurs
				</button>
			</div>
			<div class="text-center col-md-6">
				<button class="btn bg-green-hover see-infos" data-action="rooms" data-key="<?php echo $item->id; ?>">
					<i class="fa fa-thermometer-full"></i>&nbsp;Voir les salons
				</button>
			</div>
		</div>

		<?php if (!empty($suggestions)) { ?>
			<hr />
			<div id="item-suggestions" class="text-center mb-2">Autre suggestions</div>
			<div class="row">
				<?php
					foreach ($suggestions as $suggestion) {
						$this->load->view('item/_suggestion', array('suggestion' => $suggestion));
					}
				?>
			</div>
		<?php } ?>
	</div>
</div>