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
		<div class="row">
			<?php
				foreach ($suggestions as $suggestion) {
					$this->load->view('item/_suggestion', array('suggestion' => $suggestion));
				}
			?>
		</div>
	</div>
</div>