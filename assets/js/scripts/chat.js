$(document).ready(function() {
	var client = io.connect('http://localhost:3000');  
	$('#send-message').submit(function(e) {
		e.preventDefault();
		client.emit('message', { user: 1, name: 'test', content: $('#message').val() });
		$('#message').val('');
	});

	client.on('message', function(message){
		if (message.user == $('#me').val())
			$('#messages').append($('<div class="bg-darkgrey-color white-text">').text('user = ' + message.user + ' / name = ' + message.name + ' / content = ' + message.content));
		else
			$('#messages').append($('<div class="bg-grey-color white-text">').text('user = ' + message.user + ' / name = ' + message.name + ' / content = ' + message.content));

	});
});