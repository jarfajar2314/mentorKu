<div class="container-fluid">
    <div class="admin-dash">
        <div class="admin-profile">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-3">
                <div class="col">
                    <h1>Halo Admin</h1>
                    <br>
                    <p>Admin 01</p>
                    <p>Admin01@gmail.com</p>
                </div>
            </div>
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
                        <div class="tab-pane show active" id="nav-pelajar" role="tabpanel" aria-labelledby="nav-pelajar-tab">
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
                                        <a class="btn btn-sm btn-green" href="#" role="button">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" role="button">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.table -->
                        </div>
                        <div class="tab-pane" id="nav-pengajar" role="tabpanel" aria-labelledby="nav-pengajar-tab">
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
                            </div>
                            <!-- /.table -->
                        </div>
                        <div class="tab-pane" id="nav-pembayaran" role="tabpanel" aria-labelledby="nav-pembayaran-tab">
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
    </div>
</div>

<script>
  // Untuk Tabs di Dashboard
  $(document).ready(function(){
    $("#nav-pengajar-tab").click(function(){
      $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green active");
      $("#nav-pelajar-tab").attr("class", "nav-item nav-link link-green");
      $("#nav-pengajar").attr("class", "tab-pane fade show active");
      $("#nav-pelajar").attr("class", "tab-pane fade");
      $("#nav-pengajar").removeClass("fadeIn");
      $("#nav-pengajar").addClass("fadeIn");
      return false;
    });
    $("#nav-pelajar-tab").click(function(){
      $("#nav-pelajar-tab").attr("class", "nav-item nav-link link-green active");
      $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green");
      $("#nav-pelajar").attr("class", "tab-pane fade show active");
      $("#nav-pengajar").attr("class", "tab-pane fade");
      $("#nav-pelajar").removeClass("fadeIn");
      $("#nav-pelajar").addClass("fadeIn");
      return false;
    });
    $("#nav-pembayaran-tab").click(function(){
      $("#nav-pembayaran-tab").attr("class", "nav-item nav-link link-green active");
      $("#nav-pengajar-tab").attr("class", "nav-item nav-link link-green");
      $("#nav-pembayaran").attr("class", "tab-pane fade show active");
      $("#nav-pengajar").attr("class", "tab-pane fade");
      $("#nav-pembayaran").removeClass("fadeIn");
      $("#nav-pembayaran").addClass("fadeIn");
      return false;
    });
  });
</script>