<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Pengguna</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
            </ol>
          </div>

          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengguna</h6>
                </div>
                <div class="card-body">
                  <a href="dashboard.php?p=input_pengguna" class="btn btn-primary"><i class="fa fa-plus"></i> TAMBAH PENGGUNA</a>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Username</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include"koneksi.php";
                      $no=1;
                      $query="SELECT*FROM tbl_pengguna";
                      $sql=mysqli_query($connect, $query);
                      while($data=mysqli_fetch_array($sql)) {?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['id_pengguna'];?></td>
                        <td><?php echo $data['nama_pengguna'];?></td>
                        <td><?php echo $data['telepon'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['level'];?></td>
                        <td><?php echo $data['username'];?></td>
                        <td><a href="dashboard.php?p=edit_pengguna&id=<?php echo $data['id_pengguna'];?>" class='btn btn-success btn-sm' style="margin-bottom: 2px;"><i class='fa fa-edit'></i></a>
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