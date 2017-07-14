function initItems() {
	$('#select-category').chained('#select-type');

	$('#show-add-link').click(function() {
		var label = $('label[for="item-description"]');
		if (!label.hasClass('active')) label.addClass('active');
	});

	$('.editable').focusin(function() {
		$(this).siblings('i.prefix').addClass('active');
		$(this).siblings('label[for="' + $(this).attr('id') + '"]').addClass('active');
	});

	$('.editable').focusout(function() {
		$(this).siblings('i.prefix').removeClass('active');
		if ($(this).html().length == 0) $(this).siblings('label[for="' + $(this).attr('id') + '"]').removeClass('active');
	});

	var addLink = function() {
		$('#add-link').click(function() {
			var url = $('#link_url').val();
			var label = $('#link_label').val();

			if (url == '') {
				toastr['error']('L\'url ne peut être vide', 'Attention');
			} else if (label == '') {
				toastr['error']('Le label ne peut être vide', 'Attention');
			} else {
				closeCurrentModal();
				var description = $('#item-description').html();
				$('#item-description').html(description + '<a href="' + url + '" class="brown-color" target="_blank">' + label + '</a>');
				toastr['success']('Ajout du lien', 'Succès');
			}
		});

		$('[data-toggle="tooltip"]').tooltip();
	};

	loadModalOnClick('#show-add-link', { target: '#modal-sm', controller: 'admin', action: 'link' }, { todo: addLink });

	$('#send-infos').click(function() {
		var id = $('#item-id').val();
		var url = 'admin/' + $(this).data('action');
		var title = $('#item-title').val();
		var author = $('#item-author').val();
		var publish_date = $('#item-publish-date').val();
		var category = $('#select-category').val();
		var description = $('#item-description').html();

		if (url == 'admin/add_item') {
			var success_message = 'L\'oeuvre a bien été ajoutée';
		} else if (url == 'admin/update_item') {
			var success_message = 'Vos modifications ont été prises en compte';
		}

		var reset = function() {
			if (url == 'admin/add_item') {
				$('#item-title').val('');
				$('#item-title').focusout();
				$('#item-author').val('');
				$('#item-author').focusout();
				$('#item-publish-date').val('');
				$('#select-type').val(null);
				$('#select-category').val(null);
				$('#item-description').html('');
				$('#item-description').focusout();
			} else if (url == 'admin/update_item') {
				var newType = $('#select-type option[value="' + $('#select-type').val() + '"]').html();
				var newCategory = $('#select-category option[value="' + $('#select-category').val() + '"]').html();
				
				$('#items').find('option[data-item="' + id + '"]').html(newType + ' - ' + newCategory);
			}
		};

		sendInfos(url, { id: id, title: title, author: author, publish_date: publish_date, category: category, description: description }, null, { todo: reset, success_message: success_message });
	});

	$('#load-item').click(function() {
		var init = function() { initItems(); };
		var id = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('item');

		if (id != null && id > 0) {
			sendInfos('admin/load_item', { id: id }, '#form-content', { todo: init });
		}
	});
}