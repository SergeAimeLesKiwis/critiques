$(document).ready(function() {
	initToastr();

// HOME
	bindRemoveHighlight();
	bindAddHighlight();

	$('#admin-home #save-home').click(function () {
		var action = baseUrl + 'admin/save_home/';
		var concept = $('#admin-home #concept').val();
		var highlights = $('#admin-home #highlights').val();

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
	var callback = function () { initModal(); };
	loadModalOnClick('#admin-types-categories #create-type', '#modal-sm', { controller: 'admin', action: 'type', key: '0' }, callback);
	loadModalOnClick('#admin-types-categories #create-category', '#modal-sm', { controller: 'admin', action: 'category', key: '0' }, callback);
	initBindEditRemove();
});

function initToastr() {
	toastr.options = {
		'closeButton': false,
		'debug': false,
		'newestOnTop': false,
		'progressBar': true,
		'positionClass': 'toast-bottom-center',
		'preventDuplicates': true,
		'onclick': null,
		'showDuration': '1000',
		'hideDuration': '1000',
		'timeOut': '5000',
		'extendedTimeOut': '1000',
		'showEasing': 'swing',
		'hideEasing': 'linear',
		'showMethod': 'fadeIn',
		'hideMethod': 'fadeOut'
	}
}

// HOME

function bindRemoveHighlight() {
	$('#admin-home .remove-highlight').click(function () {
		var position = $(this).data('position');
		$('#admin-home #' + position).html($('#waiting-div').html());
		var action = baseUrl + 'admin/refreshHighlight/';

		$.ajax({
			type: 'post',
			url: action,
			data: { id: 0, position: position },
			dataType: 'html',
			success: function (data) {
				$('#admin-home #' + position).html(data);
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
	$('#admin-home .add-highlight').click(function () {
		var id = $('#admin-home  #items').find('option[value="' + $('#select-highlight').val() + '"]').data('item');
		if (id != null && id > 0) {
			var position = $(this).data('position');
			$('#admin-home #' + position).html($('#waiting-div').html());
			var action = baseUrl + 'admin/refreshHighlight/';

			$.ajax({
				type: 'post',
				url: action,
				data: { id: id, position: position },
				dataType: 'html',
				success: function (data) {
					$('#admin-home #' + position).html(data);
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
	highlights += $('#admin-home #first .item-id').data('value') + '|';
	highlights += $('#admin-home #second .item-id').data('value') + '|';
	highlights += $('#admin-home #third .item-id').data('value') + '|';
	highlights += $('#admin-home #fourth .item-id').data('value') + '|';
	highlights += $('#admin-home #fifth .item-id').data('value') + '|';
	highlights += $('#admin-home #sixth .item-id').data('value');
	$('#admin-home #highlights').val(highlights);
}

// STATIC

// TYPES CATEGORIES

function bindDelete(selector, target) {
	$('#admin-types-categories ' + selector).click(function () {
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
	var callback = function () { initModal(); };
	loadModalOnClick('#admin-types-categories .edit-type', '#modal-sm', { controller: 'admin', action: 'type' }, callback);
	loadModalOnClick('#admin-types-categories .edit-category', '#modal-sm', { controller: 'admin', action: 'category' }, callback);
	bindDelete('.remove-type', '#type-list');
	bindDelete('.remove-category', '#category-list');
}

function initModal() {
	var url = $('#modal-sm #send-infos-url').val();
	var callback = function () { initBindEditRemove(); };

	$('#modal-sm #send-type-modal-new').click(function() {
		var name = $('#modal-sm #type_name').val();
		var target = '#admin-types-categories #type-list';

		sendModalInfos(url, { name: name }, target, callback);
	});

	$('#modal-sm #send-type-modal-edit').click(function() {
		var id = $('#modal-sm #type_id').val();
		var name = $('#modal-sm #type_name').val();
		var target = '#admin-types-categories .editable-type-' + id;

		sendModalInfos(url, { id: id, name: name }, target, callback);
	});

	$('#modal-sm #send-category-modal-new').click(function() {
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		var target = '#admin-types-categories #category-list';

		sendModalInfos(url, { name: name, type: type }, target, callback);
	});

	$('#modal-sm #send-category-modal-edit').click(function() {
		var id = $('#modal-sm #category_id').val();
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		var target = '#admin-types-categories .editable-category-' + id;

		sendModalInfos(url, { id: id, name: name, type: type }, target, callback);
	});
}