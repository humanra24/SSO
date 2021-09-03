<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="m-0 font-weight-bold text-secondary" style="font-size: 20px;">Daftar Matkul</span>
		<a href="#" data-toggle="modal" data-target="#tambah"><span class="float-right mr-5"
				style="font-size: 20px; color: blue;"><i class="fas fa-plus"></i></span></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>SKS</th>
						<th>Prodi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($matkul as $mk) : ?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $mk['kd_mk']; ?></td>
						<td><?= $mk['nama_mk']; ?></td>
						<td><?= $mk['sks']; ?></td>
						<td><?= $mk['prodi']; ?></td>
						<td>
							<a href="<?= base_url(); ?>matkul/hapus/<?= $mk['id']; ?>"
								onclick="return confirm('Yakin Hapus?')"><span
									style="font-size: 20px; color: Tomato;"><i class="fas fa-trash"></i></span></a>

							&nbsp;|&nbsp;

							<a href="#" data-id="<?= $mk['id']; ?>" data-kd="<?= $mk['kd_mk']; ?>"
								data-nama="<?= $mk['nama_mk']; ?>" data-prodi="<?= $mk['prodi']; ?>" data-sks="<?= $mk['sks']; ?>" data-toggle="modal"
								data-target="#ambil"><span style="font-size: 20px; color: lightgreen;"><i
										class="fas fa-edit"></i></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- tambah Modal-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data MataKuliah</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('matkul/tambah'); ?>" method="post">
					<div class="mb-3">
						<label for="" class="form-label">Kode MK</label>
						<input type="text" class="form-control" name="kd" id="kd" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nama MK</label>
						<input type="text" class="form-control" name="nama" id="nama" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">SKS</label>
						<input type="number" class="form-control" name="sks" id="sks" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Prodi</label>
						<select id="prodi" name="prodi" class="form-control" required>
							<option value="">-- Pilih --</option>
							<option value="Informatika">Informatika</option>
							<option value="Teknik Komputer">Teknik Komputer</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End tambah Modal-->

<!-- ambil Modal-->
<div class="modal fade" id="ambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data MataKuliah</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('matkul/ubah'); ?>" method="post">
					<input type="text" name="id" hidden id="id" value="">
					<div class="mb-3">
						<label for="" class="form-label">Kode MK</label>
						<input type="text" class="form-control" name="kd" id="kd" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nama MK</label>
						<input type="text" class="form-control" name="nama" id="nama" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">SKS</label>
						<input type="number" class="form-control" name="sks" id="sks" value="" required>
					</div>
					<label for="" class="form-label">Prodi</label>
					<select id="prodi" name="prodi" class="form-control" required>
						<option value="">-- Pilih --</option>
						<option value="Informatika">Informatika</option>
						<option value="Teknik Komputer">Teknik Komputer</option>
						<option value="Sistem Informasi">Sistem Informasi</option>
					</select>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End ambil Modal-->

<script>
	$(document).ready(function () {
		// Untuk sunting
		$('#ambil').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#id').attr("value", div.data('id'));
			modal.find('#kd').attr("value", div.data('kd'));
			modal.find('#nama').attr("value", div.data('nama'));
			modal.find('#sks').attr("value", div.data('sks'));
			modal.find('#prodi').attr("value", div.data('prodi'));
		});
	});

</script>
