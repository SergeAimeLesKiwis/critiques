<?php	
	echo '<div id="img_intro" class="parallax-window" data-parallax="scroll" data-image-src="'.base_url().'assets/img/home.png">';
	echo '<h2 class="darkgrey-color"> Le concept </h2>'; 
	echo '<p class="darkgrey-color">' . $concept . '</p>';
	echo '</div>';

	echo '<h2 class="blue-color"> À la une </h2>';
	foreach ($highlights as $item) {
		$this->load->view('shared/_item_container', array('item' => $item)); 
	}
	echo '</div>';
?>

<form action="inscription.php" method="POST" id="flotting">
	<div class="col-sm-12">
		<h4 class="blue-color"> Inscrivez-vous </h4>
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
