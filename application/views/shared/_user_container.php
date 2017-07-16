<div class="card col-md-3 spacer wow zoomIn" data-key="<?php echo $user->id; ?>">
	<div class="view overlay hm-zoom">
		<?php echo $user->getImageTag(); ?>
		<a><div class="mask waves-effect waves-light"></div></a>
	</div>
	<div class="card-block">
		<h4 class="card-title">
			<b class="link-card">
				<a class="brown-hover" href="<?php echo base_url().'user/profile/'.$user->id; ?>"><?php echo $user->username; ?></a>
			</b>
		</h4>
		<p class="card-text"><em><?php echo $user->getFullName(); ?></em></p>
	</div>
</div>