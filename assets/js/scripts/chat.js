$(document).ready(function() {
	$("#chat").scrollTop($("#chat")[0].scrollHeight);

	var me = { id: $('#me').data('id'), username: $('#me').data('username') };
	var client = io.connect('http://localhost:3000');

	client.emit('join', { user: me.id, name: me.username });

	$('#send-message').submit(function(e) {
		e.preventDefault();
		var message = $('#message').val();

		if (message != '') {
			$.ajax({
				type: 'post',
				url: base_url + 'roomsend',
				data: { user: id, room: $('#chat').data('room'), content: message },
				dataType: 'html',
				success: function (data) {
					client.emit('message', { user: me.id, name: me.username, content: message });
					$('#message').val('');
				},
				error: function(xhr, status, error) {
					toastr['error'](xhr.responseText, 'Attention');
				}
			});
		} else {
			toastr['error']('Le message ne peut être vide', 'Attention');
		}
		
	});

	client.on('message', function(message){
		var element = '';

		if (message.user == $('#me').data('id')) {
			element += '<div class="message message-me row bg-green-color white-text animated slideInRight">';
		} else {
			element += '<div class="message message-other row bg-brown-color white-text animated slideInLeft">';
		}
		
		element += '<div class="col-md-3">' + message.name + '</div>';
		element += '<div class="col-md-7">' + escapeHtml(message.content) + '</div>';
		element += '<div class="col-md-2">' + format_date() + '</div>';
		element += '</div>';

		$('#chat').append(element);
		$("#chat").scrollTop($("#chat")[0].scrollHeight);
	});

	client.on('join', function(user){
		var element = '<div>' + user.name + ' a rejoint le salon ...</div>';

		$('#chat').append(element);
		$("#chat").scrollTop($("#chat")[0].scrollHeight);
	});
});

function format_name(user, name) {
	var admin = $('#chat').data('admin');

	var element = '';
	element += '<span class="pull-left">';
	element += name;
	element += '</span>';
	element += '<br />';
	element += '<span class="pull-left">';
	element += '<i class="fa fa-warning report-user" data-key="' + user + '"></i>';
	element += '<i class="fa fa-ban ban-user" data-key="' + user + '"></i>';
	element += ('0' + date.getMinutes()).slice(-2);
	element += '</span>';

	return element;
}

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