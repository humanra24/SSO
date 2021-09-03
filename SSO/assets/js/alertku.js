const flashData = $('.flash-data').data('flashdata');
const flashSiapa = $('.flash-siapa').data('flashsiapa');
const flashPen = $('.flash').data('flashdata');
const flashAda = $('.flash-ada').data('flashdata');


if (flashData) {
	Swal.fire({
		title: 'Data ' + flashSiapa,
		text: 'Berhasil ' + flashData,
		icon: 'success',
		showConfirmButton: false,
		timer: 1500
	});
}

if (flashAda) {
	Swal.fire('Data Supplier Sudah Ada')
}

if (flashPen) {
	Swal.fire({
		title: 'Tidak Ada',
		text: 'Barang',
		icon: 'error'
	});
}

$('.hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	const id = $(this).attr('id');
	const name = $(this).attr('name');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: 'Data ' + id + ' dengan nama " ' + name + ' " akan dihapus!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});

});
