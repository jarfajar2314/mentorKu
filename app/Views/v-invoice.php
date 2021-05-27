<div class="container-fluid">
    <div class="container mt-5 mt-lg-0 px-lg-5 mx-lg-auto inv-box">
        <div class="container mt-lg-5">
            <?php if(isset($_SESSION['msg']) && $_SESSION['msg'] == 'success'){ ?>
            <div class="row mt-lg-4">
                <div class="col">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check"></i> <strong>Bukti Pembayaran Berhasil diupload!</strong> pembayaran akan dikonfirmasi oleh admin dalam 1x24 jam.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body mx-lg-5 my-lg-3">
                            <h2 class="card-title mb-4">Pembayaran</h2>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="row">
                                        <div class="col-lg col-lg-3">
                                            <p class="fw-bold">Tanggal</p>
                                        </div>
                                        <div class="col">
                                            <p><?php echo($data['tanggal']); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-lg-3">
                                            <p class="fw-bold">Sesi</p>
                                        </div>
                                        <div class="col">
                                            <p><?php echo($data['sesi']); ?> Sesi</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-lg-3">
                                            <p class="fw-bold">Tempat</p>
                                        </div>
                                        <div class="col">
                                            <p><?php echo($data['tempat']); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-lg-3">
                                            <p class="fw-bold">No. Rek</p>
                                        </div>
                                        <div class="col">
                                            <p>02349012312</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-lg-3">
                                            <p class="fw-bold">Bank</p>
                                        </div>
                                        <div class="col">
                                            <p>Bank ABC</p>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col">
                                    <div class="row">
                                        <div class="col-lg col-lg-4">
                                            <p class="fw-bold">Biaya</p>
                                        </div>
                                        <div class="col">
                                            <p>Rp <?php echo number_format((int)$data['biaya'] / (int)$data['sesi']) ; ?> x <?php echo($data['sesi']); ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-lg-4">
                                            <p class="fw-bold">Total</p>
                                        </div>
                                        <div class="col">
                                            <p>Rp <?php echo number_format($data['biaya']); ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-4 mb-lg-0">
                                        <div class="col-lg col-lg-4">
                                            <p class="fw-bold">Bukti Pembayaran</p>
                                        </div>
                                        <div class="col">
                                            <!-- <php echo form_open_multipart('StudentController/uploadBukti');?> -->
                                            <form action="StudentController/uploadBukti" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="uploadBukti">
                                            <input type="text" value="<?= $_GET['id']?>" name='id' hidden>
                                            <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-green" type="submit">Konfirmasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Permintaan Terbuat!</h4>
                        <p>Langkah selanjutnya silahkan selesaikan pembayaran mu dengan melampirkan bukti transfer pembayaran ke rekening yang tertera pada invoice.</p>
                        <hr>
                        <p class="mb-0">Setelah pembayaran terkonfirmasi, selanjutnya menunggu konfirmasi dari pengajar yang bersangkutan.</p>
                        <br>
                        <p class="mb-0">Jika pengajar tidak menerima permintaan maka biaya yang sudah terbayarkan akan dikembalikan ke rekening pelajar dalam 1 x 24 jam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        <div class="d-flex border align-items-center">
                            <i class="fas fa-info m-0"></i>
                            <p class="ms-3 m-0">
                                Invoice dapat juga diakses pada Dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.wrapper -->
</div>

<script>
	$().ready(function() {

		$("#uploadBukti").validate({
			rules:{
				bukti_pembayaran: "required",
			},
			messages:{
				bukti_pembayaran: "<p class='text-danger'>Bukti pembayaran belum dipilih</p>",
			},
		});
	});
</script>