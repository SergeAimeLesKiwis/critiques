<?php
?>
	<div class="row">
		<div class="col-md-3">
			<img src="/">
		</div>
		<div class="col-md-5">
			<h3>Salam Aleykoum <?php echo $user->first_name . ' Abou frère numéro  ' . $user->id . ' beshtek ' . $user->last_name ; ?></h3>
			<p> <?php echo $user->email;?> </p> 
			<p><?php echo $user->username;?> <p>
			<p> <?php echo $user->description;?> <p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<h3> Pour échanger </h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<!-- foreach livre à échanger -->
			<?php 
			for ($i = 0; $i < 4; $i++){ ?>

			<img src="<?php echo base_url(); ?>assets/images/images.jpg" class="img_resize">

			<?php } ?>
		</div>
	</div>