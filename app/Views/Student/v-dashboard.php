<div class="container-fluid">
    <div class="row border px-5 py-3 mt-3">
        <!-- PP -->
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="text-center squareImg">
                <img src="<?= base_url() ?>/ProfileImage/user-default.png" class="img-responsive rounded-circle" alt="...">
            </div>
        </div>
        <!-- /.col -->
        <!-- Profile -->
        <div class="col mb-5">
            <h1 class="fw-bold text-center text-lg-start">Halo, Margareth!</h1>
            <br>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-1 fs-lg-4"><i class="fas fa-user"></i></div>
                    <div class="col fs-lg-4">Margareth Fargo</div>
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-1 fs-lg-4"><i class="fas fa-envelope"></i></div>
                    <div class="col fs-lg-4"><p class="text-break">margarethfargo@gmail.com</p></div>
                </div>
            </div>
            <div class="d-flex">
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
        <div class="col-lg-3">
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
    <div class="row">
        <!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="home-tab"
      data-mdb-toggle="tab"
      href="#home"
      role="tab"
      aria-controls="home"
      aria-selected="true"
      >Home</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="profile-tab"
      data-mdb-toggle="tab"
      href="#profile"
      role="tab"
      aria-controls="profile"
      aria-selected="false"
      >Profile</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="messages-tab"
      data-mdb-toggle="tab"
      href="#messages"
      role="tab"
      aria-controls="messages"
      aria-selected="false"
      >Messages</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="settings-tab"
      data-mdb-toggle="tab"
      href="#settings"
      role="tab"
      aria-controls="settings"
      aria-selected="false"
      >Settings</a
    >
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    ...
  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    ...
  </div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
    ...
  </div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    ...
  </div>
</div>

    </div>
</div>