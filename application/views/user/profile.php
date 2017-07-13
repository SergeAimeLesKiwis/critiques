<?php
?>
<br/>
<div class=" col-md-12 text-center">
	<h1 class="green-color text-center"><b>Profil Utilisateur</b></h1>
</div>

<div class="row">
	<div class="offset-md-1 col-md-4">
		<img src="http://placehold.it/320x200">
	</div>
	<div class="offset-md-1 col-md-6">
		<h3 class="darkgrey-color"><i class="fa fa-user-o"></i>&nbsp;&nbsp;<b>Salam <?php echo $user->first_name . ' Abou numéro  ' . $user->id . ' bsa ' . $user->last_name ; ?></b></h3>
		<h3 class="darkgrey-color"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<?php echo $user->email;?> </h3> 
		<h3 class="darkgrey-color"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;<?php echo $user->username;?> </h3>
		<h3 class="darkgrey-color"><i class="fa fa-commenting-o"></i>&nbsp;&nbsp;<?php echo $user->description;?> </h3>
	</div>
</div>
<hr />
<div class="row">
	<div class="offset-md-1 col-md-11">
		<h3 class="green-color"><b> Pour échanger </b></h3>
	</div>
</div>
<br />
<div class="row">
	<div class="offset-md-1 col-md-3">
		<span class="badge green loan-status"></span><em>Disponible</em>
	</div>
	<div class="offset-md-1 col-md-3">
		<span class="badge red loan-status"></span><em>Prêté</em>
	</div>
	<div class="offset-md-1 col-md-3">
		<span class="badge blue loan-status"></span><em>Je le veux</em>
	</div>
</div>
<br />
<div id="loans" class="card-group">
	<div class="card">
		<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2813%29.jpg" alt="Card image cap">
		<div class="card-block">
			<h4 class="card-title">Card title</h4>
			<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		</div>
	</div>	
	<div class="card">
		<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2840%29.jpg" alt="Card image cap">
		<div class="card-block">
			<h4 class="card-title">Card title</h4>
			<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		</div>
	</div>
	<div class="card">
		<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2842%29.jpg" alt="Card image cap">
		<div class="card-block">
			<h4 class="card-title">Card title</h4>
			<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
		</div>
	</div>
	<div class="card">
		<img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2842%29.jpg" alt="Card image cap">
		<div class="card-block">
			<h4 class="card-title">Card title</h4>
			<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
			<a class="btn bg-green-hover waves-effect waves-light">Demander le prêt</a>
		</div>
	</div>
</div>

		

		
