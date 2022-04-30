<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Data Pengguna</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_pengguna.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tlpn" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Pilih Jabatan</label>
                      <div class="col-sm-10">
                        <select name="jabatan" class="form-control" required="required">
                          <option value="" selected="selected">..Pilih Jabatan..</option>
                          <option value="Admin Gudang">Admin Gudang</option>
                          <option value="Accounting">Accounting</option>
                          <option value="Owner">Owner</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="dashboard.php?p=data_pengguna" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Batal</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->