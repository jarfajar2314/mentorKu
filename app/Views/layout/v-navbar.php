<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <div class="container-fluid">
    <!-- Mentorku logo -->
    <a class="navbar-brand" href="/">
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
      <?php $session = session(); ?>
      <?php if(!$session->has('id_admin')){ ?>
        <!-- Berikan kursus hanya muncul ketika belum login dan user bukan pengajar -->
        <?php if(!isset($_SESSION['id_user']) || (isset($_SESSION['user']) && $_SESSION['user'] != 'pengajar' )) {?>
          <a href="/pengajar/login" class="btn px-3 me-2 fw-light">Berikan Kursus</a>
          <br>
        <?php } ?>
        <a href="/pelajar/login" class="btn px-3 me-2 fw-light mb-3 mb-sm-0">Cari Mentor</a>
        <br>
        <!-- If -->
        <?php if($page == "login" || $page == "register" || !isset($_SESSION['nama'])){?>
        <?php $uri = current_url(true)->getSegment(1);
          if(strlen($uri) == 0) $uri = "pelajar"; 
        ?>
        <a href="<?php echo("/" . $uri . "/login") ?>" class="btn btn-green px-3 me-2 rounded-pill fw-light">Masuk</a>
        <a href="<?php echo("/" . $uri . "/register") ?>" class="btn btn-outline-green px-3 me-2 rounded-pill fw-light">Daftar</a>
        <!-- Else -->
        <?php } else if(isset($_SESSION['nama']) && !isset($_SESSION['id_admin'])) {?>
        <div class="dropdown">
          <button class="btn card-green dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Halo <?php echo($_SESSION['nama']);?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/<?php echo($_SESSION['user']);?>/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
          </ul>
        </div>
        <?php } ?>
      <?php } else { ?>
        <a href="/logout" class="btn btn-green">Logout</a>
      <?php } ?>

      
      
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>