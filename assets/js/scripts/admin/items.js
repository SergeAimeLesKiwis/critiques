function init_items() {
	init_editable();
	$('#select-category').chained('#select-type');

	var callback = function() { init_items(); };
	datalist_loader('#items', '#datalist-items', 'admin/load_item', '#form-content', callback);

	var api = function() {
		$('#get-query').click(function() {
			google_api();
		});
	};

	load_modal_on_click('#api-google', { target: '#modal-sm', controller: 'admin', action: 'api' }, { todo: api });

	var image = function() {
		$('#image-preview').attr('src', $('#item-image').val());
	};

	load_modal_on_click('#show-image', { target: '#modal', controller: 'admin', action: 'image' }, { todo: image });

	add_link_modal('item-description');

	$('#send-infos').click(function() {
		var action = $(this).data('action');
		var url = 'admin/' + action;
		var id = $('#item-id').val();
		var title = $('#item-title').val();
		var author = $('#item-author').val();
		var publish_date = $('#item-publish-date').val();
		var category = $('#select-category').val();
		var image = $('#item-image').val();
		var description = $('#item-description').html();

		if (action == 'add_item') {
			var success_message = 'L\'oeuvre a bien été ajoutée';
		} else if (action == 'update_item') {
			var success_message = 'L\'oeuvre a bien été modifiée';
		}

		var reset = function() {
			if (action == 'add_item') {
				set_value('#item-title');
				set_value('#item-author');
				set_value('#item-publish-date');
				set_value('#select-type');
				set_value('#select-category');
				set_value('#item-image');
				set_value('#item-description');
			} else if (action == 'update_item') {
				var newType = $('#select-type option[value="' + $('#select-type').val() + '"]').html();
				var newCategory = $('#select-category option[value="' + $('#select-category').val() + '"]').html();

				$('#items').find('option[data-key="' + id + '"]').html(newType + ' - ' + newCategory);
			}
		};

		send_infos(url, { id: id, title: title, author: author, publish_date: publish_date, category: category, image: image, description: description }, null, { todo: reset, success_message: success_message });
	});

	var init_delete = function() {
		$('#items').find('option[data-key="' + $('#item-id').val() + '"]').remove();
		$('#datalist-items').val('');
		$('#form-content').empty();
	};

	bind_delete('#remove-item', null, init_delete);
}

function google_api() {
	$.ajax({
		type: 'get',
		url: "https://www.googleapis.com/books/v1/volumes?q=" + $('#api-query').val(),
		dataType: "json",
		success: function(data) {
			if (data.items.length > 0) {
				var item = data.items[0].volumeInfo;
				var title = item.title || '';
				var author = item.authors || '';
				var publish_date = item.publishedDate || '';
				var image = item.imageLinks.smallThumbnail || '';
				var description = item.description || '';
				var link = item.infoLink || '';
				if (link != '') link = '<br /><a href="' + link + '" class="brown-color" target="_blank">Acheter</a>';

				set_value('#item-title', title);
				set_value('#item-author', author);
				set_value('#item-publish-date', publish_date);
				set_value('#item-image', image);
				set_value('#item-description', description + link);

				close_current_modal();

				toastr['info']('Si l\'oeuvre n\'est pas celle attendue, soyez plus précis dans votre recherche', 'Attention');
			} else {
				toastr['error']('Aucune oeuvre ne correspond à votre recherche', 'Attention');
			}
		},
		error: function(xhr, status, error) {
			toastr['error']('Veuillez rentrer un titre ou un auteur', 'Attention');
		}
	});
}