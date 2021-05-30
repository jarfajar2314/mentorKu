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
	<div class="row px-lg-5 ms-lg-5 me-lg-4 mt-3">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<!-- Header -->
					<div class="row p-lg-3">
						<div class="col-md-auto">
							<h4 class="card-title text-gray"><?= count($ulasan)?> Ulasan pada pengajar</h4>
						</div>
						<div class="col col-lg-auto">
							<div class="d-flex">
								<p class="text-warning"><i class="fas fa-star"></i>
									<small class="card-title text-gray"><?php echo $data['rating'] != '' ? number_format((float)$data['rating'], 1, '.', '') . " / 5" : '-'; ?></small>
								</p>
							</div>
						</div>
					</div>
					<!-- /Header -->
					<!-- Content -->
					<?php if(count($ulasan) > 0){ ?>
						<?php for($i = 0; $i < count($ulasan); $i++){ ?>
						<div class="row p-lg-3 ulasan_col <?php if($i > 0) echo("d-none") ?>">
							<div class="col-3 col-sm-auto border-end">
								<div class="text-center me-2">
									<img src="<?= base_url() ?>/ProfileImage/<?= $ulasan[$i]['profil_pic'] ?>" class="profile-user-img-small img-fluid img-circle" alt="Profil Image">
								</div>
							</div>
							<div class="col">
								<div class="d-flex align-item-center">
									<h5 class="my-0"><?= $ulasan[$i]['nama_lengkap'] ?></h5>
									<div class="d-flex ms-2">
										<p class="text-warning my-0"><i class="fas fa-star"></i>
											<small class="card-title text-gray my-0"><?php echo $ulasan[$i]['rating'] ?></small>
										</p>
									</div>
								</div>
								<p><?= $ulasan[$i]['ulasan'] ?></p>
							</div>
						</div>
						<?php } ?>
						<?php if(count($ulasan) > 1){ ?>
						<!-- Footer Button -->
						<div class="row">
							<div class="col text-center mt-2">
								<button class="btn btn-white text-gray" id="show_more">Tampilkan lebih</button>
							</div>
						</div>
						<?php } ?>
					<?php } else { ?>
						<div class="row p-lg-3">
							<div class="col text-gray">
								<h5 class="text-center">Belum ada ulasan</h5>
							</div>
						</div>
					<?php } ?>
					<!-- /Content -->
					<!-- Tulis Ulasan -->
					<?php if(isset($_SESSION['id_user'])){?>
					<div class="row">
						<div class="col mt-2">
							<button class="btn btn-green w-100" data-bs-toggle="modal" data-bs-target="#tulis_ulasan">Tulis Ulasan</button>
						</div>
					</div>
					<?php } ?>
					<!-- /tulis ulasan -->
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
				<form action="/StudentController/requestPembelajaran" method="POST" id="reqForm">
					<input type="text" value="<?= $_GET['id']?>" name='id_pengajar' hidden>
					<input type="text" value="<?= $data['keahlian']?>" name='subjek' hidden>
					<input type="text" value="<?= $data['tarif']?>" name='biaya' hidden>
					<div class="row mb-3">
						<div class="col">
							<?php $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
								$arr = explode(" ",$data['jadwal']);
							?>
							<?php if(count($arr) > 0){ ?>
								<select class="form-select" name='pilihJadwal'>
									<option selected value="">Pilih hari</option>
								<?php foreach($arr as $item){ ?>
									<option value="<?php echo($item); ?>"><?php echo($days[$item]); ?></option>
								<?php } ?>
								</select>
							<?php } else { ?>
								<p class="text-danger">Jadwal Pengajar Penuh</p>
							<?php } ?>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col">
							<label for="date" class="form-label">Tanggal</label>
							<input type="date" class="form-control" name="tanggal" id="">
						</div>
						<div class="col">
							<label for="session" class="form-label">Sesi</label>
							<input type="number" class="form-control" name="sesi" id="">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<select class="form-select" aria-label="place" name="tempat">
								<option selected value="">Tempat</option>
								<option value="Online">Online</option>
								<option value="Offline">Offline</option>
								<!-- <option value="3">Three</option> -->
							</select>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-green" <?php if(count($arr) == 0) echo('disabled'); ?>>Ajukan</button>
			</div>
				</form>
		</div>
	</div>
</div>

<!-- Modal Tulis Ulasan -->
<div class="modal fade" id="tulis_ulasan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tulis Ulasan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="/StudentController/insertUlasan" method="POST" id="tulis_ulasan">
					<input type="text" value="<?= $_GET['id']?>" name='id_pengajar' hidden>
					<input type="text" value="<?= $_SESSION['id_user']?>" name='id_pelajar' hidden>
					<div class="form-group mb-3">
						<label class="form-label">Ulasan</label>
						<textarea class="form-control" id="about" rows="3" name="ulasan"></textarea>
					</div>
					<div class="row mb-3">
						<div class="container ps-4">
							<div class="row">
								<div class="col col-auto mb-3 mb-lg-0 p-0">
									<input class="form-check-input m-0" id="star-1" type="radio" value="1" name="rating" hidden>
									<button class="btn btn-lg btn-white text-warning" id="star-1-btn" type="button"><i class="far fa-star m-0" id="star-1-i"></i></button>
								</div>
								<div class="col col-auto mb-3 mb-lg-0 p-0">
									<input class="form-check-input m-0" id="star-2" type="radio" value="2" name="rating" hidden>
									<button class="btn btn-lg btn-white text-warning" id="star-2-btn" type="button"><i class="far fa-star m-0" id="star-2-i"></i></button>
								</div>
								<div class="col col-auto mb-3 mb-lg-0 p-0">
									<input class="form-check-input m-0" id="star-3" type="radio" value="3" name="rating" hidden>
									<button class="btn btn-lg btn-white text-warning" id="star-3-btn" type="button"><i class="far fa-star m-0" id="star-3-i"></i></button>
								</div>
								<div class="col col-auto mb-3 mb-lg-0 p-0">
									<input class="form-check-input m-0" id="star-4" type="radio" value="4" name="rating" hidden>
									<button class="btn btn-lg btn-white text-warning" id="star-4-btn" type="button"><i class="far fa-star m-0" id="star-4-i"></i></button>
								</div>
								<div class="col col-auto mb-3 mb-lg-0 p-0">
									<input class="form-check-input m-0" id="star-5" type="radio" value="5" name="rating" hidden>
									<button class="btn btn-lg btn-white text-warning" id="star-5-btn" type="button"><i class="far fa-star m-0" id="star-5-i"></i></button>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-green" id="ulasan_submit" disabled>Submit</button>
			</div>
				</form>
		</div>
	</div>
</div>

<script>
	$().ready(function() {
		$("#show_more").click(function(){
			$(".ulasan_col").removeClass("d-none");
			$("#show_more").addClass("d-none");
		});

		$("#star-1-btn").click(function(){
			$("#star-1-i").removeClass("far");
			$("#star-1-i").addClass("fas");
			$("#star-1").attr("checked", true);

			$("#star-2").attr("checked", false); $("#star-3").attr("checked", false); $("#star-4").attr("checked", false); $("#star-5").attr("checked", false);
			$("#star-2-i").removeClass("fas"); $("#star-3-i").removeClass("fas"); $("#star-4-i").removeClass("fas"); $("#star-5-i").removeClass("fas");
			$("#star-2-i").addClass("far"); $("#star-3-i").addClass("far"); $("#star-4-i").addClass("far"); $("#star-5-i").addClass("far");
            if($("#ulasan_submit").attr("disabled")){
				$("#ulasan_submit").attr("disabled", false);
            }
            return false;
        });

		$("#star-2-btn").click(function(){
			$("#star-2").attr("checked", true);
			$("#star-1-i").removeClass("far"); $("#star-1-i").addClass("fas");
			$("#star-2-i").removeClass("far"); $("#star-2-i").addClass("fas");
			// Unselect all
			$("#star-1").attr("checked", false); $("#star-3").attr("checked", false); $("#star-4").attr("checked", false); $("#star-5").attr("checked", false);
			$("#star-3-i").removeClass("fas"); $("#star-4-i").removeClass("fas"); $("#star-5-i").removeClass("fas");
			$("#star-3-i").addClass("far"); $("#star-4-i").addClass("far"); $("#star-5-i").addClass("far");
            if($("#ulasan_submit").attr("disabled")){
				$("#ulasan_submit").attr("disabled", false);
            }
            return false;
        });

		$("#star-3-btn").click(function(){
			$("#star-3").attr("checked", true);
			$("#star-1-i").removeClass("far"); $("#star-1-i").addClass("fas");
			$("#star-2-i").removeClass("far"); $("#star-2-i").addClass("fas");
			$("#star-3-i").removeClass("far"); $("#star-3-i").addClass("fas");
			// Unselect all
			$("#star-1").attr("checked", false); $("#star-2").attr("checked", false); $("#star-4").attr("checked", false); $("#star-5").attr("checked", false);
			$("#star-4-i").removeClass("fas"); $("#star-5-i").removeClass("fas");
			$("#star-4-i").addClass("far"); $("#star-5-i").addClass("far");
            if($("#ulasan_submit").attr("disabled")){
				$("#ulasan_submit").attr("disabled", false);
            }
            return false;
        });

		$("#star-4-btn").click(function(){
			$("#star-4").attr("checked", true);
			$("#star-1-i").removeClass("far"); $("#star-1-i").addClass("fas");
			$("#star-2-i").removeClass("far"); $("#star-2-i").addClass("fas");
			$("#star-3-i").removeClass("far"); $("#star-3-i").addClass("fas");
			$("#star-4-i").removeClass("far"); $("#star-4-i").addClass("fas");
			// Unselect all
			$("#star-1").attr("checked", false); $("#star-2").attr("checked", false); $("#star-3").attr("checked", false); $("#star-5").attr("checked", false);
			$("#star-5-i").removeClass("fas");$("#star-5-i").addClass("far");
            if($("#ulasan_submit").attr("disabled")){
				$("#ulasan_submit").attr("disabled", false);
            }
            return false;
        });

		$("#star-5-btn").click(function(){
			$("#star-5").attr("checked", true);
			$("#star-1-i").removeClass("far"); $("#star-1-i").addClass("fas");
			$("#star-2-i").removeClass("far"); $("#star-2-i").addClass("fas");
			$("#star-3-i").removeClass("far"); $("#star-3-i").addClass("fas");
			$("#star-4-i").removeClass("far"); $("#star-4-i").addClass("fas");
			$("#star-5-i").removeClass("far"); $("#star-5-i").addClass("fas");
			// Unselect all
			$("#star-1").attr("checked", false); $("#star-2").attr("checked", false); $("#star-3").attr("checked", false); $("#star-4").attr("checked", false);
            if($("#ulasan_submit").attr("disabled")){
				$("#ulasan_submit").attr("disabled", false);
            }
            return false;
        });

		$("#reqForm").validate({
			rules:{
				pilihJadwal: "required",
				tanggal: "required",
				sesi: "required",		
				tempat: "required",		
			},
			messages:{
				pilihJadwal: "Mohon memilih jadwal",
				tanggal: "Mohon mengisi tanggal",
				sesi: "Mohon mengisi jumlah sesi",		
				tempat: "Mohon memilih tempat",		
			},
		});
	});
</script>