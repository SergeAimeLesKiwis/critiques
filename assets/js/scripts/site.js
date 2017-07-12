$(document).ready(function() {
	$('.toggle-slide').click(function() {
		var target = $(this).data('slide');
		$(target).slideToggle();
		$(this).find('.glyphicon-plus').toggle();
		$(this).find('.glyphicon-minus').toggle();
	});

	$('.singleton').click(function() {
		// REQUIRE CSS => .singleton:not(.showing) {display: none;}
		var target = $(this).data('target');
		$('.toggle-singleton' + target).removeClass('showing');
		$(this).addClass('showing');
	});

	loadModalOnClick('.show-infos', '#modal-lg')
});

function loadModalOnClick(selector, modal, infos, callback) {
	$(selector).click(function () {
		infos.controller = infos.controller || $(this).data('controller');
		infos.action = infos.action || $(this).data('action');
		infos.key = infos.key || $(this).data('key');

		$(modal).modal('show');
		$(modal + ' .modal-content').html($('#waiting-div').html());

		$.ajax({
			type: 'post',
			url: baseUrl + infos.controller + '/load_' + infos.action + '_modal',
			data: { id: infos.key },
			dataType: 'html',
			success: function (data) {
				$(modal + ' .modal-content').html(data);
				if (callback != null) callback();
			},
			error: function(xhr, status, error) {
				toastr['error'](xhr.responseText, 'Attention');
			}
		});
	});
}

function sendModalInfos(url, infos, target, callback) {
	$.ajax({
		type: 'post',
		data: infos,
		url: url,
		dataType: 'html',
		success: function (data) {
			closeCurrentModal();
			$(target).html(data);
			callback();
			toastr['success']('Vos modifications ont été prises en compte', 'Succès');
		},
		error: function(xhr, status, error) {
			toastr['error'](xhr.responseText, 'Attention');
		}
	});
}

function closeCurrentModal() {
	if ($('#modal-sm').is(':visible')) $('#modal-sm').modal('hide');
	if ($('#modal').is(':visible')) $('#modal').modal('hide');
	if ($('#modal-lg').is(':visible')) $('#modal-lg').modal('hide');
}