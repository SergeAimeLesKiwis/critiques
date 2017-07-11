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
				toastr['error']('Un problème est survenu lors de l\'enregistrement de vos modifications', 'Attention');
			}
		});
	});

// STATIC

// TYPES CATEGORIES
	bindModal('#create-type');
	bindModal('.edit-type');
	bindModal('#create-category');
	bindModal('.edit-category');
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
		var action = baseUrl + 'admin/refreshHighlight/0/' + position;

		$.ajax({
			type: 'get',
			url: action,
			dataType: 'html',
			success: function (data) {
				$('#admin-home #' + position).html(data);
				bindAddHighlight();
				refresh();
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
			var action = baseUrl + 'admin/refreshHighlight/' + id + '/' + position;

			$.ajax({
				type: 'get',
				url: action,
				dataType: 'html',
				success: function (data) {
					$('#admin-home #' + position).html(data);
					bindRemoveHighlight();
					refresh();
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
		$('#admin-types-categories #modal').modal();
		$('#admin-types-categories #modal .modal-content').html($('#waiting-div').html());

		loadModal(baseUrl + 'admin/load_' + $(this).data('action') + '_modal/' + $(this).data('id'));
	});
}

function loadModal(action) {
	$.ajax({
		type: 'get',
		url: action,
		dataType: 'html',
		success: function (data) {
			$('#admin-types-categories #modal .modal-content').html(data);
			initModal();
		},
		error: function(xhr, status, error) {
			toastr['error']('DAS IST EINE PROBLEM', 'Attention')
		}
	});
}

function sendModalData(action, infos, target) {
	$.ajax({
		type: 'post',
		data: infos,
		url: action,
		dataType: 'html',
		success: function (data) {
			$('#admin-types-categories #modal').modal('hide');
			$(target).html(data);
			bindModal('.edit-type');
			bindModal('.edit-category');
			toastr['success']('Vos modifications ont été prises en compte', 'Succès');
		},
		error: function(xhr, status, error) {
			toastr['error'](xhr.responseText, 'Attention');
		}
	});
}

function initModal() {
	var action = $('#admin-types-categories #modal #action').val();

	$('#admin-types-categories #modal #send-type-modal-new').click(function() {
		var name = $('#admin-types-categories #modal #type_name').val();
		var target = '#admin-types-categories #type-list';

		sendModalData(action, { name: name }, target);
	});

	$('#admin-types-categories #modal #send-type-modal-edit').click(function() {
		var id = $('#admin-types-categories #modal #type_id').val();
		var name = $('#admin-types-categories #modal #type_name').val();
		var target = '#admin-types-categories #type-line-' + id;

		sendModalData(action, { id: id, name: name }, target);
	});

	$('#admin-types-categories #modal #send-category-modal-new').click(function() {
		var name = $('#admin-types-categories #modal #category_name').val();
		var type = $('#admin-types-categories #modal #category_type').val();
		var target = '#admin-types-categories #category-list';

		sendModalData(action, { name: name, type: type }, target);
	});

	$('#admin-types-categories #modal #send-category-modal-edit').click(function() {
		var id = $('#admin-types-categories #modal #category_id').val();
		var name = $('#admin-types-categories #modal #category_name').val();
		var type = $('#admin-types-categories #modal #category_type').val();
		var target = '#admin-types-categories #category-line-' + id;

		sendModalData(action, { id: id, name: name, type: type }, target);
	});
}