<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Kantor Desa Peninjoan - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-15 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="img/logo/logo.png" style="width:100%; height: 140px;">
                    <h1 class="h4 text-gray-900 mb-4">KANTOR DESA PENINJOAN</h1>
                  </div>
                  <?php
              if(isset($_GET['notif'])){
                if($_GET['notif']=="login-gagal"){
                  echo "<div class='alert alert-danger alert-dismissible' style='text-align:justify;'>
                        <a style='text-decoration:none;' href='index.php' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-warning'></i>Oppss!, Proses Login <b>Gagal</b>, Username Atau Password Tidak Terdaftar.
                        </div>";
                }if($_GET['notif']=="ubah-sukses"){
                  echo "<div class='alert alert-success alert-dismissible' style='text-align:justify;'>
                        <a style='text-decoration:none;' href='index.php' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Data Login Anda Berhasil <b>Diubah</b>, Silahkan Login Lagi.
                        </div>";
                }
              }
              ?>
                  <form class="user">
                    <div class="form-group">
                      <input type="username" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <a href="index.html" class="btn btn-primary btn-block">Login</a>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="registrasi.php">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>