function hanyaAngka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	return true;
}

function hanyaHuruf() {
	return event.charCode < 48 || event.charCode  >57
}

