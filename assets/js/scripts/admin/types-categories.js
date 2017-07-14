function initTypesCategories() {
	var init = function () { initModal(); };
	loadModalOnClick('#create-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	loadModalOnClick('#create-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });
	initBindEditRemove();
}

function initBindEditRemove() {
	var init = function () { initModal(); };
	loadModalOnClick('.edit-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	loadModalOnClick('.edit-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });

	bindDelete('.remove-type', '#type-list');
	bindDelete('.remove-category', '#category-list');
}

function bindDelete(selector, target) {
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
				initBindEditRemove();
				toastr['success']('Vos modifications ont été prises en compte', 'Succès');
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}

function initModal() {
	var url = $('#modal-sm #send-infos-url').val();
	var todo = function () { initBindEditRemove(); };
	var success_message = 'Vos modifications ont été prises en compte';

	$('#modal-sm #send-type-modal-new').click(function() {
		var name = $('#modal-sm #type_name').val();
		sendInfos(url, { name: name }, '#type-list', { todo: todo, success_message: success_message });
	});

	$('#modal-sm #send-type-modal-edit').click(function() {
		var id = $('#modal-sm #type_id').val();
		var name = $('#modal-sm #type_name').val();
		sendInfos(url, { id: id, name: name }, '.editable-type-' + id, { todo: todo, success_message: success_message });
	});

	$('#modal-sm #send-category-modal-new').click(function() {
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		sendInfos(url, { name: name, type: type }, '#category-list', { todo: todo, success_message: success_message });
	});

	$('#modal-sm #send-category-modal-edit').click(function() {
		var id = $('#modal-sm #category_id').val();
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		sendInfos(url, { id: id, name: name, type: type }, '.editable-category-' + id, { todo: todo, success_message: success_message });
	});
}