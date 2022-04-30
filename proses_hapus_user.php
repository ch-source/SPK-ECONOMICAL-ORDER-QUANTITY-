<?php
include"koneksi.php";
$id = $_GET['id'];


$query2="DELETE FROM tbl_user WHERE id_user='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  		echo "<script>alert('Data User Berhasil Dihapus');
         document.location.href='dashboard.php?p=data_users'</script>\n";
  	}else{
  		echo "<script>alert('Data User Gagal Dihapus');
         document.location.href='dashboard.php?p=data_users'</script>\n";
}
?>