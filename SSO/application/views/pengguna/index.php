<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="m-0 font-weight-bold text-secondary" style="font-size: 20px;">Daftar <?= $level; ?> </span>
		<a href="#" data-toggle="modal" data-target="#tambah"><span class="float-right mr-5" style="font-size: 20px; color: blue;"><i class="fas fa-plus"></i></span></a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>NI (Nomor Induk)</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Tgl Lahir</th>
						<th>Alamat</th>
						<th>No hp</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($pengguna as $pgn) : ?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $pgn['NI']; ?></td>
						<td><?= $pgn['nama']; ?></td>
						<td><?= $pgn['email']; ?></td>
						<td><?php $tgl = $pgn['tgl_lahir'];
							echo date('d/m/Y', strtotime($tgl));  ?></td>
						<td>
							<a href="#" data-alamat="<?= $pgn['alamat']; ?>" data-toggle="modal"
								data-target="#tampilAlamat"><i class="fas fa-info"></i></a>
						</td>
						<td><?= $pgn['no_telp']; ?></td>
						<td>
							<a href="<?= base_url(); ?>pengguna/hapus/<?= $pgn['id_pengguna']; ?>"
								onclick="return confirm('Yakin Hapus?')"><span
									style="font-size: 20px; color: Tomato;"><i class="fas fa-trash"></i></span></a>

							&nbsp;|&nbsp;

							<a href="#" data-kd="<?= $pgn['id_pengguna']; ?>" data-ni="<?= $pgn['NI']; ?>"
								data-nama="<?= $pgn['nama']; ?>" data-email="<?= $pgn['email']; ?>"
								data-alamat="<?= $pgn['alamat']; ?>" data-tgl_lahir="<?= $pgn['tgl_lahir']; ?>"
								data-no_hp="<?= $pgn['no_telp']; ?>"
								data-toggle="modal" data-target="#ambil"><span
									style="font-size: 20px; color: lightgreen;"><i class="fas fa-edit"></i></span></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<!-- alamat Modal-->
<div class="modal fade" id="tampilAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Alamat</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<textarea class="form-control" style="background:white" disabled rows="10"
						id="isiAlamat"></textarea>
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- End alamat Modal-->

<!-- tambah Modal-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data <?= $level; ?></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('pengguna/tambah'); ?>" method="post">
					<input type="text" name="level" hidden id="level" value="<?= $level; ?>">
					<div class="mb-3">
						<label for="" class="form-label">NI (Nomor Induk)</label>
						<input type="text" class="form-control" name="NI" id="NI" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" id="email" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Password</label>
						<input type="text" class="form-control" name="pass" id="pass" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tgl" id="tgl" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nomor HP</label>
						<input type="text" id="hp" name="hp" class="form-control" value="" required>
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
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data <?= $level; ?></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('pengguna/ubah'); ?>" method="post">
					<input type="text" name="id" hidden id="id" value="">
					<input type="text" name="level" hidden id="level" value="<?= $level; ?>">
					<div class="mb-3">
						<label for="" class="form-label">NI (Nomor Induk)</label>
						<input type="text" class="form-control" name="NI" id="NI" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" id="email" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tgl" id="tgl" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Nomor HP</label>
						<input type="text" id="hp" name="hp" class="form-control" value="" required>
					</div>

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
		$('#tampilAlamat').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#isiAlamat').html(div.data('alamat'));
		});
	});
</script>

<script>
	$(document).ready(function () {
		// Untuk sunting
		$('#ambil').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#id').attr("value",div.data('kd'));
			modal.find('#NI').attr("value",div.data('ni'));
			modal.find('#nama').attr("value",div.data('nama'));
			modal.find('#email').attr("value",div.data('email'));
			modal.find('#tgl').attr("value",div.data('tgl_lahir'));
			modal.find('#alamat').html(div.data('alamat'));
			modal.find('#hp').attr("value",div.data('no_hp'));
		});
	});
</script>
