$(document).ready(function() {
	initToastr();

// HOME
	bindRemoveHighlight();
	bindAddHighlight();

	$('#admin-home #save-home').click(function () {
		var action = baseUrl + 'admin/save_home/';
		var concept = $('#admin-home #concept').val();
		var highlights = $('#admin-home #highlights').val();

		$('#admin-home #result-message').html($('#waiting-div').html());

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
	bindModal('#create-type');
	bindModal('#create-category');
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

function bindModal(selector) {
	$('#admin-types-categories ' + selector).click(function () {
		$('#modal-sm').modal();
		$('#modal-sm .modal-content').html($('#waiting-div').html());

		var action = baseUrl + 'admin/load_' + $(this).data('action') + '_modal/';
		var	id = $(this).data('id');

		$.ajax({
			type: 'post',
			url: action,
			data: { id: id },
			dataType: 'html',
			success: function (data) {
				$('#modal-sm .modal-content').html(data);
				initModal();
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}

function bindDelete(selector, target) {
	$('#admin-types-categories ' + selector).click(function () {
		var action = baseUrl + 'admin/delete_' + $(this).data('action') + '/';
		var id = $(this).data('id');

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

function sendModalData(action, infos, target) {
	$.ajax({
		type: 'post',
		data: infos,
		url: action,
		dataType: 'html',
		success: function (data) {
			$('#modal-sm').modal('hide');
			$(target).html(data);
			initBindEditRemove();
			toastr['success']('Vos modifications ont été prises en compte', 'Succès');
		},
		error: function(xhr, status, error) {
			toastr['error'](xhr.responseText, 'Attention');
		}
	});
}

function initBindEditRemove() {
	bindModal('.edit-type');
	bindModal('.edit-category');
	bindDelete('.remove-type', '#type-list');
	bindDelete('.remove-category', '#category-list');
}

function initModal() {
	var action = $('#modal-sm #action').val();

	$('#modal-sm #send-type-modal-new').click(function() {
		var name = $('#modal-sm #type_name').val();
		var target = '#admin-types-categories #type-list';

		sendModalData(action, { name: name }, target);
	});

	$('#modal-sm #send-type-modal-edit').click(function() {
		var id = $('#modal-sm #type_id').val();
		var name = $('#modal-sm #type_name').val();
		var target = '#admin-types-categories .editable-type-' + id;

		sendModalData(action, { id: id, name: name }, target);
	});

	$('#modal-sm #send-category-modal-new').click(function() {
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		var target = '#admin-types-categories #category-list';

		sendModalData(action, { name: name, type: type }, target);
	});

	$('#modal-sm #send-category-modal-edit').click(function() {
		var id = $('#modal-sm #category_id').val();
		var name = $('#modal-sm #category_name').val();
		var type = $('#modal-sm #category_type').val();
		var target = '#admin-types-categories .editable-category-' + id;

		sendModalData(action, { id: id, name: name, type: type }, target);
	});
}