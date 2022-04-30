<?php 
include"koneksi.php";

$id=$_GET['id'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$stoka = $_POST['stoka'];
$satuan = $_POST['satuan'];

    $query="UPDATE tbl_barang SET nama_barang='$nama', stok_awal='$stok', stok_akhir='$stoka', satuan='$satuan' WHERE id_barang='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
      echo "<script>alert('Data Barang Berhasil Diubah');
      document.location.href='dashboard.php?p=data_barang'</script>\n";
    }else{
      echo "<script>alert('Data Barang Gagal Diubah!');
      document.location.href='dashboard.php?p=edit_barang&id=".$id."'</script>\n";
    }
?>
