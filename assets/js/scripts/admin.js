$(document).ready(function() {
	initToastr();

// HOME
	bindRemoveHighlight();
	bindAddHighlight();

	$("#admin-home #save-home").click(function () {
		var concept = $('#admin-home #concept').val();
		var highlights = $('#admin-home #highlights').val();

		$('#admin-home #result-message').html($("#waiting-div").html());
		var action = baseUrl + 'admin/save_home/';

		$.ajax({
			type: "post",
			data: { concept: concept, highlights: highlights },
			url: action,
			dataType: "html",
			success: function (data) {
				toastr["success"]("Vos modifications ont été prises en compte", "Succès")
			},
			error: function(xhr, status, error) {
				toastr["error"]("Un problème est survenu lors de l'enregistrement de vos modifications", "Attention")
			}
		});
	});

// STATIC

// TYPES CATEGORIES
	$.fn.editable.defaults.mode = 'inline'
	$('.editable').editable({
		type: 'text',
		name: 'name',
		pk: $(this).data('key'),
		url: baseUrl + 'admin/edit_type',
		title: 'Nouveau label ?',
		emptytext: '',
		success: function(response, newValue) {
			alert("OK");
		}
	});
});

function initToastr() {
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-bottom-center",
		"preventDuplicates": true,
		"onclick": null,
		"showDuration": "1000",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
}

// HOME

function bindRemoveHighlight() {
	$("#admin-home .remove-highlight").click(function () {
		var position = $(this).data('position');
		$('#admin-home #' + position).html($("#waiting-div").html());
		var action = baseUrl + 'admin/refreshHighlight/0/' + position;

		$.ajax({
			url: action,
			dataType: "html",
			success: function (data) {
				$('#admin-home #' + position).html(data);
				bindAddHighlight();
				refresh();
			}
		});
	});
}

function bindAddHighlight() {
	$("#admin-home .add-highlight").click(function () {
		var id = $('#admin-home  #items').find('option[value="' + $('#select-highlight').val() + '"]').data('item');
		if (id != null && id > 0) {
			var position = $(this).data('position');
			$('#admin-home #' + position).html($("#waiting-div").html());
			var action = baseUrl + 'admin/refreshHighlight/' + id + '/' + position;

			$.ajax({
				url: action,
				dataType: "html",
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

