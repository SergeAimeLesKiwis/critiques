function init_items() {
	init_editable();
	$('#select-category').chained('#select-type');

	var callback = function() { init_items(); };
	datalist_loader('#items', '#datalist-items', 'admin/load_item', '#form-content', callback);

	add_link_modal('item-description');

	$('#send-infos').click(function() {
		var action = $(this).data('action');
		var url = 'admin/' + action;
		var id = $('#item-id').val();
		var title = $('#item-title').val();
		var author = $('#item-author').val();
		var publish_date = $('#item-publish-date').val();
		var category = $('#select-category').val();
		var description = $('#item-description').html();

		if (action == 'add_item') {
			var success_message = 'L\'oeuvre a bien été ajoutée';
		} else if (action == 'update_item') {
			var success_message = 'L\'oeuvre a bien été modifiée';
		}

		var reset = function() {
			if (action == 'add_item') {
				$('#item-title').val('');
				$('#item-title').focusout();
				$('#item-author').val('');
				$('#item-author').focusout();
				$('#item-publish-date').val('');
				$('#select-type').val(null);
				$('#select-category').val(null);
				$('#item-description').html('');
				$('#item-description').focusout();
			} else if (action == 'update_item') {
				var newType = $('#select-type option[value="' + $('#select-type').val() + '"]').html();
				var newCategory = $('#select-category option[value="' + $('#select-category').val() + '"]').html();

				$('#items').find('option[data-item="' + id + '"]').html(newType + ' - ' + newCategory);
			}
		};

		send_infos(url, { id: id, title: title, author: author, publish_date: publish_date, category: category, description: description }, null, { todo: reset, success_message: success_message });
	});
}