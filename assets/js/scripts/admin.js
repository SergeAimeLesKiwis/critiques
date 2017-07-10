var highlights = [];

$(document).ready(function() {
	$('.highlight .glyphicon-plus').click(function() {
		var id = $('#select-highlight').val();

		if (id > 0) {
			$(this).toggle();
			$(this).siblings('.glyphicon-minus').toggle();
			$(this).siblings('.highlight-item').find('#item-id').html(id);
		}
	});

	$('.highlight .glyphicon-minus').click(function() {
		$(this).toggle();
		$(this).siblings('.glyphicon-plus').toggle();
		$(this).siblings('.highlight-item').find('#item-id').html('');
	});
});

function refresh(selector, value) {
	$(selector).val($.makeArray(value).join());
}