<div class="container-fluid">
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
            <div class="col-lg-4 mb-5">
                <h1 class="fw-bold text-center text-lg-start">Halo, <?php echo($session->get('nama')); ?>!</h1>
                <br>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="me-3">
                        <p><i class="fas fa-user"></i></p>
                    </div>
                    <div class="me-3">
                        <p><?php echo($data['nama_lengkap']); ?></p>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="me-3">
                        <p><i class="fas fa-envelope"></i></p>
                    </div>
                    <div class="me-3">
                        <p><?php echo($session->get('email')); ?></p>
                    </div>
                </div>
                <div class="d-flex ms-lg-0 ms-5">
                    <div class="">
                        <a class="btn btn-green btn-sm" href="/pelajar/edit" role="button"><i class="fas fa-edit"></i>Ubah Profil</a>
                    </div>
                </div>
            </div>
            <!-- /.col -->
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
                            <?php if(count($pembelajaran) == 0){ ?>
                                <div class="text-center">
                                    Belum ada pembelajaran.
                                </div>
                            <?php } else{ ?>
                            <!-- Table -->
                            <div class="table-t">
                                <?php foreach($pembelajaran as $row){ ?>
                                <?php if($row['status'] != '2' && $row['status'] != '4'){ ?>
                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        <?php if($row['waktu_mulai'] == NULL){ ?>
                                            Belum ditentukan
                                        <?php } else{ ?>
                                            <?php echo(substr($row['waktu_mulai'], 0, 5)) ?> - <?php echo(substr($row['waktu_selesai'], 0, 5)) ?>
                                        <?php } ?>
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        <?php echo($row['nama_pengajar']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        <?php echo($row['subjek']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        <?php echo($row['tanggal']); ?>
                                    </div>
                                    <div class="cell-t" data-title="">
                                        <!-- Belum dibayar -->
                                        <?php if($row['status'] == '0' && $row['bukti_pembayaran'] == ''){ ?>
                                            <a href="/invoice?id=<?= $row['id']?>" class="btn btn-sm btn-green">Submit Bukti Pembayaran</a>
                                        <?php } else if($row['status'] == '0' && $row['bukti_pembayaran'] != ''){ ?>
                                            Menunggu konfirmasi admin
                                        <!-- Sudah dibayar -->
                                        <?php } else if($row['status'] == '1'){ ?>
                                            Menunggu konfirmasi pengajar
                                        <!-- Sudah diterima - sedang pembelajaran -->
                                        <?php } else if($row['status'] == '3'){ ?>
                                            <a class="btn btn-sm btn-green" href="#" role="button">Unduh Modul</a>
                                            <a class="btn btn-sm btn-green" href="#" role="button">Selesai</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                            <!-- /.table -->
                            <?php } ?>
                        </div>
                        <div class="tab-pane" id="nav-riwayat" role="tabpanel" aria-labelledby="nav-riwayat-tab">
                            <?php if($riwayat_count == '0'){ ?>
                                <div class="text-center">
                                    Belum ada pembelajaran.
                                </div>
                            <?php } else{ ?>
                            <!-- Table -->
                            <div class="table-t">
                                <?php foreach($pembelajaran as $row){ ?>
                                <div class="row-t">
                                    <div class="cell-t" data-title="Waktu">
                                        <?php if($row['waktu_mulai'] == NULL){ ?>
                                            -
                                        <?php } else{ ?>
                                            <?php echo(substr($row['waktu_mulai'], 0, 5)) ?> - <?php echo(substr($row['waktu_selesai'], 0, 5)) ?>
                                        <?php } ?>
                                    </div>
                                    <div class="cell-t" data-title="Pengajar">
                                        <?php echo($row['nama_pengajar']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Subjek">
                                        <?php echo($row['subjek']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Tanggal">
                                        <?php echo($row['tanggal']); ?>
                                    </div>
                                    <div class="cell-t" data-title="">
                                        <?php if($row['status'] == '2'){
                                            echo('Tidak diterima');
                                        }
                                        elseif ($row['status'] == '4') {
                                            echo('Selesai');
                                        } 
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.table -->
                            <?php } ?>

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