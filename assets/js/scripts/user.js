$(document).ready(function() {
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