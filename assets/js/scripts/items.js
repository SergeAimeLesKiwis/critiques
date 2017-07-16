new WOW().init();

$(document).ready(function() {
	$('#select-category').chained('#select-type');

	var init = function() { init_infos_modal(); };
	load_modal_on_click('.show-infos', { target: '#modal-lg', controller: 'item', action: 'infos' }, { todo: init, reloadable: true });
});

function init_infos_modal() {
	$('.see-infos').click(function() {
		var action = $(this).data('action');
		var key = $(this).data('key');

		close_current_modal();
		window.location.replace(baseUrl + 'item/' + key + '/' + action);
	});
}