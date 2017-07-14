function initUsers() {
	$('.show-report').click(function() {
		sendInfos(baseUrl + 'admin/show_reports', { id: $(this).data('key') }, '#show-reports');
	});
}