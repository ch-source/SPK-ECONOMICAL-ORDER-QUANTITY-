      <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Hasil Perkiraan Pembelian Barang</h6>
            </div>
          <div class="card-body" style="overflow: auto;">
           <table class="table table-bordered" style="font-size: 12px;">
            <thead>
              <th>ID Barang-Nama Barang</th>
              <th>Tanggal</th>
              <th>P/T</th>
              <th>Jumlah</th>
              <th>Harga Satuan</th>
              <th>E0Q</th>
              <th>Frekuensi Pembelian</th>
              <th>ROP</th>
            </thead>
            <tbody>
          <?php
          if (isset($_POST['id_pembelian'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_pembelian'] as $value) {
              $cek_a = mysqli_query($connect, "SELECT * FROM tbl_perkiraan WHERE periode = '$periode' AND tahun= '$tahun' AND id_pembelian = '$value'");
                $result_a = mysqli_num_rows($cek_a);
                $data_a = mysqli_fetch_array($cek_a);
                if ($result_a > 0) {
                  echo "<script>alert('Opss!, Salah Satu / Beberapa Barang Yang Anda Pilih Sudah Terdaftar Di Tabel Perkiraan Untuk Periode Dan Tahun Yang Anda Pilih');
                  document.location.href='dashboard_accounting.php?p=input_hk'</script>\n";
                }else{
                  $query="SELECT * FROM tbl_pembelian WHERE id_pembelian='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<tr>";
                    $query_b="SELECT * FROM tbl_barang WHERE id_barang='".$data['id_barang']."'";
                    $sql_b=mysqli_query($connect, $query_b);
                    $data_b=mysqli_fetch_array($sql_b);

                    echo"<td>".$data['id_barang']."-".$data_b['nama_barang']."</td>";
                    echo"<td>".date('Y-m-d')."</td>";
                    echo"<td>".$periode."/".$tahun."</td>";
                    echo"<td>".$data['jumlah']." ".$data['satuan']."</td>";
                    echo"<td>Rp.".number_format($data['harga_satuan'], 2, ".", ".")."/".$data['satuan']."</td>";

                    $query_beli="SELECT * FROM tbl_pembelian WHERE periode='$periode' AND tahun='$tahun' AND id_pembelian='".$data['id_pembelian']."'";
                    $sql_beli=mysqli_query($connect, $query_beli);
                    $data_beli=mysqli_fetch_array($sql_beli);
                    $r=$data_beli['jumlah'];
                    $p=$data_beli['harga_satuan'];

                    $s = 150000;
                    $i = 0.25;

                    $eoq1 =round((2 * $r * $s) / ($p * $i),3);
                    $eoq = sqrt($eoq1);
                    echo"<td>".round($eoq,3)." Unit</td>";

                    $f = round($eoq,3) / $r;
                    echo"<td>".$f." Kali</td>";

                   
                      
                    echo"<tr>";
                    
                  }
                }
                
              }
            }else{
              echo "<script>alert('Opss!, Nama Debitur Belum Dipilih');
              document.location.href='dashboard.php?p=data_analisis_kelayakan'</script>\n";
            }
          }
      ?>
    </tbody>
  </table>
            <form method='post' action='proses_simpan_hk.php'>
              <div class="box-body" style="height:10px; overflow: auto;">
          <?php
          if (isset($_POST['id_pembelian'])) {
                include"koneksi.php";
                $periode=$_POST['periode'];
                $tahun=$_POST['tahun'];
                if (isset($_POST['simpan'])){
                foreach ($_POST['id_pembelian'] as $value) {
                  $query="SELECT * FROM tbl_pembelian WHERE id_pembelian='$value'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                    echo"<div class='row'>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>No. KK</label>";
                            echo"<input type='text' name='id[]' readonly='readonly' class='form-control' value='".$data['no_kk']."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-6'>";
                          echo"<div class='form-group'>";
                          echo"<label>Nama</label>";
                            echo"<input name='nama[]' type='text' readonly='readonly' class='form-control' value='".$data['nama']."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tgl</label>";
                            echo"<input type='text' name='tgl[]' readonly='readonly' value='".date('Y-m-d')."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Periode</label>";
                          echo"<input type='text' name='periode[]' readonly='readonly' value='".$periode."' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Tahun</label>";
                            echo"<input type='text' name='tahun[]' readonly='readonly' value='".$tahun."' type='text' class='form-control' required='required'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      $sql_a="SELECT min(c1) as min_c1 FROM tbl_hasil_keputusan WHERE no_kk='".$data['no_kk']."'";
                    $hasil_a=mysqli_query($connect,$sql_a);
                    $row_a=mysqli_fetch_array($hasil_a);
                    $min_c1=$row_a['min_c1'];

                     $sql_c="SELECT max(c2) as max_c2, max(c3) as max_c3, max(c4) as max_c4, max(c5) as max_c5 FROM tbl_hasil_keputusan WHERE no_kk='".$data['no_kk']."'";
                    $hasil_c=mysqli_query($connect,$sql_c);
                    $row_c=mysqli_fetch_array($hasil_c);
                    $max_c2=$row_c['max_c2'];
                    $max_c3=$row_c['max_c3'];
                    $max_c4=$row_c['max_c4'];
                    $max_c5=$row_c['max_c5'];

                    echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Score Akhir</label>";
                            echo"<input type='text' name='c_1[]' readonly='readonly' class='form-control' value='".$min_c1."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>UKD 2</label>";
                            echo"<input type='text' name='c_2[]' readonly='readonly' class='form-control' value='".$max_c2."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>UKD 2</label>";
                            echo"<input type='text' name='c_3[]' readonly='readonly' class='form-control' value='".$max_c3."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>UKD 2</label>";
                            echo"<input type='text' name='c_4[]' readonly='readonly' class='form-control' value='".$max_c4."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>UKD 2</label>";
                            echo"<input type='text' name='c_5[]' readonly='readonly' class='form-control' value='".$max_c5."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";
                      
                    $bobot = array(0.1, 0.15, 0.2, 0.25, 0.3);

                    $sql_b="SELECT * FROM tbl_hasil_keputusan";
                    $hasil_b=mysqli_query($connect,$sql_b);
                    $row=mysqli_fetch_array($hasil_b);
                      $c1_normalisasi=round($row['c1']/$row_a['min_c1'],2);
                     $c2_normalisasi=round($row['c2']/$row_c['max_c2'],2);
                     $c3_normalisasi=round($row['c3']/$row_c['max_c3'],2);
                     $c4_normalisasi=round($row['c4']/$row_c['max_c4'],2);
                     $c5_normalisasi=round($row['c5']/$row_c['max_c5'],2);

                     $skor= round(
                           (($row['c1']/$row_a['min_c1'])*$bobot[0])+
                           (($row['c2']/$row_c['max_c2'])*$bobot[1])+
                           (($row['c3']/$row_c['max_c3'])*$bobot[2])+
                           (($row['c4']/$row_c['max_c4'])*$bobot[3])+
                           (($row['c5']/$row_c['max_c5'])*$bobot[4]),3);

                      if ($skor >= 0.95 ){
                      $predikat = "Rentan Miskin";
                      }elseif ($skor >= 0.85){
                      $predikat = "Miskin";
                      }elseif ($skor >= 0.75){
                      $predikat = "Rentan Miskin";
                      }else{
                      $predikat = "Tidak Miskin";
                      }
                      echo"<div class='row'>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>Score Akhir</label>";
                            echo"<input type='text' name='skor[]' readonly='readonly' class='form-control' value='".$skor."'>";
                          echo"</div>";
                        echo"</div>";
                        echo"<div class='col-sm-4'>";
                          echo"<div class='form-group'>";
                          echo"<label>UKD 2</label>";
                            echo"<input type='text' name='predikat[]' readonly='readonly' class='form-control' value='".$predikat."'>";
                          echo"</div>";
                        echo"</div>";
                      echo"</div>";

                    }
                }
              }
            }else{
              echo "<script>alert('Opss!, Debitur Belum Dipilih');
              document.location.href='dashboard.php?p=data_analisis_kelayakan'</script>\n";
            }
        
      ?>
       </div>
      <a href="dashboard.php?p=data_hasil_keputusan" class="btn btn-danger" style="margin-top: 15px;"><i class="fa fa-close"></i> Tutup</a>
      <button type='submit' class='btn btn-success' style="margin-top: 15px;"><i class='fa fa-save'></i> Simpan Proses Akhir</i></button>
      </form>
          </div>
         
        </div>
      </div>
     