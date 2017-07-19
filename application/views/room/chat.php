<!--
	<style>
		* { margin: 0; padding: 0; box-sizing: border-box; }
		body { font: 13px Helvetica, Arial; }
		form { background: #000; padding: 3px; position: fixed; bottom: 0; width: 100%; }
		form input { border: 0; padding: 10px; width: 90%; margin-right: .5%; }
		form button { width: 9%; background: rgb(130, 224, 255); border: none; padding: 10px; }
		#messages { list-style-type: none; margin: 0; padding: 0; }
		#messages li { padding: 5px 10px; }
		#messages li:nth-child(odd) { background: #eee; }
	</style>
-->

<input type="hidden" id="me" data-id="<?php echo $user->id; ?>" data-username="<?php echo $user->username; ?>" />

<div id="chat">
	<div class="message row">
		<div class="col-md-3">user</div>
		<div class="col-md-7">message</div>
		<div class="col-md-2"><small>date</small></div>
	</div>
</div>
<form id="send-message" action="">
	<input id="message" autocomplete="off" /><button>Send</button>
</form>