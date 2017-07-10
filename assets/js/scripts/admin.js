$(document).ready(function() {

	bindRemoveHighlight();
	bindAddHighlight();

});

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