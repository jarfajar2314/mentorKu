<div class="content-wrapper">
    <?php if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'success' ){?>
        <div class="container px-lg-5 mt-5">
            <div class="alert alert-success" role="alert">
                Akun berhasil dibuat! Silahkan kunjungi halaman <a href="/pengajar/login" class="text-success">login</a>.
            </div>
        </div>
    <?php } else if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'fail' ){?>
        <div class="container px-lg-5 mt-5">
            <div class="alert alert-danger" role="alert">
                Akun gagal dibuat. Silahkan coba kembali.
            </div>
        </div>
    <?php } else if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'duplicate' ){?>
        <div class="container px-lg-5 mt-5">
            <div class="alert alert-danger" role="alert">
                Email sudah terdaftar.
            </div>
        </div>
    <?php }?>
    <div class="wrap-log">
        <div class="container-fluid cont-logbox">
            <form action="/TeacherController/save" method="post">
                <label for="exampleInputEmail1">Daftar pengajar</label>
                <div class="fg form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full name" name="nama_lengkap">
                </div>
                <div class="fg form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="fg form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="fg form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation" name="password_confirm">
                </div>
                <div class="fg form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Expertise" name="keahlian">
                </div>
                <div class="fg form-group">
                    <select class="form-select" aria-label="Default select example" name="tingkatan">
                        <option selected>Tingkatan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                    </select>
                </div>
                <div class="fg form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" name="kota">
                </div>
                <button type="submit" class="bot-log btn btn-primary">Daftar</button>
            </form>
        </div><!-- /.container-fluid -->
    </div>