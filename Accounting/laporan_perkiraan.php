<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Laporan Perkiraan</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan Perkiraan</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 5px;">
              <div class="card">
                <div class="card-header">
                  <b class="card-title">Laporan Perkiraan</b>
                </div>
                <div class="card-body">
                   <form method="post" action="laporan/laporan_perkiraan.php" target="_blank">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Periode</label>
                      <div class="col-sm-3">
                        <select name="periode" class="form-control" required="required">
                            <?php
                          $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                          for($a=1;$a<=12;$a++){
                           if($a==date("m"))
                           { 
                           $pilih="selected";
                           }
                           else 
                           {
                           $pilih="";
                           }
                          echo("<option value=\"$a\" $pilih>$bulan[$a]</option>"."\n");
                          }
                          ?>
                        </select>
                       </div>
                      <label class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-3">
                          <select name="tahun" class="form-control" required="required">
                            <?php
                            $mulai= date('Y') - 50;
                            for($i = $mulai; $i<$mulai + 100;$i++){
                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                            }
                            ?>
                          </select>
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Cetak </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Laporan Perkiraan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Barang(Nama Barang)</th>
                        <th>Data Perkiraan Pembelian Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_user="SELECT * FROM tbl_barang";
                       $sql_user=mysqli_query($connect, $query_user);
                       while ($data_user=mysqli_fetch_array($sql_user)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_user['id_barang'];?>-(<?php echo $data_user['nama_barang'];?>)</td>
                      <td>
                      <table class="table table-bordered" style="font-size: 12px;">
                        <thead>
                          <tr>
                              <th>P/T</th>
                              <th>Tanggal</th>
                              <th>Jumlah</th>
                              <th>Harga Satuan</th>
                              <th>Total Biaya</th>
                              <th>EOQ</th>
                              <th>Frekuensi</th>
                              <th>ROP</th>
                          </tr>
                        </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $query="SELECT * FROM tbl_perkiraan WHERE id_barang='".$data_user['id_barang']."'";
                            $sql=mysqli_query($connect, $query);
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                              <td><?php echo $data['periode'];?>-<?php echo $data['tahun'];?></td>
                              <td><?php echo $data['tanggal'];?></td>
                              <td><?php echo $data['jumlah'];?> <?php echo $data['satuan'];?></td>
                              <td><?php 
                                $stok= $data['harga_satuan'];
                                echo "Rp.".number_format($stok, 2, ".", ".");
                                ?> 
                              </td>
                              <td><?php 
                                $ttl= $data['total_biaya'];
                                echo "Rp.".number_format($ttl, 2, ".", ".");
                                ?> 
                              </td>
                              <td><?php echo $data['eoq'];?> <?php echo $data['satuan'];?></td>
                              <td><?php echo $data['frekuensi'].' Kali';?></td>
                              <td><?php echo $data['rop'];?> <?php echo $data['satuan'];?></td>
                            </tr>
                          <?php }?>
                        </tbody>
                      </table>
                      </td>
                      </tr>
                      <?php $no++;}
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->