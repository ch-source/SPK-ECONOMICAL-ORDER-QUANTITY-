<?php
include"koneksi.php";
$query_user = "SELECT max(id_pengguna) as maxId FROM tbl_pengguna";
$hasil_user = mysqli_query($connect,$query_user);
$data_user = mysqli_fetch_array($hasil_user);
$iduser = $data_user['maxId'];
$noUser = (int) substr($iduser, 3, 3);
$noUser++;
$char = "PGN";
$iduser= $char . sprintf("%03s", $noUser);


$nama = $_POST['nama'];
$tlpn = $_POST['tlpn'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$password = $_POST['password'];
$cek = mysqli_query($connect, "SELECT * FROM tbl_pengguna WHERE username = '$username'");
$result = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);
if ($result > 0) {
   echo "<script>alert('Proses Registrasi Gagal!, Username Yang Anda Masukkan Sudah Digunakan, Masukkan Username Yang Berbeda');
    document.location.href='dashboard.php?p=input_pengguna'</script>\n";
}else if ($result ==0) {
      $query2="INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_pengguna`, `telepon`, `email`, `username`, `password`, `level`) VALUES ('$iduser', '$nama', '$tlpn', '$email', '$username', '$password', '$jabatan')";
      $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        echo "<script>alert('Pengguna Baru Berhasil Ditambahkan.');
        document.location.href='dashboard.php?p=data_pengguna'</script>\n";
      }else{
        echo "<script>alert('Data Pengguna Gagal Disimpan !');
        document.location.href=dashboard.php?p=input_pengguna'</script>\n";
      }
    }
?>