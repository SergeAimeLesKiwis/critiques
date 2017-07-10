<?php	
	echo '<div id="img_intro" class="parallax-window" data-parallax="scroll" data-image-src="'.base_url().'assets/img/home.png">';
	echo '<h2 class="darkgrey-color"> Le concept </h2>'; 
	echo '<p class="darkgrey-color">' . $concept . '</p>';
	echo '</div>';

	
	echo '<div class="block-right">';
	echo '<h2 class="blue-color"> À la une </h2>';
	echo '<div class="row">';
	foreach ($highlights as $item) {
		if ($item != null) $this->load->view('shared/_item_container', array('item' => $item)); 
	}
	echo '</div>';
	echo '</div>';
?>

	<form action="inscription.php" method="POST" id="flotting">
		<div class="col-sm-12">
			<div class="card">
			    <div class="card-block">

			        <div class="text-center">
			            <h3><i class="fa fa-pencil"></i> Inscription</h3>
			            <hr class="mt-2 mb-2">
			        </div>

			        <div class="md-form">
			            <i class="fa fa-user prefix"></i>
			            <input type="text" id="form3" class="form-control">
			            <label for="form3">Votre nom</label>
			        </div>

			        <div class="md-form">
			            <i class="fa fa-envelope prefix"></i>
			            <input type="text" class="form-control" id="inscript_email" />
			            <label for="inscript_email">Votre email</label>
			        </div>

			        <div class="text-center">
			            <button class="btn bg-brown-color">Envoyer</button>
			        </div>
			    </div>
			</div>
		</div>		
		
	</form>

	<div class="bg-lightblue-color">
		<div class="form-display">
			<div class="card-block">
			    <div>
			        <h3><i class="fa fa-envelope"></i> Nous contacter:</h3>
			        <hr class="mt-2 mb-2">
			    </div>

			    <br>

			    <div class="md-form">
			        <i class="fa fa-user prefix"></i>
			        <input type="text" id="form3" class="form-control">
			        <label for="form3">Votre nom</label>
			    </div>

			    <div class="md-form">
			        <i class="fa fa-envelope prefix"></i>
			        <input type="text" id="form2" class="form-control">
			        <label for="form2">Votre email</label>
			    </div>

			    <div class="md-form">
			        <i class="fa fa-tag prefix"></i>
			        <input type="text" id="form32" class="form-control">
			        <label for="form34">Sujet</label>
			    </div>

			    <div class="md-form">
			        <i class="fa fa-pencil prefix"></i>
			        <textarea type="text" id="form8" class="md-textarea"></textarea>
			        <label for="form8">Votre message</label>
			    </div>

			    <div class="text-center">
			        <button class="btn btn-default bg-green-color">Envoyer</button>

			        <div class="call">
			            <br>
			            <p>Ou par téléphone?
			                <br>
			                <span><i class="fa fa-phone"> </i></span> + 01 234 565 280</p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
