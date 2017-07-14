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
	<div class="col-md-1"></div>
	<?php foreach ($loanStatus as $status) { ?>
		<div class="offset-md-1 col-md-2">
			<?php echo $status->getStatusBadge(); ?><em><?php echo $status->name; ?></em>
		</div>
	<?php } ?>
</div>
<br />
<div id="loans" class="card-group">
	<?php $this->load->view('user/_loans', array('items' => $user->loans)); ?>
</div>

<hr class="mt-2">

<?php if ($user->id != $_SESSION['user_id']){ ?>
<div class="offset-md-3 col-md-10">
	<div class="form-display">
		<div class="card-block">
			<div>
				<h3 class="text-center"><i class="fa fa-envelope"></i> Me contacter</h3>
				<hr class="mt-2 mb-2" />
			</div>
			<br />
			<div class="md-form">
				<i class="fa fa-tag prefix"></i>
				<input type="text" id="form32" class="form-control" />
				<label for="form34">Sujet</label>
			</div>
			<div class="md-form">
				<i class="fa fa-pencil prefix"></i>
				<textarea type="text" id="form8" class="md-textarea"></textarea>
				<label for="form8">Votre message</label>
			</div>
			<div class="text-center">
				<button class="btn btn-default bg-green-color">Envoyer</button>
			</div>
		</div>
	</div>
</div>
<?php } ?>
