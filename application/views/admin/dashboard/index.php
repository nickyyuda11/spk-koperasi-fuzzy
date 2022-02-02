<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</div>
	<div class="row mb-3">
		<!-- Invoice Example -->
		<div class="col-xl-12 col-lg-7 mb-4">
			<div class="card">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">LIST DATA PENGAJUAN</h6>
				</div>
				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th>Name</th>
								<th>Umur</th>
								<th>Gaji</th>
								<th>Jumlah Pengajuan</th>
								<th>Waktu Pengajuan</th>
								<th>Hasil SPK</th>
								<th>Status Pengajuan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 0;
							foreach ($client as $client) : ?>
								<tr>
									<td><a href="<?= base_url('admin/detail/') . $client['username'] ?>" target="blank"><?= $client['nama_lengkap']; ?></a></td>
									<td><?= $client['umur']; ?></td>
									<td><?= $client['gaji']; ?></td>
									<td><?= $client['jumlah_pengajuan']; ?></td>
									<td><?= $client['waktu_pengajuan']; ?> BULAN</td>
									<td><?= $client['hasil_spk']; ?></td>
									<td><?= $client['status_pengajuan']; ?></td>
									<td><?php if ($client['hasil_spk'] > 50) :
											echo '<span class="badge badge-success">Layak</span>';
										else :
											echo '<span class="badge badge-warning">Tidak Layak</span>';
										endif;
										?>
									</td>
									<td><a href="<?= base_url('admin/detail/') . $client['username'] ?>" class="btn btn-primary">Detail</a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
	<!--Row-->

</div>
<!---Container Fluid-->
</div>
