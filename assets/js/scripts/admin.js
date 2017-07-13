$(document).ready(function() {
// HOME
	bindRemoveHighlight();
	bindAddHighlight();

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

// STATIC

// TYPES CATEGORIES
	var init = function () { initModal(); };
	loadModalOnClick('#create-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	loadModalOnClick('#create-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });
	initBindEditRemove();

// ITEMS
	$('#select-category').chained('#select-type');
});

// HOME

function bindRemoveHighlight() {
	$('.remove-highlight').click(function () {
		var position = $(this).data('position');
		$(position).html($('#waiting-div').html());
		var action = baseUrl + 'admin/refreshHighlight/';

		$.ajax({
			type: 'post',
			url: action,
			data: { id: 0, position: position },
			dataType: 'html',
			success: function (data) {
				$(position).html(data);
				bindAddHighlight();
				refresh();
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}

function bindAddHighlight() {
	$('.add-highlight').click(function () {
		var id = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('item');
		if (id != null && id > 0) {
			var position = $(this).data('position');
			$(position).html($('#waiting-div').html());
			var action = baseUrl + 'admin/refreshHighlight/';

			$.ajax({
				type: 'post',
				url: action,
				data: { id: id, position: position },
				dataType: 'html',
				success: function (data) {
					$(position).html(data);
					bindRemoveHighlight();
					refresh();
				},
				error: function(xhr, status, error) {
					toastr['error'](xhr.responseText, 'Attention');
				}
			});
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

// STATIC

// TYPES CATEGORIES

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

function initBindEditRemove() {
	var init = function () { initModal(); };
	loadModalOnClick('.edit-type', { target: '#modal-sm', controller: 'admin', action: 'type' }, { todo: init });
	loadModalOnClick('.edit-category', { target: '#modal-sm', controller: 'admin', action: 'category' }, { todo: init });

	bindDelete('.remove-type', '#type-list');
	bindDelete('.remove-category', '#category-list');
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

// ITEMS