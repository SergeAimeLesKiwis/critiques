function init_users() {
	$('.show-report').click(function() {
		send_infos(baseUrl + 'admin/show_reports', { id: $(this).data('key') }, '#show-reports');
	});
}