<div class="container-fluid">
	<div class="row px-lg-5 ms-lg-5 mt-5">
		<div class="col-lg col-lg-3 mb-3">
			<div class="text-center">
				<img src="<?= base_url() ?>/ProfileImage/<?php echo($data['profil_pic']); ?>" class="profile-user-img img-fluid img-circle" alt="Profil Image">
			</div>
			<br>
			<div class="ps-lg-0 ps-2">
				<h2 class="text-gray"><?php echo($data['nama_lengkap']); ?></h2>
				<div class="d-flex">
					<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
					<?php if($data['rating'] == null){ ?>
						<p class="exp-ment-desc card-text">
						-
						</p>
					<?php } else { ?>
						<p class="exp-ment-desc card-text">
						<?php echo number_format((float)$data['rating'], 1, '.', ''); ?> / 5
						</p>
					<?php } ?>
				</div>
				<p class="text-gray">Rp <?php echo number_format($data['tarif']); ?> / Sesi</p>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
					Atur Pertemuan
				</button>
			</div>
		</div>
		<!-- /.col -->
		<div class="col me-lg-5">
			<div class="row mb-3 mb-lg-3">
				<div class="col">
					<div class="card">
						<div class="card-body text-gray">
							<h4 class="card-title">Tentang Mentor</h4>
							<p>
								<?php echo($data['tentang']); ?>
							</p>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-sm text-center border-end">
									<h1><i class="fas fa-book green"></i></h1>
									<h4 class="text-gray"><?php echo($data['keahlian']); ?></h4>
								</div>
								<div class="col-sm text-center border-end">
									<h1><i class="fas fa-clock green"></i></h1>
									<p class="text-gray m-0">Waktu Respon</p>
									<h4 class="text-gray"><?php echo($data['waktu_respon']); ?> Jam</h4>
								</div>
								<div class="col-sm text-center">
									<h1><i class="fas fa-graduation-cap green"></i></h1>
									<h4 class="text-gray"><?php echo($data['tingkatan']); ?></h4>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<div class="row px-lg-5 ms-lg-5 me-lg-4">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<!-- Header -->
					<div class="row p-lg-3">
						<div class="col-md-auto">
							<h4 class="card-title text-gray">20 Ulasan pada pengajar</h4>
						</div>
						<div class="col col-lg-auto">
							<div class="d-flex">
								<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
								<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
								<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
								<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
								<p class="me-2 text-warning"><i class="fas fa-star"></i></p>
							</div>
						</div>
						<div class="col">
							<small class="card-title text-gray">5.0/5.0</small>
						</div>
					</div>
					<!-- /Header -->
					<!-- Content -->
					<div class="row p-lg-3">
						<div class="col-3 col-sm-auto border-end">
							<div class="text-center me-2">
								<img src="<?= base_url() ?>/ProfileImage/user-default.png" class="profile-user-img-small img-fluid img-circle" alt="Profil Image">
							</div>
							<!-- <div class="d-flex align-items-center">
								
								<div class="text-center me-2">
									<img src="<= base_url() ?>/ProfileImage/user-default.png" class="profile-user-img-small img-fluid img-circle" alt="Profil Image">
								</div>
								<h5>Margareth</h5>
							</div> -->
						</div>
						<div class="col">
							<h5>Margareth</h5>
							<p>Pengajar memberikan materi dengan sangat baik, penyampaiannya pun mudah dimengerti</p>
						</div>
					</div>
					<!-- /Content -->
					<!-- Footer Button -->
					<div class="row">
						<div class="col text-center mt-2">
							<a href="#" class="text-gray text-decoration-none">Tampilkan lebih</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Atur Jadwal Pertemuan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="row mb-3">
						<div class="col">
							<label for="timeStart" class="form-label">Mulai</label>
							<input type="time" class="form-control" name="timeStart" id="">
						</div>
						<div class="col">
							<label for="timeFinish" class="form-label">Selesai</label>
							<input type="time" class="form-control" name="timeFinish" id="">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col">
							<label for="date" class="form-label">Tanggal</label>
							<input type="date" class="form-control" name="date" id="">
						</div>
						<div class="col">
							<label for="session" class="form-label">Sesi</label>
							<input type="number" class="form-control" name="session" id="">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<select class="form-select" aria-label="place" name="place">
								<option selected>Tempat</option>
								<option value="1">Online</option>
								<option value="2">Offline</option>
								<!-- <option value="3">Three</option> -->
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-green">Ajukan</button>
			</div>
		</div>
	</div>
</div>