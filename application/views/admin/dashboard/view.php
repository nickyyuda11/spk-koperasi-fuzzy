<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Detail User</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
			<li class="breadcrumb-item active">Detail</li>
		</ol>
	</div>
	<div class="col-lg-7 text-center mx-auto">
		<?= $this->session->flashdata('message'); ?>
	</div>
	<div class="row">
		<div class="col-lg-7 pt-3 mx-auto">
			<!-- Form Basic -->
			<div class="card">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">FORM PENGAJUAN</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<p>STATUS PENGAJUAN: <?= $client['status_pengajuan'] ?></p>
						<p>HASIL SPK: <?= $client['hasil_spk'] ?></p>
						<p>HASIL PENGAJUAN: <?= ($client['hasil_spk'] > 50) ? '<span class="badge badge-success">Layak</span>' : '<span class="badge badge-success">Layak</span>' ?></p>
						<a href="<?= base_url('admin/setujuiPengajuan/' . $client['username'] . '') ?>" class="btn btn-success">Setujui Pengajuan</a>
						<a href="<?= base_url('admin/tolakPengajuan/' . $client['username'] . '') ?>" class="btn btn-danger">Tolak Pengajuan</a>
					</div>
				</div>
			</div>
			</br>
			<div class="card">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">FORM PENGAJUAN</h6>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= base_url('client/inputPengajuan'); ?>">
						<div class="form-group">
							<label for="Name">Nama Lengkap</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap..." value="<?= $client['nama_lengkap']; ?>">
							<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="Umur">Umur</label>
							<input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan umur..." value="<?= $client['umur']; ?>">
							<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="Nik">NIK</label>
							<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan nomor induk kependudukan..." value="<?= $client['nik']; ?>">
							<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="NoKK">NO KK</label>
							<input type="text" class="form-control" id="nokk" name="nokk" placeholder="Masukkan nomor kartu keluarga..." value="<?= $client['no_kk']; ?>">
							<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="Npwp">NPWP</label>
							<input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan nomor pokok wajib pajak..." value="<?= $client['npwp']; ?>">
							<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="Gaji">Gaji Perbulan</label>
							<input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan gaji rata-rata perbulan..." value="<?= $client['gaji']; ?>" disabled>
							<?= form_error('gaji', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="Pengajuan">Jumlah Pengajuan</label>
							<select id="pengajuan" name="pengajuan" class="form-control" disabled>
								<?php if ($client['jumlah_pengajuan']) {
									echo '
                                <option value="' . $client['jumlah_pengajuan'] . '" selected>Rp ' . number_format($client['jumlah_pengajuan'], 2, '.', ',') . '</option>
                                ';
								} ?>
								<option value="1000000">Rp 1.000.000</option>
								<option value="1500000">Rp 1.500.000</option>
								<option value="3000000">Rp 3.000.000</option>
							</select>
						</div>
						<div class="form-group">
							<label for="WaktuPengajuan">Waktu Pengajuan</label>
							<select id="waktu_pengajuan" name="waktu_pengajuan" class="form-control" disabled>
								<?php if ($client['waktu_pengajuan']) {
									echo '
                                <option value="' . $client['waktu_pengajuan'] . '" selected>' . $client['waktu_pengajuan'] . ' BULAN</option>
                                ';
								} ?>
								<option value="3">3 BULAN</option>
								<option value="6">6 BULAN</option>
								<option value="12">12 BULAN</option>
							</select>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<?php if ($client['setuju_sk'] == 'on') {
									echo '<input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="setujusk" checked>
									';
								} else {
									echo '
									<input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="setujusk">
									';
								} ?>
								<label class="custom-control-label" for="customControlAutosizing">Setuju syarat & ketentuan yang berlaku di Buka Uang</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			</br>
		</div>
		<div class="col-lg-7 pt-3 mx-auto">
			<!-- Form Basic -->
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">UPLOAD FOTO KTP</h6>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('client/uploadImage/foto_ktp'); ?>
					<div class="form-group">
						<?php if ($client['foto_ktp']) {
							echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $client['foto_ktp'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
						';
						} ?>
					</div>
					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="userfile" size="20">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">UPLOAD FOTO SELFIE KTP</h6>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('client/uploadImage/foto_sktp'); ?>
					<div class="form-group">
						<?php if ($client['foto_sktp']) {
							echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $client['foto_sktp'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
						';
						} ?>
					</div>
					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="userfile" size="20">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">UPLOAD FOTO SLIP GAJI</h6>
				</div>
				<div class="card-body">
					<?php echo form_open_multipart('client/uploadImage/foto_sgaji'); ?>
					<div class="form-group">
						<?php if ($client['foto_sgaji']) {
							echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $client['foto_sgaji'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
						';
						} ?>
					</div>
					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" name="userfile" size="20">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close(); ?>
				</div>
			</div>
			</br>
		</div>
	</div>
</div>
</div>
