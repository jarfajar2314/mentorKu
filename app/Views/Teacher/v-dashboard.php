<div class="container-fluid">
    <?php if(isset($_SESSION['msg'])){ ?>
        <div class="row px-5 pt-5">
            <?php if($_SESSION['msg'] == 'successModul'){ ?>
                <div class="alert alert-success" role="alert">
                    Modul berhasil diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'failedModul'){ ?>
                <div class="alert alert-danger" role="alert">
                    Modul gagal diperbarui.
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="wrapper">    
        <div class="row px-lg-5 mx-lg-5 py-3 mt-3">
            <!-- Profile Image -->
            <div class="col-lg-3 ms-lg-5 mb-3 mb-lg-0">
                <div class="text-center">
                    <img src="<?= base_url() ?>/ProfileImage/<?php echo($data['profil_pic']); ?>" class="profile-user-img img-fluid img-circle" alt="Profil Image">
                </div>
            </div>
            <!-- /.col -->
            <!-- Profile -->
            <div class="col mb-lg-5 mb-3">
                <?php $session = session();?>
                <h1 class="fw-bold text-center text-lg-start">Halo, <?php echo($session->get('nama')); ?></h1>
                <br>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-user"></i></p>
                    </div>
                    <div class="col">
                        <p><?php echo($data['nama_lengkap']); ?></p>
                    </div>
                </div>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-envelope"></i></p>
                    </div>
                    <div class="col">
                        <p><?php echo($session->get('email')); ?></p>
                    </div>
                </div>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-map-marker-alt"></i></p>
                    </div>
                    <div class="col">
                        <p><?php echo($data['kota']); ?></p>
                    </div>
                </div>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-dollar-sign"></i></p>
                    </div>
                    <div class="col">
                        <p>Rp <?php echo($data['tarif']); ?>,-</p>
                    </div>
                </div>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-book"></i></p>
                    </div>
                    <div class="col">
                        <p><?php echo($data['keahlian']); ?></p>
                    </div>
                </div>
                <div class="row ms-4 ms-lg-0">
                    <div class="col-1">
                        <p><i class="fas fa-graduation-cap"></i></p>
                    </div>
                    <div class="col">
                        <p><?php echo($data['tingkatan']); ?></p>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-lg-3 pt-lg-5 text-center text-lg-start">
                <div class="">
                    <a class="btn btn-green mb-lg-2" href="/pengajar/edit" role="button"><i class="fas fa-edit"></i> Ubah Profil</a>
                    <button type="button" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Upload Modul
                    </button>
                    <?php if($data['modul'] != ''){ ?>
                    <br>
                    <a class="btn btn-green mt-2" href="#" role="button">Lihat Modul</a>
                    <?php } ?>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row px-lg-5 mx-lg-5">
            <div class="col px-4 px-lg-5 mx-lg-5">
                <div class="card">
                    <div class="card-body">
                        <!-- Jika belum ada pembelajaran -->
                        <?php if($pembelajaran_count == 0){ ?>
                        <h3 class="card-title text-center m-3">Belum Ada Pembelajaran :(</h3>
                        
                        <!-- Jika sudah ada pembelajaran -->
                        <?php } else { ?>
                        <div class="table-t">                
                            <?php foreach($riwayat_pembelajaran as $row) { ?>
                            <?php if($row['status'] != '0'){ ?>
                            <div class="row-t">
                                <div class="cell-t" data-title="Waktu">
                                    <?php echo(substr($row['waktu_mulai'], 0, 5)) ?> - <?php echo(substr($row['waktu_selesai'], 0, 5)) ?>
                                </div>
                                <div class="cell-t" data-title="Pelajar">
                                    <?php echo($row['nama_pelajar']) ?>
                                </div>
                                <div class="cell-t" data-title="Sesi">
                                    <?php echo($row['subjek']) ?>
                                </div>
                                <div class="cell-t" data-title="Tanggal">
                                    <?php echo($row['tanggal']) ?>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                        <!-- /.table -->
                        <?php } ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- wrapper -->
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Ubah Modul</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <?php echo form_open_multipart('TeacherController/uploadModul');?>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Modul</label>
                    <input class="form-control" type="file" id="formFile" name="modul">
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="Submit" class="btn btn-green">Simpan</button>
                </form>
			</div>
		</div>
	</div>
</div>