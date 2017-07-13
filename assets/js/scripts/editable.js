$(document).ready(function() {
	$('.editable').focusin(function() {
		$(this).siblings('i.prefix').addClass('active');
		$(this).siblings('label[for="' + $(this).attr('id') + '"]').addClass('active');
	});

	$('.editable').focusout(function() {
		$(this).siblings('i.prefix').removeClass('active');
		if ($(this).html().length == 0) $(this).siblings('label[for="' + $(this).attr('id') + '"]').removeClass('active');
	});
});