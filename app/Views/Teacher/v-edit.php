<div class="container-fluid">
    <div class="row px-lg-5 mx-lg-5 mt-5">
        <div class="col-lg col-lg-3 mb-3 text-center">
            <div class="text-center mb-3">
				<img src="<?= base_url() ?>/ProfileImage/user-default.png" class="profile-user-img img-fluid img-circle" alt="Profil Image">
			</div>
            <button type="button" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ubah Foto Profil
            </button>
        </div>
        <div class="col">
            <h2 class="mb-3">Ubah Profil</h2>
            <form action="">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" aria-label="Password" aria-describedby="password">
                        <span class="input-group-text" id="password">
                            <a href=""><i class="fa fa-eye-slash green" aria-hidden="true"></i></a>
                        </span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Keahlian</label>
                    <input type="text" class="form-control" id="keahlian" name="keahlian">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="birthdate" id="">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tentang</label>
                    <textarea class="form-control" id="about" rows="3" name="about"></textarea>
                </div>
                <a href="#" class="btn btn-outline-green">Kembali</a>
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
				<form action="">
					<div class="mb-3">
                        <label for="formFile" class="form-label">Upload Foto Profil</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-green">Simpan</button>
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
    });
</script>