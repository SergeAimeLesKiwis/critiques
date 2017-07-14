$(document).ready(function() {
	$('#contact-admin').click(function() {
		var name = $('#contact-name').val();
		var email = $('#contact-email').val();
		var subject = $('#contact-subject').val();
		var message = $('#contact-message').val();

		if ($('#contact-name[type="text"]').length > 0 && name == '') {
			toastr['error']('Le nom ne peut être vide', 'Attention');
		} else if ($('#contact-email[type="text"]').length > 0 && email == '') {
			toastr['error']('L\'email ne peut être vide', 'Attention');
		} else if (subject == '') {
			toastr['error']('Le sujet ne peut être vide', 'Attention');
		} else if (message == '') {
			toastr['error']('Le message ne peut être vide', 'Attention');
		} else {
			sendInfos('home/contact', { name: name, email: email, subject: subject, message: message }, null, { success_message: 'Votre message a bien été envoyé' });
		}
	});
});