<div class="container-fluid">
    <?php if(isset($_SESSION['msg'])){ ?>
        <div class="row px-5 pt-5">
            <?php if($_SESSION['msg'] == 'success'){ ?>
                <div class="alert alert-success" role="alert">
                    Data berhasil diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'failed'){ ?>
                <div class="alert alert-danger" role="alert">
                    Data gagal diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'successPP'){ ?>
                <div class="alert alert-success" role="alert">
                    Foto Profil berhasil diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'failedPP'){ ?>
                <div class="alert alert-danger" role="alert">
                    Foto Profil gagal diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'successIjazah'){ ?>
                <div class="alert alert-success" role="alert">
                    Ijazah berhasil diperbarui.
                </div>
            <?php } else if($_SESSION['msg'] == 'failedIjazah'){ ?>
                <div class="alert alert-danger" role="alert">
                    Ijazah gagal diperbarui.
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="row px-lg-5 mx-lg-5 mt-5">
        <div class="col-lg col-lg-3 mb-3 text-center">
            <div class="text-center mb-3">
				<img src="<?= base_url() ?>/ProfileImage/<?php echo($data['profil_pic']); ?>" class="profile-user-img img-fluid img-circle" alt="Profil Image">
			</div>
            <button type="button" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ubah Foto Profil
            </button>
        </div>
        <div class="col">
            <h2 class="mb-3">Ubah Profil</h2>
            <!-- Data Pengajar ===================================================== -->
            <h4 class="mb-3 mt-2">Data Pengajar</h4>
            <form action="/TeacherController/update" method="POST">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="nama_lengkap" value="<?php echo($data['nama_lengkap']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo($_SESSION['email']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" aria-label="Password" aria-describedby="password" name="password" value="<?php echo($data['password']); ?>">
                        <span class="input-group-text" id="password">
                            <a href=""><i class="fa fa-eye-slash green" aria-hidden="true"></i></a>
                        </span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo($data['kontak']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" id="city" name="kota" value="<?php echo($data['kota']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="" value="<?php echo($data['tanggal_lahir']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="formFile" class="form-label">Upload Ijazah</label>
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm btn-green" data-bs-toggle="modal" data-bs-target="#uploadIjazah">
                            Upload Ijazah
                        </button>
                        <?php if($data['ijazah'] == ""){ ?>
                            <p class="ms-3 mb-0">Ijazah belum diupload.</p>
                        <?php } else { ?>
                            <p class="ms-3 mb-0">Ijazah sudah diupload.</p>
                        <?php } ?>
                    </div>
                </div>

                <!-- Pembelajaran ================================================= -->
                <h4 class="mb-3 mt-5">Pembelajaran</h4>
                <div class="form-group mb-3">
                    <label class="form-label">Tarif</label>
                    <div class="input-group">
                        <p class="m-1 me-2">Rp</p>
                        <input type="number" class="form-control" id="tarif" name="tarif" value="<?php echo($data['tarif']); ?>">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jadwal</label>
                    <div class="container">
                        <div class="row">
                            <?php $arrJadwal = explode(" ",$data['jadwal']); ?>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-0" type="checkbox" value="0" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "0")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-0-btn" type="button">Senin</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-1" type="checkbox" value="1" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "1")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-1-btn" type="button">Selasa</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-2" type="checkbox" value="2" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "2")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-2-btn" type="button">Rabu</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-3" type="checkbox" value="3" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "3")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-3-btn" type="button">Kamis</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-4" type="checkbox" value="4" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "4")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-4-btn" type="button">Jumat</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-5" type="checkbox" value="5" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "5")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-5-btn" type="button">Sabtu</button>
                            </div>
                            <div class="col col-auto mb-3 mb-lg-0">
                                <input class="form-check-input" id="pick-6" type="checkbox" value="6" name="pickDay[]" hidden <?php echo(strpos($data['jadwal'], "6")!== false ? "checked" : "" ); ?>>
                                <button class="btn btn-sm btn-outline-green" id="pick-6-btn" type="button">Minggu</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Keahlian</label>
                    <input type="text" class="form-control" id="keahlian" name="keahlian" value="<?php echo($data['keahlian']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tingkatan</label>
                    <select class="form-select" aria-label="Default select example" name="tingkatan">
                        <option value="SD" <?php echo($data['tingkatan'] == 'SD' ? "selected" : ''); ?>>SD</option>
                        <option value="SMP" <?php echo($data['tingkatan'] == 'SMP' ? "selected" : '' ); ?>>SMP</option>
                        <option value="SMA" <?php echo($data['tingkatan'] == 'SMA' ? "selected" : '' ); ?>>SMA</option>
                        <option value="Perguruan Tinggi" <?php echo($data['tingkatan'] == 'Perguruan Tinggi' ? "selected" : '' ); ?>>Perguruan Tinggi</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Waktu Respon (dalam jam)</label>
                    <input type="number" class="form-control" id="waktu_respon" name="waktu_respon" value="<?php echo($data['waktu_respon']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tentang</label>
                    <textarea class="form-control" id="about" rows="3" name="tentang"><?php echo($data['tentang']); ?></textarea>
                </div>

                <!-- Pembayaran ============================================= -->
                <h4 class="mb-3 mt-5">Pembayaran</h4>
                <div class="form-group mb-3">
                    <label class="form-label">Layanan Rekening</label>
                    <input type="text" class="form-control" id="jenis_rekening" name="jenis_rekening" value="<?php echo($data['jenis_rekening']); ?>">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">No. Rekening</label>
                    <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?php echo($data['no_rekening']); ?>">
                </div>
                <a href="/pengajar/dashboard" class="btn btn-outline-green">Kembali</a>
                <button class="btn btn-green ms-2" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Ubah Foto Profil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <?php echo form_open_multipart('TeacherController/updatePP');?>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Foto Profil</label>
                    <input class="form-control" type="file" id="formFile" name="profile_pic">
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

<!-- Upload Ijazah -->
<div class="modal fade" id="uploadIjazah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Upload Ijazah</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <?php echo form_open_multipart('TeacherController/uploadIjazah');?>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Dokumen Ijazah</label>
                    <input class="form-control" type="file" id="formFile" name="ijazah">
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

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });

        // Buat pilih hari =============================
        if($("#pick-0").attr("checked") != undefined){
            // $("#pick-0-btn").attr("class", "btn-outline-green");
            $("#pick-0-btn").removeClass("btn-outline-green");
            $("#pick-0-btn").addClass("bg-green text-white");
        }

        if($("#pick-1").attr("checked") != undefined){
            $("#pick-1-btn").removeClass("btn-outline-green");
            $("#pick-1-btn").addClass("bg-green text-white");
        }

        if($("#pick-2").attr("checked") != undefined){
            $("#pick-2-btn").removeClass("btn-outline-green");
            $("#pick-2-btn").addClass("bg-green text-white");
        }

        if($("#pick-3").attr("checked") != undefined){
            $("#pick-3-btn").removeClass("btn-outline-green");
            $("#pick-3-btn").addClass("bg-green text-white");
        }

        if($("#pick-4").attr("checked") != undefined){
            $("#pick-4-btn").removeClass("btn-outline-green");
            $("#pick-4-btn").addClass("bg-green text-white");
        }

        if($("#pick-5").attr("checked") != undefined){
            $("#pick-5-btn").removeClass("btn-outline-green");
            $("#pick-5-btn").addClass("bg-green text-white");
        }

        if($("#pick-6").attr("checked") != undefined){
            $("#pick-6-btn").removeClass("btn-outline-green");
            $("#pick-6-btn").addClass("bg-green text-white");
        }


        $("#pick-0-btn").click(function(){
            console.log($("#pick-0").attr("checked"));
            if($("#pick-0").attr("checked") == undefined){
                $("#pick-0-btn").removeClass("btn-outline-green");
                $("#pick-0-btn").addClass("bg-green text-white");
                $("#pick-0").attr("checked", true);
            }
            else{
                $("#pick-0-btn").removeClass("bg-green text-white");
                $("#pick-0-btn").addClass("btn-outline-green");
                $("#pick-0").removeAttr("checked");
            }
            return false;
        });

        $("#pick-1-btn").click(function(){
            console.log($("#pick-1").attr("checked"));
            if($("#pick-1").attr("checked") == undefined){
                $("#pick-1-btn").removeClass("btn-outline-green");
                $("#pick-1-btn").addClass("bg-green text-white");
                $("#pick-1").attr("checked", true);
            }
            else{
                $("#pick-1-btn").removeClass("bg-green text-white");
                $("#pick-1-btn").addClass("btn-outline-green");
                $("#pick-1").removeAttr("checked");
            }
            return false;
        });

        $("#pick-2-btn").click(function(){
            console.log($("#pick-2").attr("checked"));
            if($("#pick-2").attr("checked") == undefined){
                $("#pick-2-btn").removeClass("btn-outline-green");
                $("#pick-2-btn").addClass("bg-green text-white");
                $("#pick-2").attr("checked", true);
            }
            else{
                $("#pick-2-btn").removeClass("bg-green text-white");
                $("#pick-2-btn").addClass("btn-outline-green");
                $("#pick-2").removeAttr("checked");
            }
            return false;
        });

        $("#pick-3-btn").click(function(){
            console.log($("#pick-3").attr("checked"));
            if($("#pick-3").attr("checked") == undefined){
                $("#pick-3-btn").removeClass("btn-outline-green");
                $("#pick-3-btn").addClass("bg-green text-white");
                $("#pick-3").attr("checked", true);
            }
            else{
                $("#pick-3-btn").removeClass("bg-green text-white");
                $("#pick-3-btn").addClass("btn-outline-green");
                $("#pick-3").removeAttr("checked");
            }
            return false;
        });

        $("#pick-4-btn").click(function(){
            console.log($("#pick-4").attr("checked"));
            if($("#pick-4").attr("checked") == undefined){
                $("#pick-4-btn").removeClass("btn-outline-green");
                $("#pick-4-btn").addClass("bg-green text-white");
                $("#pick-4").attr("checked", true);
            }
            else{
                $("#pick-4-btn").removeClass("bg-green text-white");
                $("#pick-4-btn").addClass("btn-outline-green");
                $("#pick-4").removeAttr("checked");
            }
            return false;
        });

        $("#pick-5-btn").click(function(){
            console.log($("#pick-5").attr("checked"));
            if($("#pick-5").attr("checked") == undefined){
                $("#pick-5-btn").removeClass("btn-outline-green");
                $("#pick-5-btn").addClass("bg-green text-white");
                $("#pick-5").attr("checked", true);
            }
            else{
                $("#pick-5-btn").removeClass("bg-green text-white");
                $("#pick-5-btn").addClass("btn-outline-green");
                $("#pick-5").removeAttr("checked");
            }
            return false;
        });

        $("#pick-6-btn").click(function(){
            console.log($("#pick-6").attr("checked"));
            if($("#pick-6").attr("checked") == undefined){
                $("#pick-6-btn").removeClass("btn-outline-green");
                $("#pick-6-btn").addClass("bg-green text-white");
                $("#pick-6").attr("checked", true);
            }
            else{
                $("#pick-6-btn").removeClass("bg-green text-white");
                $("#pick-6-btn").addClass("btn-outline-green");
                $("#pick-6").removeAttr("checked");
            }
            return false;
        });
        // ===============================

    });
</script>