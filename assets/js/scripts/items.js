new WOW().init();

$(document).ready(function() {
	$('#select-category').chained('#select-type');

	var init = function() { init_infos_modal(); };
	load_modal_on_click('.show-infos', { target: '#modal-lg', controller: 'item', action: 'infos' }, { todo: init, reloadable: true });


});

function init_infos_modal() {
	init_ratings();

	$('.see-infos').click(function() {
		var action = $(this).data('action');
		var key = $(this).data('key');
		close_current_modal();
		window.location.replace(base_url + 'item/' + key + '/' + action);
	});
}

function init_ratings() {
	$('.grade').hover(
		function() {
			var value = $(this).data('value');
			$(".grade").filter(function() { return parseInt($(this).data('value')) <= value; }).each(function() {
				$(this).addClass('grade-hover').addClass('fa-star').removeClass('fa-star-half-o').removeClass('fa-star-o');
			});

			$(".grade").filter(function() { return parseInt($(this).data('value')) > value; }).each(function() {
				$(this).addClass('fa-star-o').removeClass('fa-star').removeClass('fa-star-half-o');
			});
		},
		function() {
			$(".grade").each(function() {
				var base_icon = $(this).data('base');
				$(this).removeClass('grade-hover').removeClass('fa-star').removeClass('fa-star-o').addClass(base_icon);
			});
		}
	);

	$('.grade').click(function() {
		var item = $('#modal-item').val();
		var value = $(this).data('value');
		var init = function() { init_ratings(); };

		send_infos(base_url + 'item/grade', { item: item, value: value }, '#grades', { todo: init, success_message: 'Votre vote a été pris en compte', open: true })
	});
}