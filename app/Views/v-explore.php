<div class="container-fluid">
    <div class="dropdown-cont">
        <div class="row mb-3">
            <div class="col">
                <form class="d-flex" action="/explore" method="get">
                    <input class="form-control me-2" type="search" placeholder="Cari Subjek" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <p>Filter</p>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
            <div class="col">
                <button type="button" class="exp-drop-bot exp-drop-bot-cont btn btn-secondary" data-bs-toggle="modal" data-bs-target="#searchKota">
                    Kota
                </button>
            </div>
            <div class="col">
                <button type="button" class="exp-drop-bot exp-drop-bot-cont btn btn-secondary" data-bs-toggle="modal" data-bs-target="#searchTarif">
                    Tarif
                </button>
            </div>
            <div class="col">
                <button type="button" class="exp-drop-bot exp-drop-bot-cont btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                    Tingkat
                </button>
                <ul class="dropdown-menu dropdown-menu-end">	
                    <li><a class="dropdown-item" href="/explore?ftingkat=SD">SD</a></li>	
                    <li><a class="dropdown-item" href="/explore?ftingkat=SMP">SMP</a></li>	
                    <li><a class="dropdown-item" href="/explore?ftingkat=SMA">SMA</a></li>	
                    <li><a class="dropdown-item" href="/explore?ftingkat=Perguruan%20Tinggi">Perguruan Tinggi</a></li>	
                </ul>
            </div>
            <div class="col">
                <button type="button" class="exp-drop-bot exp-drop-bot-cont btn btn-secondary" data-bs-toggle="modal" data-bs-target="#searchWaktu">
                    Waktu Respon
                </button>
            </div>        
            <div class="col">
                <a href="/explore" class="exp-drop-bot exp-drop-bot-cont btn btn-secondary"> Reset </a>
            </div>        
        </div>
    </div>
    <div class="exp-cont">
        <!-- Jika data = 0 -->
        <?php if(count($pengajar) == 0){ ?>
            <h2 class="text-center">Pengajar Tidak Ditemukan :(</h2>
            
        <?php } else { ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($pengajar as $row){ ?>
                <div class="col">
                    <a href="/pengajar/detail?id=<?php echo($row['id']) ?>" class="text-decoration-none">
                        <div class="card shadow-sm">
                            <img src="<?= base_url() ?>/ProfileImage/<?php echo($row['profil_pic']); ?>" class="bd-placeholder-img img-fluid card-img-top" width="100%" height="225">
                            <div class="card-body">
                                <p class="expcontext card-title"><?php echo($row['nama_lengkap']); ?></p>
                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
                                    <h5><span class="badge">Rp <?php echo number_format($row['tarif']); ?> / Sesi</span></h5>
                                    <div class="d-flex">
                                            <p class="me-2 text-warning"><i class="fas fa-star"></i></p>
                                            <?php if($row['rating'] == null){ ?>
                                                <p class="exp-ment-desc card-text">
                                                -
                                                </p>
                                            <?php } else { ?>
                                                <p class="exp-ment-desc card-text">
                                                <?php echo number_format((float)$row['rating'], 1, '.', ''); ?> / 5
                                                </p>
                                            <?php } ?>
                                    </div>
                                </div>
                                <p class="exp-ment-desc card-text">
                                    <?php echo($row['tentang']); ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Kota Filter -->
<div class="modal fade" id="searchKota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <form action="/explore" method="get">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Kota" name="fkota">

                <?php if(count($kota) > 0){ ?>
                <ul id="myUL">
                    <?php foreach($kota as $item){ ?>
                    <li><a href="/explore?fkota=<?php echo($item); ?>"><?php echo($item); ?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
				<button type="submit" class="btn btn-green" id="btn-fkota">Cari</button>
                </form>
			</div>
		</div>
	</div>
</div>

<!-- Tarif Filter -->
<div class="modal fade" id="searchTarif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <form action="/explore" method="get">
                <div class="mb-3">
                    <label class="form-label">Tarif ter-rendah</label>
                    <input type="number" class="form-control" name="trendah">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tarif ter-tinggi</label>
                    <input type="number" class="form-control" name="ttinggi">
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
				<button type="submit" class="btn btn-green">Cari</button>
                </form>
			</div>
		</div>
	</div>
</div>

<!-- Waktu Respon Filter -->
<div class="modal fade" id="searchWaktu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <form action="/explore" method="get">
                <div class="mb-3">
                    <label class="form-label">Waktu Respon ter-rendah</label>
                    <input type="number" class="form-control" name="wrendah">
                </div>
                <div class="mb-3">
                    <label class="form-label">Waktu Respon ter-tinggi</label>
                    <input type="number" class="form-control" name="wtinggi">
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
				<button type="submit" class="btn btn-green">Cari</button>
                </form>
			</div>
		</div>
	</div>
</div>

<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>