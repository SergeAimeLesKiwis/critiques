$(document).ready(function() {
	$('#admin-menu a.nav-link').click(function() {
		var action = $(this).data('action')
		var url = base_url + 'admin/load_admin_' + action;
		var target = $(this).attr('href');

		var init = function() {
			if (action == 'home') {
				init_home();
			} else if (action == 'add_page' || action == 'update_page') {
				init_pages();
			} else if (action == 'types_categories') {
				init_types_categories();
			} else if (action == 'add_item' || action == 'update_item') {
				init_items();
			} else if (action == 'add_room') {
				init_add_room();
			} else if (action == 'manage_rooms') {
				init_manage_rooms();
			} else if (action == 'users') {
				init_users();
			}
		}

		send_infos(url, {}, target, { todo: init });
	});
});