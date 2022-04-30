<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Barang Keluar</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Barang Keluar</li>
            </ol>
          </div>
          
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang Keluar</h6>
                </div>
                <div class="card-body">
                  <a href="dashboard.php?p=input_barang_keluar" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-edit"></i> INPUT DATA BARANG KELUAR</a>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID Barang(Nama Barang)</th>
                        <th>Data Barang Keluar</th>
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
                    <th>ID Barang Keluar</th>
                    <th>P/T</th>
                    <th>Tgl. Barang Keluar</th>
                    <th>Jml. Barang Keluar</th>
                    <th>Satuan</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  include "koneksi.php";
                  $query="SELECT * FROM tbl_barang_keluar WHERE id_barang='".$data_user['id_barang']."'";
                  $sql=mysqli_query($connect, $query);
                  while ($data=mysqli_fetch_array($sql)) {
                  ?>
                <tr>
                  <td><?php echo $data['id_barang_keluar'];?></td>
                  <td><?php echo $data['periode'];?>-<?php echo $data['tahun'];?></td>
                  <td><?php echo $data['tgl_barang_keluar'];?></td>
                  <td><?php echo $data['jml_barang_keluar'];?></td>
                  <td><?php echo $data['satuan'];?></td>
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