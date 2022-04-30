<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Persediaan</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Persediaan</li>
            </ol>
          </div>
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Persediaan</h6>
                </div>
                <div class="card-body">
                  <a href="dashboard.php?p=input_persediaan" class="btn btn-primary"><i class="fa fa-plus"></i> TAMBAH PERSEDIAAN</a>
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>ID Debitur</th>
                        <th>Nama</th>
                        <th>No. KTP</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>TTL</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Opsi</th>
                      </tr>
                      </thead>
                        <tbody>
                              <?php
                              include"koneksi.php";
                              $no_a=1;
                              $query_a="SELECT * FROM tbl_persediaan";
                              $sql_a=mysqli_query($connect, $query_a);
                              while($data_a=mysqli_fetch_array($sql_a)) {?>
                              <tr>
                                <td><?php echo $no_a;?></td>
                                <td><?php echo $data_a['id_debitur'];?></td>
                                <td><?php echo $data_a['nama'];?></td>
                                <td><?php echo $data_a['no_ktp'];?></td>
                                <td><?php echo $data_a['jk'];?></td>
                                <td><?php echo $data_a['alamat'];?></td>
                                <td><?php echo $data_a['tempat_lahir'];?>, <?php echo $data_a['tgl_lahir']; ?></td>
                                <td><?php echo $data_a['agama'];?></td>
                                <td><?php echo $data_a['status'];?></td>
                                <td>
                                <a href="dashboard.php?p=edit_debitur&id=<?php echo $data_a['id_debitur'];?>" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="fa fa-edit"></i></a>
                                <a href="proses_hapus_debitur.php?id=<?php echo $data_a['id_debitur'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                              <?php $no_a++;}?>
                            </tbody>
                          </table>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

        </div>
        <!---Container Fluid-->