
<header class="container-fluid header-cont">
    <div class="container-fluid cont-header">
        <?php if(isset($_SESSION['status_v']) && $_SESSION['status_v'] == 0){ ?>
            <div class="row px-5">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Akun Belum Terverifikasi.</strong> Mohon lengkapi <a href="/pengajar/edit" class="alert-link">profil</a> terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>
        <h1 class="header-text text-center">Ingin belajar apa hari ini?</h1>
        <div class="cont-searchbox">
            <div class="row">
                <div class="col-10">
                    <form action="/explore" method="get">
                    <input type="text" class="form-control" placeholder="Pilih subjek" aria-label="pilih subjek" name="search">
                </div>
                <div class="col-2">
                    <button type="submit" class="bot-log btn btn-primary">cari</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid home-cont">
    <h4 class="homecontext">Subjek Terpopuler</h4>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <div class="col">
            <a href="/explore?search=matematika" class="text-decoration-none">
                <div class="card shadow-sm">
                <img src="<?= base_url() ?>/imageSource/chris-liverani-rD2dc_2S3i0-unsplash (1).jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                <p class="card-text subjecttext">Matematika</p>
                </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/explore?search=fisika" class="text-decoration-none">
                <div class="card shadow-sm">
                <img src="<?= base_url() ?>/imageSource/engin-akyurt-KUeJcc4YUug-unsplash.jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                <p class="card-text subjecttext">Fisika</p>
                </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/explore?search=kimia" class="text-decoration-none">
                <div class="card shadow-sm">
                <img src="<?= base_url() ?>/imageSource/terry-vlisidis-RflgrtzU3Cw-unsplash (1).jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                <p class="card-text subjecttext">Kimia</p>
                </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="/explore?search=biologi" class="text-decoration-none">
                <div class="card shadow-sm">
                <img src="<?= base_url() ?>/imageSource/artiom-vallat-r8_Pzl9XuPc-unsplash (1).jpg" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="card-body">
                <p class="card-text subjecttext">Biologi</p>
                </div>
                </div>
            </a>
        </div>
    </div>
    <h4 class="homecontext">Mentor Favorit</h4>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <?php for($i = 0; $i < 4; $i++){ ?>
        <div class="col">
        <a href="/pengajar/detail?id=<?= $pengajar[$i]['id'] ?>">
            <div class="cont-homecontent2">
            <img src="<?= base_url() ?>/ProfileImage/<?= $pengajar[$i]['profil_pic']?>" class="bd-placeholder-img rounded-circle" width="160" height="160" preserveAspectRatio="xMidYMid slice" focusable="false">
                <a href="#" class="card-text subjecttext">
                    <?= $pengajar[$i]['nama_lengkap']?>
                </a>
                <p href="#" class="card-text subjecttext">
                    <?= $pengajar[$i]['keahlian']?>
                </p>
            </div>
        </a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="container-fluid about-cont">
    <div class="row featurette">
        <div class="col-md-6">
            <img src="<?= base_url() ?>/imageSource/about-image.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
        </div>
        <div class="col-md-6">
            <div class="about-text-box">
                <h2 class="featurette-heading about-head">Apa itu Mentorku.io</h2>
                <p class="lead about-text">Mentorku.io adalah platform bimbingan belajar privat berbasis web application yang dapat membantu kamu mencari mentor untuk belajar. 
                    Mentorku.io bekerja sama dengan mentor-mentor terbaik dari berbagai bidang studi yang siap membimbing kamu dalam belajar ataupun membantu kamu 
                    mempersiapkan diri menghadapi ujian.</p>
            </div>
        </div>
    </div>
</div>
    