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
            <div class="col mb-5">
                <h1 class="fw-bold text-center text-lg-start">Halo, Margareth!</h1>
                <br>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-user"></i></p>
                        </div>
                        <div class="me-3">
                            <p>Margareth Fargo</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-map-marker-alt"></i></p>
                        </div>
                        <div class="me-3">
                            <p>Bandung</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-envelope"></i></p>
                        </div>
                        <div class="me-3">
                            <p>margarethfargo@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-dollar-sign"></i></p>
                        </div>
                        <div class="me-3">
                            <p>Rp 100.000,-</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-book"></i></p>
                        </div>
                        <div class="me-3">
                            <p>Matematika</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <p><i class="fas fa-graduation-cap"></i></p>
                        </div>
                        <div class="me-3">
                            <p>Perguruan Tinggi</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-lg-3 pt-lg-5    ">
                <div class="">
                    <a class="btn btn-green btn-sm" href="#" role="button"><i class="fas fa-edit"></i> Ubah Profil</a>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row px-lg-5 mx-lg-5">
            <div class="col px-4 px-lg-5 mx-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="table-t">                
                            <div class="row-t">
                                <div class="cell-t" data-title="Waktu">
                                    12.30 - 15.00
                                </div>
                                <div class="cell-t" data-title="Pelajar">
                                    Alfred Roger
                                </div>
                                <div class="cell-t" data-title="Sesi">
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
                                <div class="cell-t" data-title="Pelajar">
                                    Alfred Roger
                                </div>
                                <div class="cell-t" data-title="Sesi">
                                    Matematika
                                </div>
                                <div class="cell-t" data-title="Tanggal">
                                    19/04/2021
                                </div>
                            </div>

                        </div>
                        <!-- /.table -->
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