function init_home() {
	bind_remove_highlight();
	bind_add_highlight();

	$('#save-home').click(function () {
		var action = baseUrl + 'admin/save_home/';
		var concept = $('#concept').val();
		var highlights = $('#highlights').val();

		$.ajax({
			type: 'post',
			data: { concept: concept, highlights: highlights },
			url: action,
			dataType: 'html',
			success: function (data) {
				toastr['success']('Vos modifications ont été prises en compte', 'Succès');
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}

function bind_remove_highlight() {
	$('.remove-highlight').click(function () {
		var position = $(this).data('position');
		$(position).html($('#waiting-div').html());
		var url = baseUrl + 'admin/refresh_highlight/';
		var todo = function() { bind_add_highlight(); refresh(); };

		send_infos(url, { id: 0, position: position }, position, { todo: todo });
	});
}

function bind_add_highlight() {
	$('.add-highlight').click(function () {
		var id = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('item');
		if (id != null && id > 0) {
			var position = $(this).data('position');
			$(position).html($('#waiting-div').html());
			var url = baseUrl + 'admin/refresh_highlight/';
			var todo = function() { bind_remove_highlight(); refresh(); };

			send_infos(url, { id: id, position: position }, position, { todo: todo });
		}
	});
}

function refresh() {
	var highlights = '';
	highlights += $('#first .item-id').data('value') + '|';
	highlights += $('#second .item-id').data('value') + '|';
	highlights += $('#third .item-id').data('value') + '|';
	highlights += $('#fourth .item-id').data('value') + '|';
	highlights += $('#fifth .item-id').data('value') + '|';
	highlights += $('#sixth .item-id').data('value');
	$('#highlights').val(highlights);
}