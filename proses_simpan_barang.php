<?php
include "koneksi.php";
$query = "SELECT max(id_barang) as maxId FROM tbl_barang";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idbarang = $data['maxId'];
$noUrut = (int) substr($idbarang, 3, 3);
$noUrut++;
$char = "BRG";
$idbarang= $char . sprintf("%03s", $noUrut);


$nama = $_POST['nama'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];

	$query1 = "INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `stok_awal`, `stok_akhir`, `satuan`) VALUES ('$idbarang', '$nama', '$stok', '$stok', '$satuan')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
			echo "<script>alert('Proses Simpan Data Barang Berhasil');
                document.location.href='dashboard.php?p=data_barang'</script>\n";
		}else{
			echo "<script>alert('Proses Simpan Data Barang Gagal');
                document.location.href='dashboard.php?p=input_data_barang'</script>\n";
		}
?>
