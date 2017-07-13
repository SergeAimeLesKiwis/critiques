$(document).ready(function() {
	initToastr();

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

	loadModalOnClick('.show-infos', { target: '#modal-lg', controller: 'item', action: 'infos' }, { reloadable: true });
});

function initToastr() {
	toastr.options = {
		'closeButton': false,
		'debug': false,
		'newestOnTop': false,
		'progressBar': true,
		'positionClass': 'toast-bottom-center',
		'preventDuplicates': true,
		'onclick': null,
		'showDuration': '1000',
		'hideDuration': '1000',
		'timeOut': '5000',
		'extendedTimeOut': '1000',
		'showEasing': 'swing',
		'hideEasing': 'linear',
		'showMethod': 'fadeIn',
		'hideMethod': 'fadeOut'
	}
}

function loadModalOnClick(selector, infos, callback) {
	$(selector).click(function () {
		infos.target = infos.target || $(this).data('target');
		infos.controller = infos.controller || $(this).data('controller');
		infos.action = infos.action || $(this).data('action');
		var key = $(this).data('key') || 0;

		if (!$(infos.target).is(':visible')) $(infos.target).modal('show');
		$(infos.target + ' .modal-content').html($('#waiting-div').html());

		$.ajax({
			type: 'post',
			url: baseUrl + infos.controller + '/load_' + infos.action + '_modal',
			data: { id: key },
			dataType: 'html',
			success: function (data) {
				$(infos.target + ' .modal-content').html(data);
				if (callback.todo != null) callback.todo();
				else if (callback.reloadable != null) loadModalOnClick(selector, infos, callback);
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