<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Rencana Pembelian Barang</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Rencana Pembelian Barang</li>
            </ol>
          </div>
          
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Rencana Pembelian Barang</h6>
                </div>
                <div class="card-body">
                  <a href="dashboard_accounting.php?p=input_data_rpb" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-edit"></i> INPUT DATA RENCANA PEMBELIAAN BARANG</a>
                  <div class="table-responsive p-3"> 
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Barang(Nama Barang)</th>
                        <th>Data Rencana Pembelian Barang</th>
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
                              <th>Satuan</th>
                              <th>Jumlah</th>
                              <th>Harga Satuan</th>
                              <th>Biaya Pembelian</th>
                              <th>Biaya Penyimpanan(%)</th>
                              <th>Lead Time</th>
                              <th>Total Biaya</th>
                              <th>Opsi</th>
                          </tr>
                        </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $query="SELECT * FROM tbl_pembelian WHERE id_barang='".$data_user['id_barang']."'";
                            $sql=mysqli_query($connect, $query);
                            while ($data=mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                              <td><?php echo $data['periode'];?>-<?php echo $data['tahun'];?></td>
                              <td><?php echo $data['tanggal'];?></td>
                              <td><?php echo $data['satuan'];?></td>
                              <td><?php echo $data['jumlah'];?></td>
                              <td><?php 
                                $stok= $data['harga_satuan'];
                                echo "Rp.".number_format($stok, 2, ".", ".");
                                ?> 
                              </td>
                              <td><?php 
                                $pembelian= $data['biaya_pembelian'];
                                echo "Rp.".number_format($pembelian, 2, ".", ".");
                                ?> 
                              </td>
                              <td><?php echo $data['biaya_penyimpanan'].'%';?></td>
                              <td><?php echo $data['lead_time'].' Hari';?></td>
                               <td><?php 
                                $ttl= $data['total_biaya'];
                                echo "Rp.".number_format($ttl, 2, ".", ".");
                                ?> 
                              </td>
                              <td><a href="dashboard_accounting.php?p=edit_data_rpb&id=<?php echo $data['id_pembelian'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                         </td>
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