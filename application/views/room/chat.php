
<input type="hidden" id="me" data-id="<?php echo $user->id; ?>" data-username="<?php echo $user->username; ?>" />

<div id="chat">
	<div class="message row">
	</div>
</div>

<form id="send-message" action="" class="md-form">
		<input id="message" autocomplete="off" class="form-control" placeholder="Saisir votre message" type="text"/>
</form>