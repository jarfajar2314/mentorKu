<div class="container-fluid">
    <div class="wrapper">    
        <div class="row px-lg-5 mx-lg-5 py-3 mt-3">
            <!-- Profile Image -->
            <div class="col-lg-3 ms-lg-5 mb-3 mb-lg-0">
                <div class="text-center">
                    <img src="<?= base_url() ?>/ProfileImage/user-default.png" class="profile-user-img img-fluid img-circle" alt="Profil Image">
                </div>
            </div>
            <!-- /.col -->
            <!-- Profile -->
            <div class="col-lg-4 mb-5">
                <h1 class="fw-bold text-center text-lg-start">Halo, Margareth!</h1>
                <br>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="me-3">
                        <p><i class="fas fa-user"></i></p>
                    </div>
                    <div class="me-3">
                        <p>Margareth Fargo</p>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="me-3">
                        <p><i class="fas fa-envelope"></i></p>
                    </div>
                    <div class="me-3">
                        <p>margarethfargo@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="me-3">
                        <a class="btn btn-green btn-sm" href="#" role="button">Ubah Foto Profil</a>
                    </div>
                    <div class="">
                        <a class="btn btn-green btn-sm" href="#" role="button">Ubah Profil</a>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <!-- Pembayaran -->
            <div class="col-lg-3 ms-lg-5 me-lg-5">
                <div class="card card-green">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Konfirmasi Pembayaran</h5>
                        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <form action="">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <button type="submit" class="btn btn-green">Submit</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-3 -->
        </div>
        <!-- /.row -->
        <div class="row px-lg-5 mx-lg-5">
            <div class="col px-4 px-lg-5 mx-lg-5">
                <div class="card">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link link-green active" id="nav-jadwal-tab" data-toggle="tab" href="#nav-jadwal" role="tab" aria-controls="nav-jadwal" aria-selected="true">Jadwal Bimbingan</a>
                            <a class="nav-item nav-link link-green" id="nav-riwayat-tab" data-toggle="tab" href="#nav-riwayat" role="tab" aria-controls="nav-riwayat" aria-selected="false">Riwayat Bimbingan</a>
                        </div>
                    </nav>
                    <div class="card-body tab-content" id="nav-tabContent">
                        <div class="tab-pane show active" id="nav-jadwal" role="tabpanel" aria-labelledby="nav-jadwal-tab">
                            <!-- Table -->
                            <div class="table-t">

                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        12.30 - 15.00
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        Alfred Roger
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        Matematika
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        19/04/2021
                                    </div>
                                    <div class="cell-t" data-title="">
                                        <a class="btn btn-sm btn-green" href="#" role="button">Unduh Modul</a>
                                        <a class="btn btn-sm btn-green" href="#" role="button">Selesai</a>
                                    </div>
                                </div>
                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        12.30 - 15.00
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        Alfred Roger
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        Matematika
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        19/04/2021
                                    </div>
                                    <div class="cell-t" data-title="">
                                        <a class="btn btn-sm btn-green" href="#" role="button">Unduh Modul</a>
                                        <a class="btn btn-sm btn-green" href="#" role="button">Selesai</a>
                                    </div>
                                </div>

                            </div>
                            <!-- /.table -->
                        </div>
                        <div class="tab-pane" id="nav-riwayat" role="tabpanel" aria-labelledby="nav-riwayat-tab">
                            <!-- Table -->
                            <div class="table-t">
        
                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        12.30 - 15.00
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        Alfred Roger
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        Matematika
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        19/04/2021
                                    </div>
                                </div>
                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        12.30 - 15.00
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        Alfred Roger
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        Matematika
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        19/04/2021
                                    </div>
                                </div>
        
                            </div>
                            <!-- /.table -->

                        </div>
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

<script>
  // Untuk Tabs di Dashboard
  $(document).ready(function(){
    $("#nav-riwayat-tab").click(function(){
      $("#nav-riwayat-tab").attr("class", "nav-item nav-link link-green active");
      $("#nav-jadwal-tab").attr("class", "nav-item nav-link link-green");
      $("#nav-riwayat").attr("class", "tab-pane fade show active");
      $("#nav-jadwal").attr("class", "tab-pane fade");
      $("#nav-riwayat").removeClass("fadeIn");
      $("#nav-riwayat").addClass("fadeIn");
      return false;
    });
    $("#nav-jadwal-tab").click(function(){
      $("#nav-jadwal-tab").attr("class", "nav-item nav-link link-green active");
      $("#nav-riwayat-tab").attr("class", "nav-item nav-link link-green");
      $("#nav-jadwal").attr("class", "tab-pane fade show active");
      $("#nav-riwayat").attr("class", "tab-pane fade");
      $("#nav-jadwal").removeClass("fadeIn");
      $("#nav-jadwal").addClass("fadeIn");
      return false;
    });
  });
</script>