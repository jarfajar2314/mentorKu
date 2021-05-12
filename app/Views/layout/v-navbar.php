<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <div class="container-fluid">
    <!-- Mentorku logo -->
    <a class="navbar-brand" href="#">
      <h4 class="m-0 p-0">
        <mark class="green bg-none px-0">Mentorku.</mark>io
      </h4>
    </a>
    <!-- Mobile Hamburger Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon green"></span>
    </button>
    <!-- Button -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Dropdown -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- /.Dropdown -->
      </ul>
      <!-- Right button -->
      <a href="#" class="btn px-3 me-2 fw-light">Berikan Kursus</a>
      <br>
      <a href="#" class="btn px-3 me-2 fw-light mb-3 mb-sm-0">Cari Mentor</a>
      <br>
      <!-- If -->
      <?php if($page == "login" || $page == "register"){?>
      <a href="#" class="btn btn-green px-3 me-2 rounded-pill fw-light">Masuk</a>
      <a href="#" class="btn btn-outline-green px-3 me-2 rounded-pill fw-light">Daftar</a>
      <!-- Else -->
      <?php } else {?>
      <div class="dropdown">
        <button class="btn card-green dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Halo Margareth
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Dashboard</a></li>
          <li><a class="dropdown-item" href="#">Keluar</a></li>
        </ul>
      </div>
      <?php } ?>
      
      
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>