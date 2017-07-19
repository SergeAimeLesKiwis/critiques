$(document).ready(function() {
	var client = io.connect('http://localhost:3000');  
	$('#send-message').submit(function(e) {
		e.preventDefault();
		var id = $('#me').data('id');
		var username = $('#me').data('username');
		var message = $('#message').val();

		if (message != '') {
			client.emit('message', { user: id, name: username, content: message });
			$('#message').val('');
		} else {
			toastr['error']('Le message ne peut être vide', 'Attention');
		}
		
	});

	client.on('message', function(message){
		var element = '';

		if (message.user == $('#me').data('id')) {
			element += '<div class="message row bg-darkgrey-color white-text animated slideInRight">';
		} else {
			element += '<div class="message row bg-grey-color white-text animated slideInLeft">';
		}
		
		element += '<div class="col-md-3">' + message.name + '</div>';
		element += '<div class="col-md-7">' + escapeHtml(message.content) + '</div>';
		element += '<div class="col-md-2">' + format_date() + '</div>';
		element += '</div>';

		$('#chat').append(element);
	});
});

function format_date(date = new Date()) {
	var element = '';
	element += '<small>';
	element += '<span class="pull-right">';
	element += ('0' + date.getDate()).slice(-2);
	element += '/';
	element += ('0' + (date.getMonth() + 1)).slice(-2);
	element += '/';
	element += date.getFullYear();
	element += '</span>';
	element += '<br />';
	element += '<span class="pull-right">';
	element += ('0' + date.getHours()).slice(-2);
	element += ':';
	element += ('0' + date.getMinutes()).slice(-2);
	element += '</span>';
	element += '</small>';

	return element;
}

function escapeHtml (string) {
	var entityMap = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#39;',
		'/': '&#x2F;',
		'`': '&#x60;',
		'=': '&#x3D;'
	};

	return String(string).replace(/[&<>"'`=\/]/g, function (s) {
		return entityMap[s];
	});
}