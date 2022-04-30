<?php 
include"koneksi.php";

$id=$_GET['id'];
$nim = $_POST['nim'];
$satuan = $_POST['satuan'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tgl = $_POST['tgl'];
$jml = $_POST['jml'];
$stok =$_POST['stok'];
$pembelian = $_POST['pembelian'];
$py = $_POST['py'];
$lt = $_POST['lt'];
$ttl = $_POST['ttl'];
$eoq = $_POST['eoq'];
$frekuensi = $_POST['frekuensi'];
$rop = $_POST ['rop'];

$query="UPDATE tbl_pembelian SET id_barang='$nim', satuan='$satuan', periode='$bulan', tahun='$tahun', tanggal='$tgl', jumlah='$jml', harga_satuan='$stok', biaya_pembelian='$pembelian', biaya_penyimpanan='$py', lead_time='$lt', total_biaya='$ttl' WHERE id_pembelian='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
    $query_r="UPDATE tbl_perkiraan SET jumlah='$jml', harga_satuan='$stok', total_biaya='$ttl', periode='$bulan', tahun='$tahun', tanggal='$tgl', eoq='$eoq', frekuensi='$frekuensi', rop='$rop'  WHERE id_pembelian='$id'";
    $sql_r=mysqli_query($connect, $query_r);
      if ($query_r) {
      echo "<script>alert('Data Rencana Pembelian Barang Berhasil Diubah');
      document.location.href='dashboard_accounting.php?p=data_pembelian_barang'</script>\n";
    }else{
      echo "<script>alert('Data Rencana Pembelian Barang Gagal Diubah!');
      document.location.href='dashboard_accounting.php?p=edit_data_rpb&id=".$id."'</script>\n";
    }
}
?>
