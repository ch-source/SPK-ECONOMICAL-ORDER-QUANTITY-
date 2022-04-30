<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Username & Password</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query="SELECT * FROM tbl_pengguna WHERE id_pengguna='$id'";
                  $sql=mysqli_query($connect, $query);
                  $data=mysqli_fetch_array($sql);?>
                  <form method="post" action="proses_edit_uspas_owner.php?id=<?php echo $id;?>">
                    <p style="font-weight: bold;">Username & Password Lama</p>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username Lama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data['username'];?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password Lama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $data['password'];?>" readonly="readonly">
                      </div>
                    </div>
                    <p style="font-weight: bold;">Username & Password Baru</p>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username Baru</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control"  name="username" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control"  name="password" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->