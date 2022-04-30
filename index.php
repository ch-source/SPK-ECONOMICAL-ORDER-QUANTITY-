<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/lg.png" rel="icon">
  <title>CV. Laksmi Dewata - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-15 col-lg-10 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="img/logon.png" style="width:250px; height: 250px;">
                    <h2 class="h4 text-gray-900 mb-4"> CV. LAKSMI DEWATA</h2>
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
                  <form action="proses_login.php" method="post">
                    <div class="form-group">
                      <input type="text" name="Username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                      <input type="password" name="Password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                      <button button type="submit" name="masuk" class="btn btn-primary btn-block btn-flat"><i class="fa fa-input">Login</button>
                    </div>
                    </form>
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