function bind_delete(selector, target, callback) {
	$(selector).click(function () {
		var action = baseUrl + 'admin/delete_' + $(this).data('action') + '/';
		var id = $(this).data('key');

		send_infos(action, { id: id }, target, { todo: callback, success_message: 'Suppression réussie' });
	});
}

function init_editable() {
	$('.editable').focusin(function() {
		$(this).siblings('i.prefix').addClass('active');
		$(this).siblings('label[for="' + $(this).attr('id') + '"]').addClass('active');
	});

	$('.editable').focusout(function() {
		$(this).siblings('i.prefix').removeClass('active');
		if ($(this).html().length == 0) $(this).siblings('label[for="' + $(this).attr('id') + '"]').removeClass('active');
	});
}

function datalist_loader(list, input, url, target, callback) {
	$('#datalist-loader').click(function () {
		$('#icons-loader i').addClass('invisible').removeClass('rotateIn');
		var key = $(list).find('option[value="' + $(input).val() + '"]').data('key');

		if (key != null) {
			$('#icons-loader i[class*="check"]').removeClass('invisible').addClass('rotateIn');

			send_infos(url, { key: key }, target, { todo: callback });
		} else {
			$('#icons-loader i[class*="times"]').removeClass('invisible').addClass('rotateIn');

			if (target != null) $(target).empty();
		}
	});
}

function add_link_modal(target) {
	$('#show-add-link').click(function() {
		$('label[for="' + target + '"]').addClass('active');
	});

	var addLink = function() {
		$('[data-toggle="tooltip"]').tooltip();

		$('#internal-links').change(function () {
			var name = $(this).val();

			if (name != null && name != '') {
				var page = $(this).find('option[value="' + name + '"]');

				$('#link_url').focusin();
				$('#link_url').val(page.data('url'));
				$('#link_url').focusout();

				$('#link_label').focusin();
				$('#link_label').val(page.html());
				$('#link_label').focusout();
			}
		});

		$('#add-link').click(function() {
			var url = $('#link_url').val();
			var label = $('#link_label').val();

			if (url == '') {
				toastr['error']('L\'url ne peut être vide', 'Attention');
			} else if (label == '') {
				toastr['error']('Le label ne peut être vide', 'Attention');
			} else {
				close_current_modal();
				var content = $('#' + target).html();
				$('#' + target).html(content + '<a href="' + url + '" class="brown-color" target="_blank">' + label + '</a>');
				toastr['success']('Ajout du lien', 'Succès');
			}
		});
	};

	load_modal_on_click('#show-add-link', { target: '#modal-sm', controller: 'admin', action: 'link' }, { todo: addLink });
}