<br/>
<div class=" col-md-12 text-center">
	<h1 class="green-color text-center">
		<b>Profil Utilisateur</b>
		<?php if ($user->id == $_SESSION['user_id']){ ?>
			<button id="edit-user" class="btn bg-darkgrey-color pull-right">Modifier</button>
		<?php } ?>	
	</h1>
</div>

<hr class="mt-2 mb-2" />

<div class="row">
	<div class="offset-md-2 col-md-2">
		<img src="http://via.placeholder.com/200x250" class="img-fluid" />
	</div>
	<div class="col-md-6">
		<h3 class="darkgrey-color"><i class="fa fa-user-o"></i>&nbsp;<b><?php echo $user->getFullName(); ?></b></h3>
		<h3 class="darkgrey-color"><i class="fa fa-user-circle-o"></i>&nbsp;<span id="info-username"><?php echo $user->username; ?></span></h3>
		<h3 class="darkgrey-color"><i class="fa fa-commenting-o"></i>&nbsp;<span id="info-description"><?php echo $user->description;?></span></h3>
	</div>
</div>

<hr class="mt-2 mb-2" />

<div class="row">
	<div class="offset-md-1 col-md-11">
		<h3 class="green-color"><b>Pour échanger</b></h3>
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
<div id="loans" class="card-group row">
	<?php $this->load->view('user/_loans', array('items' => $user->loans)); ?>
</div>

<hr class="mt-2" />

<?php if ($user->id != $_SESSION['user_id']){ ?>
	<div class="offset-md-3 col-md-10">
		<div class="form-display">
			<div class="card-block">
				<div>
					<h3 class="text-center"><i class="fa fa-envelope"></i> Demande de prêt</h3>
					<hr class="mt-2 mb-2" />
				</div>
				<br />
				<div class="md-form">
					<?php
						$list['items'] = $all_items;
						$list['placeholder'] = 'Choisir une oeuvre';
						$this->load->view('shared/_datalist_items', $list);
					?>
				</div>
				<div class="text-center">
					<button id="contact-user" data-user="<?php $user->id; ?>" class="btn btn-default bg-green-color">Envoyer</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>