<input type="hidden" id="me" data-id="<?php echo $user->id; ?>" data-username="<?php echo $user->username; ?>" />

<div id="chat" data-room="<?php echo $room->id; ?>" data-admin="<?php echo $room->admin->id; ?>">
	<?php foreach ($messages as $message) { ?>
		<?php if ($message->user->id == $user->id) { ?>
			<div class="message message-me row bg-green-color white-text animated slideInRight">
		<?php } else { ?>
			<div class="message message-other row bg-brown-color white-text animated slideInLeft">
		<?php } ?>
		
			<div class="col-md-3"><?php echo $message->user->username; ?></div>
			<div class="col-md-7"><?php echo htmlspecialchars($message->content); ?></div>
			<div class="col-md-2">
				<small>
					<span class="pull-right">
						<?php echo $message->getDateFormated(); ?>
					</span>
					<br />
					<span class="pull-right">
						<?php echo $message->getHourFormated(); ?>
					</span>
				</small>
			</div>
		</div>
	<?php } ?>
</div>

<form id="send-message" action="" class="md-form">
		<input id="message" autocomplete="off" class="form-control" placeholder="Saisir votre message" type="text"/>
</form>