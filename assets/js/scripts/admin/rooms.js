function init_rooms() {
	var callback = function() { init_items(); };
	datalist_loader('#items', '#datalist-items', 'admin/load_item');
}