<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="m-0 font-weight-bold text-secondary" style="font-size: 20px;">Daftar Buku</span>
		<?php if ($this->session->userdata['level'] == "Pegawai") : ?>
		<a href="#" data-toggle="modal" data-target="#tambah"><span class="float-right mr-5"
				style="font-size: 20px; color: blue;"><i class="fas fa-plus"></i></span></a>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Tahun</th>
						<?php if ($this->session->userdata['level'] == "Pegawai") : ?>
						<th>Aksi</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1; 
					foreach ($buku as $bk) : ?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $bk['judul_buku']; ?></td>
						<td><?= $bk['pengarang']; ?></td>
						<td><?= $bk['penerbit']; ?></td>
						<td><?php $tgl = $bk['th_terbit'];
							echo date('d/m/Y', strtotime($tgl));  ?></td>
						<?php if ($this->session->userdata['level'] == "Pegawai") : ?>
						<td>
							<a href="<?= base_url(); ?>buku/hapus/<?= $bk['id']; ?>"
								onclick="return confirm('Yakin Hapus?')"><span
									style="font-size: 20px; color: Tomato;"><i class="fas fa-trash"></i></span></a>

							&nbsp;|&nbsp;

							<a href="#" data-id="<?= $bk['id']; ?>" data-judul="<?= $bk['judul_buku']; ?>"
								data-pengarang="<?= $bk['pengarang']; ?>" data-penerbit="<?= $bk['penerbit']; ?>" data-tahun="<?= $bk['th_terbit']; ?>" data-toggle="modal"
								data-target="#ambil"><span style="font-size: 20px; color: lightgreen;"><i
										class="fas fa-edit"></i></span></a>
						</td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php if ($this->session->userdata['level'] == "Pegawai") : ?>
<!-- tambah Modal-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('buku/tambah'); ?>" method="post">
					<div class="mb-3">
						<label for="" class="form-label">Judul</label>
						<input type="text" class="form-control" name="judul" id="judul" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Pengarang</label>
						<input type="text" class="form-control" name="pengarang" id="pengarang" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Penerbit</label>
						<input type="text" class="form-control" name="penerbit" id="penerbit" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Tahun</label>
						<input type="date" class="form-control" name="tahun" id="tahun" value="" required>
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
				<h5 class="modal-title" id="exampleModalLabel">Ubah Data Buku</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?= base_url('buku/ubah'); ?>" method="post">
				<input type="text" hidden id="id" name="id">
					<div class="mb-3">
						<label for="" class="form-label">Judul</label>
						<input type="text" class="form-control" name="judul" id="judul" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Pengarang</label>
						<input type="text" class="form-control" name="pengarang" id="pengarang" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Penerbit</label>
						<input type="text" class="form-control" name="penerbit" id="penerbit" value="" required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Tahun</label>
						<input type="date" class="form-control" name="tahun" id="tahun" value="" required>
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
		$('#ambil').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#id').attr("value", div.data('id'));
			modal.find('#judul').attr("value", div.data('judul'));
			modal.find('#pengarang').attr("value", div.data('pengarang'));
			modal.find('#penerbit').attr("value", div.data('penerbit'));
			modal.find('#tahun').attr("value", div.data('tahun'));
		});
	});

</script>

<!-- /.container-fluid -->

<?php endif; ?>
