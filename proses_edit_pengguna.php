<?php
include"koneksi.php";
session_start();

$id=$_GET['id'];
$nama = $_POST['nama'];
$tlpn = $_POST['tlpn'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_pengguna  WHERE username='$_SESSION[masuk]'")); 
if ($data['level'] == 'Admin Gudang') {
  $iduser="".$data['id_pengguna']."";

  $query2="UPDATE tbl_pengguna SET nama_pengguna='$nama', telepon='$tlpn', email='$email', password='$password', username='$username', level='$jabatan' WHERE id_pengguna='$id'";
  $sql2=mysqli_query($connect, $query2);
      if ($sql2) {
        if ($id==$iduser) {
          echo "<script>alert('Data Anda Berhasil Diubah Silahkan Login Lagi');
          document.location.href='index.php'</script>\n";
        }else{
          echo "<script>alert('Data Pengguna Berhasil Diubah.');
          document.location.href='dashboard.php?p=data_pengguna'</script>\n";
        }
      }else{
        echo "<script>alert('Data Pengguna Gagal Diubah !');
        document.location.href=dashboard.php?p=edit_pengguna&id=".$id."'</script>\n";
      }
    }
?>