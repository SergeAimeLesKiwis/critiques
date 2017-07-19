new WOW().init();

$(document).ready(function() {
	$('#select-category').chained('#select-type');

	$('.join').click(function() {
		var key = $(this).data('key');
		var todo = function() {
			window.location.replace(base_url + 'chat/' + key);
		};

		send_infos(base_url + 'room/can_join', { item: key }, null, { todo: todo });
	});

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
			$('.grade').addClass('grade-hover').removeClass('fa-star-half-o');

			var value = $(this).data('value');
			$('.grade').filter(function() { return parseInt($(this).data('value')) <= value; }).each(function() {
				$(this).addClass('fa-star').removeClass('fa-star-o');
			});

			$('.grade').filter(function() { return parseInt($(this).data('value')) > value; }).each(function() {
				$(this).addClass('fa-star-o').removeClass('fa-star');
			});
		},
		function() {
			$('.grade').each(function() {
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