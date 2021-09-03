<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="m-0 font-weight-bold text-secondary" style="font-size: 20px;">Daftar Mata Kuliah</span>
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
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->