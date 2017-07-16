function init_users() {
	$('.show-reports').click(function() {
		send_infos(base_url + 'admin/show_reports', { id: $(this).data('key') }, '#reports');
	});

	$('.user-action').click(function() {
		var action = $(this).data('action');
		var url = base_url + 'admin/' + action;
		var id = $(this).data('key');
		var clear = function() { $('#reports').empty(); init_users(); };
		if (action == 'warn') var message = 'L\'utilisateur a été averti';
		else if (action == 'ban') var message = 'L\'utilisateur a été banni';

		send_infos(url, { id: id }, '#user-' + id, { todo: clear, success_message: message });
	});
}