function init_add_room() {
	datalist_loader('#items', '#datalist-items', 'admin/load_item');

	$('#datalist-loader').click(function () {
		var key = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('key');

		if (key != null) {
			$('#room-item').val(key)
		} else {
			$('#room-item').val('');
		}
	});

	$('#send-infos').click(function() {
		var action = $(this).data('action');
		var url = 'admin/' + action;
		var item = $('#room-item').val();
		var name = $('#room-name').val();
		var start_date = $('#room-start-date').val();
		var end_date = $('#room-end-date').val();

		if (action == 'add_room') {
			var success_message = 'Le salon a bien été ajouté';
		}

		var reset = function() {
			if (action == 'add_room') {
				$('#datalist-items').val('');
				$('#room-item').val('');
				$('#room-name').val('');
				$('#room-name').focusout();
				$('#room-start-date').val('');
				$('#room-end-date').val('');
			}
		};

		send_infos(url, { item: item, name: name, start_date: start_date, end_date: end_date }, null, { todo: reset, success_message: success_message });
	});
}

function init_manage_rooms() {
	$('.room-action').click(function() {
		var action = $(this).data('action');
		var url = base_url + 'admin/' + action;
		var id = $(this).data('key');

		var init = function() { $('#room-' + id).remove(); init_manage_rooms(); };

		if (action == 'activate_room') {
			var target = '#active-list';
			var success_message = 'Le salon a été activé';
		} else if (action == 'delete_room') {
			var target = null;
			var success_message = 'Le salon a été supprimé';
		}

		send_infos(url, { id: id }, target, { todo: init, success_message: success_message });
	});
}