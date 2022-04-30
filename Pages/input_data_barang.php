<!-- Container Fluid-->           
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Barang</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_barang.php" enctype="multipart/form-data">
                     <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" required="required">
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
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="stok" required="required">
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
        <!---Container Fluid-->