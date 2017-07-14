<div id="img_intro" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/img/home.png">
	<h2 class="darkgrey-color">Le concept</h2>
	<p class="darkgrey-color"><?php echo $concept; ?></p>
</div>

<div class="block-right">
	<h2 class="blue-color"> À la une </h2>
	<div class="row">
		<?php
			foreach ($highlights as $item) {
				if ($item != null) $this->load->view('shared/_item_container', array('item' => $item)); 
			}
		?>
	</div>
</div>

<div class="bg-lightblue-color">
	<div class="form-display">
		<div class="card-block">
			<div>
				<h3><i class="fa fa-envelope"></i> Nous contacter:</h3>
				<hr class="mt-2 mb-2" />
			</div>
			<br />
			<div class="md-form">
				<i class="fa fa-user prefix"></i>
				<input type="text" id="contact-name" class="form-control" />
				<label for="contact-name">Votre nom</label>
			</div>
			<div class="md-form">
				<i class="fa fa-envelope prefix"></i>
				<input type="text" id="contact-email" class="form-control" />
				<label for="contact-email">Votre email</label>
			</div>
			<div class="md-form">
				<i class="fa fa-tag prefix"></i>
				<input type="text" id="contact-subject" class="form-control" />
				<label for="contact-subject">Sujet</label>
			</div>
			<div class="md-form">
				<i class="fa fa-pencil prefix"></i>
				<textarea type="text" id="contact-message" class="md-textarea"></textarea>
				<label for="contact-message">Votre message</label>
			</div>
			<div class="text-center">
				<button id="contact-admin" class="btn btn-default bg-green-color">Envoyer</button>
				<div class="call">
					<br />
					<p>
						<span>Ou par téléphone?</span>
						<br />
						<span><i class="fa fa-phone"></i> + 01 234 565 280</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>