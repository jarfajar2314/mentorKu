<!-----ini halaman login------>
<div class="content-wrapper">
    <?php
        $auth = "";
        if(isset($_GET['auth'])) $auth = $_GET['auth'];
    ?>
    <?php if($auth == 'fail'){?>
        <div class="container px-lg-5 mt-5">
            <div class="alert alert-danger" role="alert">
                Email atau Password tidak sesuai.
            </div>
        </div>
    <?php }?>
    <div class="wrap-log">
        <div class="container-fluid cont-logbox">
            <form action="/AuthController/login" method="post">
                <label for="exampleInputEmail1">Login pengajar</label>
                <div class="fg form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="fg form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <button type="submit" class="bot-log btn btn-primary">Masuk</button>
                <a href="/pengajar/register" class="bot-log btn btn-primary">Daftar</a>
                <!-- <button type="submit" class="bot-log btn btn-primary">Daftar</button> -->
            </form>
        </div><!-- /.container-fluid -->
    </div>