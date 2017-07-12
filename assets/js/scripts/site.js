$(document).ready(function() {
	$('.toggle-slide').click(function() {
		var target = $(this).data('slide');
		$(target).slideToggle();
		$(this).find('.glyphicon-plus').toggle();
		$(this).find('.glyphicon-minus').toggle();
	});

	$('.singleton').click(function() {
		// REQUIRE CSS => .singleton:not(.showing) {display: none;}
		var target = $(this).data('target');
		$('.toggle-singleton' + target).removeClass('showing');
		$(this).addClass('showing');
	});
});