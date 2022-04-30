<?php
 session_start();
include "koneksi.php";
    if (isset($_POST['masuk'])) {
        $user = $_POST['Username'];
        $pass = $_POST['Password'];

        $cek = mysqli_query($connect, "SELECT username, password, level FROM tbl_pengguna WHERE username = '$user' AND password = '$pass'");
        $result = mysqli_num_rows($cek);
        $data = mysqli_fetch_array($cek);
        if ($result > 0) {
            if ($data['level']=='Admin Gudang') {
                $_SESSION['masuk'] = $user;
                header("location:dashboard.php");
            }elseif ($data['level']=='Accounting') {
                $_SESSION['masuk'] = $user;
                header("location:dashboard_accounting.php");
            }elseif ($data['level']=='Owner') {
                $_SESSION['masuk'] = $user;
                header("location:dashboard_owner.php");
            }
        }else if ($result ==0) {
            echo "<script>alert('Proses Login Gagal, Email / Username Atau Password Yang Anda Masukkan Tidak Terdaftar');
            document.location.href='index.php'</script>\n";
            }
        }   
?>