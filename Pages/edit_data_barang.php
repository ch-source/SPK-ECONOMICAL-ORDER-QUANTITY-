<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Barang</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_barang WHERE id_barang='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);?>
                   <form method="post" action="proses_edit_barang.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data_a['nama_barang'];?>" name="nama" required="required">
                      </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                        <select name="satuan" class="form-control" required="required">
                          <option selected="selected">-Pilih Satuan-</option>
                          <option value="Pcs">Pcs</option>
                          <option value="Unit">Unit</option>
                        </select>
                        </div>
                      </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Stok Awal</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="stok" value="<?php echo $data_a['stok_awal'];?>" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Stok Akhir</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="stoka" value="<?php echo $data_a['stok_akhir'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="dashboard.php?p=data_barang" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Batal</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>