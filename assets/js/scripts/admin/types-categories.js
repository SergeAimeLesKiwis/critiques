$(document).ready(function() {
	var init = function () { initModal(); };
	loadModalOnClick('#create-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	loadModalOnClick('#create-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });
	initBindEditRemove();
});

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
	var callback = function () { initBindEditRemove(); };

	$('#modal-sm #send-type-modal-new').click(function() {
		var name = $('#modal-sm #type_name').val();
		sendModalInfos(url, { name: name }, '#type-list', callback);
	});

	$('#modal-sm #send-type-modal-edit').click(function() {
		var id = $('#modal-sm #type_id').val();
		var name = $('#modal-sm #type_name').val();
		sendModalInfos(url, { id: id, name: name }, '.editable-type-' + id, callback);
	});

	$('#modal-sm #send-category-modal-new').click(function() {
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		sendModalInfos(url, { name: name, type: type }, '#category-list', callback);
	});

	$('#modal-sm #send-category-modal-edit').click(function() {
		var id = $('#modal-sm #category_id').val();
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		sendModalInfos(url, { id: id, name: name, type: type }, '.editable-category-' + id, callback);
	});
}