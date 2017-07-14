function initRooms() {
	$('#load-item').click(function () {
		var id = $('#items').find('option[value="' + $('#datalist-items').val() + '"]').data('item');

		if (id != null && id > 0) {
			$('#check-item i').addClass('invisible').removeClass('rotateIn');
			$('#check-item i[class*="check"]').removeClass('invisible').addClass('rotateIn');
		} else {
			$('#check-item i').addClass('invisible').removeClass('rotateIn');
			$('#check-item i[class*="times"]').removeClass('invisible').addClass('rotateIn');
		}
	});
}