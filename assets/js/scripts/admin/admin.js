$(document).ready(function() {
	$('#admin-menu a.nav-link').click(function() {
		var type = $(this).data('action')
		var url = baseUrl + 'admin/load_admin_' + type;
		var target = $(this).attr('href');

		var init = function() {
			if (type == 'home') {
				init_home();
			} else if (type == 'static') {
				init_static();
			} else if (type == 'types_categories') {
				init_types_categories();
			} else if (type == 'add_item') {
				init_items();
			} else if (type == 'update_item') {
				datalist_loader();
				init_items();
			} else if (type == 'rooms') {
				datalist_loader();
				init_rooms();
			} else if (type == 'users') {
				init_users();
			}
		}

		send_infos(url, {}, target, { todo: init });
	});
});