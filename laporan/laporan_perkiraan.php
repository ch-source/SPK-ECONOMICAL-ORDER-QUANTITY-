<?php
include'koneksi.php';
include"fpdf.php";
require('makefont/makefont.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->SetX(1.6);   
$pdf->Image('img/logon.png', 1, 1, 2);
$pdf->SetX(1.6);
$pdf->SetFont('Times','B',12);
$pdf->SetX(3);            
$pdf->MultiCell(15.5,0.6,'CV. Laksmi Dewata',0,'L');
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,'Jl.Tukad Barito Timur No.7 Renon, Denpasar Selatan',0,'L'); 
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Data Perkiraam Periode: ".$periode."/".$tahun,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.6, 'ID Barang-Nama Barang', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Jumlah', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Harga Satuan', 1, 0, 'L');
$pdf->Cell(2.5, 0.6, 'Tanggal', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'P/T', 1, 0, 'L');
$pdf->Cell(3.5, 0.6, 'Total Biaya', 1, 0, 'L');
$pdf->Cell(2.5, 0.6, 'EOQ', 1, 0, 'L');
$pdf->Cell(2.5, 0.6, 'Frekuensi', 1, 0, 'L');
$pdf->Cell(2.5, 0.6, 'ROP', 1, 1, 'L');
$no=1;
$sql="SELECT * FROM tbl_perkiraan WHERE periode='$periode' AND tahun='$tahun'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',7);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $sql_x="SELECT * FROM tbl_barang WHERE id_barang='".$lihat['id_barang']."'";
    $tampil_x=mysqli_query($connect, $sql_x);
    while ($lihat2=mysqli_fetch_array($tampil_x)) {
    $pdf->Cell(5, 0.6,$lihat['id_barang']."-".$lihat2['nama_barang'],1, 0, 'L');
    }
    $pdf->Cell(3, 0.6, $lihat['jumlah']." ".$lihat['satuan'],1, 0, 'L');
    $pdf->Cell(3, 0.6, "Rp. ".number_format($lihat['harga_satuan'], 2, ".", ".")." /".$lihat['satuan'],1, 0, 'L');
    $pdf->Cell(2.5, 0.6, $lihat['tanggal'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['periode']."/".$lihat['tahun'],1, 0, 'L');
    $pdf->Cell(3.5, 0.6,"Rp. ".number_format($lihat['total_biaya'], 2, ".", "."),1, 0, 'L');
    $pdf->Cell(2.5, 0.6, $lihat['eoq']." ".$lihat['satuan'],1, 0, 'L');
    $pdf->Cell(2.5, 0.6, $lihat['frekuensi']." Kali",1, 0, 'L');
    $pdf->Cell(2.5, 0.6, $lihat['rop']." ".$lihat['satuan'],1, 1, 'L');
    $no++;
}

$order="SELECT * FROM tbl_perkiraan WHERE periode='$periode' AND tahun='$tahun'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',8);
$pdf->Cell(25, 0.6,"Jumlah Barang",1, 0, '');
$pdf->Cell(2.5, 0.6, $count ,1, 1, 'C');
$pdf->Output();
?>