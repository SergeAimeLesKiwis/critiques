<?php
?>
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo base_url(); ?>assets/images/images.jpg">
		</div>
		<div class="col-md-5">
			<h3> NOM Prénom</h3>
			<p> Email </p> 
			<p> Description Lorem Ipsum <p>
			<p> Texte de Description Lorem Ipsum blablabla <p>
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

	<form action="inscription.php" method="POST" id="flotting">
		<div class="col-sm-12">
			<h4> Inscrivez-vous </h4>
			<input type="email" id="inscript_email" class="form-control" placeholder="Votre email"/>
			<input type="submit" class="btn btn-primary" value="S'inscrire"/>
		</div>		
	</form>

	<form action="$_SERVER['PHP_SELF']" method="POST" class="form-horizontal">
		<legend><h2> Nous contacter </h2></legend>
		<div class="form-group">
			<label for="subject" class="col-sm-2 control-label">Sujet :</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="subject" placeholder="Sujet du message">
		    </div>
		</div>
		<div class="form-group">
			<label for="message-content" class="col-sm-2 control-label">Message :</label>
		    <div class="col-sm-4">
		      <textarea class="form-control" id="message-content">
		      </textarea>
		    </div>		    
		</div>
		<div class="form-group">
		    <div class="col-sm-12 col-sm-offset-2">
		      <input type="submit" class="btn btn-success" value="Envoyer"/>
		    </div>
		</div>

	</form>