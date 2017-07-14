$(document).ready(function() {
	$('#admin-menu a.nav-link').click(function() {
		var type = $(this).data('action')
		var url = baseUrl + 'admin/load_admin_' + type;
		var target = $(this).attr('href');
		var init = getInit(type);

		sendInfos(url, {}, target, { todo: init });
	});
});

function getInit(type) {
	if (type == 'home') return function() { initHome(); };
	if (type == 'static') return function() { initStatic(); };
	if (type == 'types_categories') return function() { initTypesCategories(); };
	if (type == 'add_item')	return function() { initItems(); };
	if (type == 'update_item') return function() { initItems(); };
	if (type == 'rooms') return function() { initRooms(); };
	if (type == 'users') return function() { initUsers(); };
}