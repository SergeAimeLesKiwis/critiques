function init_types_categories() {
	var init = function () {
		var url = $('#modal-sm #send-infos-url').val();
		var todo = function () { init_bind_edit_remove(); };
		var success_message = 'Vos modifications ont été prises en compte';

		$('#modal-sm #send-type-modal-new').click(function() {
			var name = $('#modal-sm #type_name').val();
			send_infos(url, { name: name }, '#type-list', { todo: todo, success_message: success_message });
		});

		$('#modal-sm #send-type-modal-edit').click(function() {
			var id = $('#modal-sm #type_id').val();
			var name = $('#modal-sm #type_name').val();
			send_infos(url, { id: id, name: name }, '.editable-type-' + id, { todo: todo, success_message: success_message });
		});

		$('#modal-sm #send-category-modal-new').click(function() {
			var name = $('#modal-sm #category_name').val();
			var type = $('#modal-sm #category_type').val();
			send_infos(url, { name: name, type: type }, '#category-list', { todo: todo, success_message: success_message });
		});

		$('#modal-sm #send-category-modal-edit').click(function() {
			var id = $('#modal-sm #category_id').val();
			var name = $('#modal-sm #category_name').val();
			var type = $('#modal-sm #category_type').val();
			send_infos(url, { id: id, name: name, type: type }, '.editable-category-' + id, { todo: todo, success_message: success_message });
		});
	};

	load_modal_on_click('#create-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	load_modal_on_click('#create-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });
	init_bind_edit_remove();
}

function init_bind_edit_remove() {
	var init = function () { initModal(); };
	load_modal_on_click('.edit-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	load_modal_on_click('.edit-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });

	bind_delete('.remove-type', '#type-list');
	bind_delete('.remove-category', '#category-list');
}

function bind_delete(selector, target) {
	$(selector).click(function () {
		var action = baseUrl + 'admin/delete_' + $(this).data('action') + '/';
		var id = $(this).data('key');

		$.ajax({
			type: 'post',
			url: action,
			data: { id: id },
			dataType: 'html',
			success: function (data) {
				$(target).html(data);
				init_bind_edit_remove();
				toastr['success']('Vos modifications ont été prises en compte', 'Succès');
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}