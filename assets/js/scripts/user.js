$(document).ready(function() {
	var init = function() {
		$('#send-infos').click(function() {
			var id = $('#user-id').val();
			var username = $('#user-username').val();
			var description = $('#user-description').val();
			var replace = function() {
				$('#info-username').html(username);
				$('#info-description').html(description);
			};

			send_infos(base_url + 'user/update', { id: id, username: username, description: description }, null, { todo: replace, success_message: 'Votre profil a été mis à jour'})
		});
	};

	load_modal_on_click('#edit-user', { target: '#modal', controller: 'user', action: 'edit' }, { todo: init });

	$('#contact-user').click(function() {
		var user = $(this).data('user');
		var item = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('key');

		if (item != null && item > 0) {
			send_infos('user/contact', { user: user, item: item }, null, { success_message: 'Votre demande a bien été envoyée' });
		} else {
			toastr['error']('Veuillez choisir une oeuvre valide', 'Attention');
		}
	});
});