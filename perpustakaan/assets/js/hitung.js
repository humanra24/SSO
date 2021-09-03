function kurang() {
	var tot = parseInt($("#total").val())
	var bay = parseInt($("#bayar").val())
	var kembali = bay - tot;

	if (kembali <= 0) {
		$("#kembali").val('0000');
	} else if (!isNaN(kembali)) {
		$("#kembali").val(kembali);
	} else {
		$("#kembali").val('0000');
	}
}