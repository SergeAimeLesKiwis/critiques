<br/>
<div class=" col-md-12 text-center">
	<h1 class="green-color text-center"><b>Profil Utilisateur</b></h1>
	<hr class="mt-2 mb-2">
</div>

<div class="row">
	<div class="offset-md-1 col-md-4">
		<img src="http://placehold.it/320x200">
	</div>
	<div class="offset-md-1 col-md-6">
		<h3 class="darkgrey-color"><i class="fa fa-user-o"></i>&nbsp;&nbsp;<b><?php echo $user->getFullName(); ?></b></h3>
		<h3 class="darkgrey-color"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<?php echo $user->email;?> </h3> 
		<h3 class="darkgrey-color"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;<?php echo $user->username;?> </h3>
		<h3 class="darkgrey-color"><i class="fa fa-commenting-o"></i>&nbsp;&nbsp;<?php echo $user->description;?> </h3>
	</div>
</div>

<hr class="mt-2 mb-2">

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
	<?php $this->load->view('user/_loans', array('loans' => $user->loans)); ?>
</div>

<hr class="mt-2 mb-2">

CONTACT ICI BOLOSS