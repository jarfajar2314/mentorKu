<div class="container-fluid">
    <div class="admin-dash">
        <div class="admin-profile">
            <h1>Halo <?php echo($session->get('nama_lengkap')) ?></h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link link-green active" id="nav-pelajar-tab" data-toggle="tab" href="#nav-pelajar" role="tab" aria-controls="nav-pelajar" aria-selected="true">Pelajar</a>
                            <a class="nav-item nav-link link-green" id="nav-pengajar-tab" data-toggle="tab" href="#nav-pengajar" role="tab" aria-controls="nav-pengajar" aria-selected="false">Pengajar</a>
                            <a class="nav-item nav-link link-green" id="nav-pembayaran-tab" data-toggle="tab" href="#nav-pembayaran" role="tab" aria-controls="nav-pembayaran" aria-selected="false">Pembayaran</a>
                        </div>
                    </nav>
                    <div class="card-body tab-content" id="nav-tabContent">
                        <!-- Tab Pelajar -->
                        <div class="tab-pane show active" id="nav-pelajar" role="tabpanel" aria-labelledby="nav-pelajar-tab">
                            <table id="table-pelajar" class="table text-gray" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($DataPelajar as $row){ ?>
                                    <tr>
                                        <td><?php echo($row['nama_lengkap']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['password']); ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-green" href="#" role="button">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- / Tab Pelajar -->

                        <!-- Tab Pengajar -->
                        <div class="tab-pane" id="nav-pengajar" role="tabpanel" aria-labelledby="nav-pengajar-tab">
                            <table id="table-pengajar" class="table text-gray" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kota</th>
                                        <th>Keahlian</th>
                                        <th>Ijazah</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($DataPengajar as $row){ ?>
                                    <tr>
                                        <td><?php echo($row['nama_lengkap']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['kota']); ?></td>
                                        <td><?php echo($row['keahlian']); ?></td>
                                        <td><?php echo($row['ijazah']); ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-green" href="#" role="button">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- / Tab Pengajar -->

                        <!-- Tab Pembayaran -->
                        <div class="tab-pane" id="nav-pembayaran" role="tabpanel" aria-labelledby="nav-pembayaran-tab">
                            <table id="table-pembayaran" class="table text-gray" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Biaya</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($DataPembelajaran as $row){ ?>
                                    <tr>
                                        <td><?php echo($row['nama_pelajar']); ?></td>
                                        <td><?php echo($row['waktu_permintaan']); ?></td>
                                        <td><?php echo($row['biaya']); ?></td>
                                        <td>
                                            <?php echo($row['bukti_pembayaran']); ?>
                                            <?php if($row['bukti_pembayaran'] != ''){ ?>
                                                <a href="InvoiceFiles/<?= $row['bukti_pembayaran'] ?>" class="btn btn-sm btn-green" target="_blank">Lihat</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($row['bukti_pembayaran'] == ''){ ?>
                                                Belum dibayar
                                            <?php } else if($row['status'] == '1'){ ?>
                                                Sudah dibayar
                                            <?php } else if($row['status'] == '2'){ ?>
                                                Ditolak
                                            <?php } else if($row['status'] == '4'){ ?>
                                                Selesai
                                            <?php } else{ ?>
                                            <a class="btn btn-sm btn-green" href="pembayaran?id=<?= $row['id']?>&status=1" role="button">Validasi</a>
                                            <a class="btn btn-sm btn-danger" href="pembayaran?id=<?= $row['id']?>&status=2" role="button">Tolak</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- / Tab Pembayaran -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>

<script>
  // Untuk Tabs di Dashboard
  $(document).ready(function(){

    $("#nav-pengajar-tab").click(function(){
        // Show
        $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green active");
        // Hide
        $("#nav-pelajar-tab").attr("class", "nav-item nav-link link-green");
        $("#nav-pembayaran-tab").attr("class", "nav-item nav-link link-green");
        // Show
        $("#nav-pengajar").attr("class", "tab-pane fade show active");
        // Hide
        $("#nav-pelajar").attr("class", "tab-pane fade");
        $("#nav-pembayaran").attr("class", "tab-pane fade");
        // Animate
        $("#nav-pengajar").removeClass("fadeIn");
        $("#nav-pengajar").addClass("fadeIn");
        return false;
    });
    $("#nav-pelajar-tab").click(function(){
        // Show
        $("#nav-pelajar-tab").attr("class", "nav-item nav-link link-green active");
        // Hide
        $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green");
        $("#nav-pembayaran-tab").attr("class", "nav-item nav-link link-green");
        // Show
        $("#nav-pelajar").attr("class", "tab-pane fade show active");
        // Hide
        $("#nav-pengajar").attr("class", "tab-pane fade");
        $("#nav-pembayaran").attr("class", "tab-pane fade");
        // Animate
        $("#nav-pelajar").removeClass("fadeIn");
        $("#nav-pelajar").addClass("fadeIn");
        return false;
    });
    $("#nav-pembayaran-tab").click(function(){
        // Show
        $("#nav-pembayaran-tab").attr("class", "nav-item nav-link link-green active");
        // Hide
        $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green");
        $("#nav-pelajar-tab").attr("class", "nav-item nav-link link-green");
        // Show
        $("#nav-pembayaran").attr("class", "tab-pane fade show active");
        // Hide
        $("#nav-pengajar").attr("class", "tab-pane fade");
        $("#nav-pelajar").attr("class", "tab-pane fade");
        // Animate
        $("#nav-pembayaran").removeClass("fadeIn");
        $("#nav-pembayaran").addClass("fadeIn");
        return false;
    });

    $('#table-pengajar').DataTable({
        "responsive": true,
    });
    $('#table-pelajar').DataTable({
        "responsive": true,
    });
    $('#table-pembayaran').DataTable({
        "responsive": true,
        "order": [[ 1, "desc" ]],
    });

  });
</script>