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
                            <!-- Table -->
                            <div class="table-t">
                                <?php foreach($DataPelajar as $row){ ?>
                                <div class="row-t">
                                    <div class="cell-t" data-title="Nama">
                                        <?php echo($row['nama_lengkap']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Email">
                                        <?php echo($row['email']); ?>
                                    </div>
                                    <div class="cell-t" data-title="Pasword">
                                        <?php echo($row['password']); ?>
                                    </div>
                                    <div class="cell-t" data-title="">
                                        <a class="btn btn-sm btn-green" href="#" role="button">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- /.table -->
                        </div>
                        <!-- / Tab Pelajar -->

                        <!-- Tab Pengajar -->
                        <div class="tab-pane" id="nav-pengajar" role="tabpanel" aria-labelledby="nav-pengajar-tab">
                            <!-- Table -->
                            <div class="table-reponsive">
                                <div class="table-t">
                                    <div class="row-t">
                                        <div class="cell-t" data-title="Nama">
                                            Alfred Roger
                                        </div>
                                        <div class="cell-t" data-title="Email">
                                            Alfred@gmail.com
                                        </div>
                                        <div class="cell-t" data-title="Kota">
                                            Bandung
                                        </div>
                                        <div class="cell-t" data-title="Keahlian">
                                            Matematika
                                        </div>
                                        <div class="cell-t" data-title="Ijazah">
                                            Ijazah.png
                                        </div>
                                        <div class="cell-t" data-title="">
                                            <a class="btn btn-sm btn-green" href="#" role="button">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.table -->
                        </div>
                        <!-- / Tab Pengajar -->

                        <!-- Tab Pembayaran -->
                        <div class="tab-pane" id="nav-pembayaran" role="tabpanel" aria-labelledby="nav-pembayaran-tab">
                            <!-- Table -->
                            <div class="table-t">
                                <div class="row-t">
                                    <div class="cell-t" data-title="Bukti Pembayaran">
                                        struk.png
                                    </div>
                                    <div class="cell-t" data-title="Nama">
                                        Alfred Roger
                                    </div>
                                    <div class="cell-t" data-title="Action">
                                        <a class="btn btn-sm btn-green" href="#" role="button">Validasi</a>
                                    </div>
                                </div>
                                <!-- /.row-t -->
                            </div>
                            <!-- /.table -->
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
  });
</script>