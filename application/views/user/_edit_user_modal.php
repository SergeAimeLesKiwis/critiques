<div class="modal-header light-blue darken-3 white-text">
	<h4 class="title">
		<span>Modification du profil</span>
	</h4>
</div>

<div class="modal-body mb-0">
	<input type="hidden" id="user-id" class="form-control" value="<?php echo $user->id; ?>" />
	<div class="md-form">
		<i class="fa fa-thermometer-quarter prefix"></i>
		<input type="text" id="user-username" class="form-control" value="<?php echo $user->username; ?>" />
		<label for="user-username" class="active">Titre</label>
	</div>
	<div class="md-form">
		<i class="fa fa-commenting-o prefix"></i>
		<textarea id="user-description" class="form-control md-textarea"><?php echo $user->description; ?></textarea>
		<label for="user-description" class="active">Description</label>
	</div>
	<div class="text-center mt-1-half">
		<button id="send-infos" class="btn bg-green-hover"><i class="fa fa-thermometer-full"></i>&nbsp;Valider</button>
	</div>
</div>