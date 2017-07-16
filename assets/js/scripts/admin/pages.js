function init_pages() {
	init_editable();

	var callback = function() { init_pages(); };
	datalist_loader('#pages', '#datalist-pages', 'admin/load_page', '#form-content', callback);

	add_link_modal('page-text');

	$('#send-infos').click(function() {
		var action = $(this).data('action');
		var url = 'admin/' + action;
		var id = $('#page-id').val();
		var name = $('#page-name').val();
		var label = $('#page-label').val();
		var title = $('#page-title').val();
		var text = $('#page-text').html();

		if (action == 'add_page') {
			var message = 'La page a bien été ajoutée';
		} else if (action == 'update_page') {
			var message = 'La page a bien été modifiée';
		}

		var reset = function() {
			if (action == 'add_page') {
				$('#page-name').val('');
				$('#page-name').focusout();
				$('#page-label').val('');
				$('#page-label').focusout();
				$('#page-title').val('');
				$('#page-title').focusout();
				$('#page-text').html('');
				$('#page-text').focusout();
			} else if (action == 'update_page') {
				$('#pages').find('option[data-key="' + id + '"]').html(name);
			}
		};

		send_infos(url, { id: id, name: name, label: label, title: title, text: text }, null, { todo: reset, success_message: message });
	});

	var init_delete = function() {
		init_bind_edit_remove();
		$('#datalist-pages').val('');
		$('#form-content').empty();
	};
	var init_delete = function() {
		$('#pages').find('option[data-key="' + $('#page-id').val() + '"]').remove();
		$('#datalist-pages').val('');
		$('#form-content').empty();
	};
	bind_delete('#remove-page', null, init_delete);
}