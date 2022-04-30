<?php
include "koneksi.php";
$query = "SELECT max(id_pembelian) as maxId FROM tbl_pembelian";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idbarang = $data['maxId'];
$noUrut = (int) substr($idbarang, 3, 3);
$noUrut++;
$char = "RPB";
$idbarang= $char . sprintf("%03s", $noUrut);

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

$cek_a = mysqli_query($connect, "SELECT * FROM tbl_perkiraan WHERE periode = '$bulan' AND tahun= '$tahun' AND id_pembelian = '$idbarang'");
$result_a = mysqli_num_rows($cek_a);
$data_a = mysqli_fetch_array($cek_a);
if ($result_a > 0) {
  echo "<script>alert('Opss!, Salah Satu / Beberapa Barang Yang Anda Pilih Sudah Terdaftar Di Tabel Perkiraan Untuk Periode Dan Tahun Yang Anda Pilih');
  document.location.href='dashboard_accounting.php?p=input_data_rpb'</script>\n";
}else{
$query1 = "INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_barang`, `periode`, `tahun`, `tanggal`, `jumlah`, `satuan`, `harga_satuan`, `biaya_pembelian`, `biaya_penyimpanan`, `lead_time`, `total_biaya`) VALUES ('$idbarang', '$nim', '$bulan', '$tahun', '$tgl', '$jml', '$satuan', '$stok', '$pembelian', '$py', '$lt', '$ttl')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query_r="INSERT INTO `tbl_perkiraan` (`id_perkiraan`, `id_pembelian`, `id_barang`, `periode`, `tahun`, `tanggal`, `jumlah`, `satuan`, `harga_satuan`, `total_biaya`, `eoq`, `frekuensi`, `rop`) VALUES ('', '$idbarang', '$nim', '$bulan', '$tahun', '$tgl', '$jml', '$satuan', '$stok', '$ttl', '$eoq', '$frekuensi', '$rop')";
               $sql_r=mysqli_query($connect, $query_r);
               if ($query_r) {
			echo "<script>alert('Proses Simpan Data Rencana Pembelian Barang Berhasil');
                document.location.href='dashboard_accounting.php?p=data_pembelian_barang'</script>\n";
		}else{
			echo "<script>alert('Proses Simpan Data Rencana Pembelian Barang Gagal');
                document.location.href='dashboard_accounting.php?p=input_data_rpb'</script>\n";
		}
	}
}
?>
