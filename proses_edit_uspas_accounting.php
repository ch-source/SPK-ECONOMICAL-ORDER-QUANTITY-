<?php
include"koneksi.php";
session_start();
$id=$_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];


$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tbl_pengguna  WHERE username='$_SESSION[masuk]'")); 
if ($data['level'] == 'Accounting') {
  $iduser="".$data['id_pengguna']."";

  $query2="UPDATE tbl_pengguna SET username='$username', password='$password' WHERE id_pengguna='$id'";
  $sql2=mysqli_query($connect, $query2);
  if ($sql2) {
    echo "<script>alert('Username Dan Password Anda Berhasil Diubah Silahkan Login Lagi');
    document.location.href='./index.php'</script>\n";
  }else{
    echo "<script>alert('Username Dan Password Anda  Gagal Diubah !');
    document.location.href=dashboard_accounting.php?p=edit_uspas&id=".$id."'</script>\n";
  }
}
?>