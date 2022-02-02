<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('client/dashboard'); ?>">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</div>
	<div class="col-lg-7 text-center mx-auto">
		<?= $this->session->flashdata('message'); ?>
	</div>
	<?php if ($user['foto_ktp'] == '' || $user['foto_sktp'] == '' || $user['foto_sgaji'] == '' || $user['status_pengajuan'] == 'belum pengajuan') { ?>
		<div class="row">
			<div class="col-lg-7 pt-3 mx-auto">
				<!-- Form Basic -->
				<div class="card">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">FORM PENGAJUAN</h6>
					</div>
					<div class="card-body">
						<form method="POST" action="<?= base_url('client/inputPengajuan'); ?>">
							<div class="form-group">
								<label for="Name">Nama Lengkap</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap..." value="<?= $user['nama_lengkap']; ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="Umur">Umur</label>
								<input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan umur..." value="<?= $user['umur']; ?>">
								<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="Nik">NIK</label>
								<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan nomor induk kependudukan..." value="<?= $user['nik']; ?>">
								<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="NoKK">NO KK</label>
								<input type="text" class="form-control" id="nokk" name="nokk" placeholder="Masukkan nomor kartu keluarga..." value="<?= $user['no_kk']; ?>">
								<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="Npwp">NPWP</label>
								<input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan nomor pokok wajib pajak..." value="<?= $user['npwp']; ?>">
								<?= form_error('umur', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="Gaji">Gaji Perbulan</label>
								<input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan gaji rata-rata perbulan..." value="<?= $user['gaji']; ?>">
								<?= form_error('gaji', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="Pengajuan">Jumlah Pengajuan</label>
								<select id="pengajuan" name="pengajuan" class="form-control">
									<?php if ($user['jumlah_pengajuan']) {
										echo '
                                <option value="' . $user['jumlah_pengajuan'] . '" selected>Rp ' . number_format($user['jumlah_pengajuan'], 2, '.', ',') . '</option>
                                ';
									} ?>
									<option value="1000000">Rp 1.000.000</option>
									<option value="1500000">Rp 1.500.000</option>
									<option value="3000000">Rp 3.000.000</option>
								</select>
							</div>
							<div class="form-group">
								<label for="WaktuPengajuan">Waktu Pengajuan</label>
								<select id="waktu_pengajuan" name="waktu_pengajuan" class="form-control">
									<?php if ($user['waktu_pengajuan']) {
										echo '
                                <option value="' . $user['waktu_pengajuan'] . '" selected>' . $user['waktu_pengajuan'] . ' BULAN</option>
                                ';
									} ?>
									<option value="3">3 BULAN</option>
									<option value="6">6 BULAN</option>
									<option value="12">12 BULAN</option>
								</select>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<?php if ($user['setuju_sk'] == 'on') {
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
							<?php if ($user['foto_ktp']) {
								echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $user['foto_ktp'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
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
							<?php if ($user['foto_sktp']) {
								echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $user['foto_sktp'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
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
							<?php if ($user['foto_sgaji']) {
								echo '
						<img src=" ' . base_url('assets/img/profil/') . '' . $user['foto_sgaji'] . '" class="img-thumbnail mx-auto" width="200" height="200" alt="">
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
	<?php } else { ?>
		<div class="row mb-3">
			<div class="col-lg-7 pt-3 mx-auto">
				<!-- Form Basic -->
				<div class="card">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">HASIL PENGAJUAN</h6>
					</div>
					<div class="card-body">
						<p>STATUS PENGAJUAN : <?= $user['status_pengajuan'] ?></p>
						<a href="<?= base_url('client/batalkanPengajuan') ?>" class="btn btn-danger">Batal Pengajuan</a>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
</div>
