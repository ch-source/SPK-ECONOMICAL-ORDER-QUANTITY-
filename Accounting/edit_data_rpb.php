<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Rencana Pembelian Barang</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  $id=$_GET['id'];
                  $query_a="SELECT * FROM tbl_pembelian WHERE id_pembelian='$id'";
                  $sql_a=mysqli_query($connect, $query_a);
                  $data_a=mysqli_fetch_array($sql_a);

                  $query="SELECT * FROM tbl_barang WHERE id_barang='".$data_a['id_barang']."'";
                  $sql=mysqli_query($connect, $query);
                  $data=mysqli_fetch_array($sql);
                  ?>
                   <form method="post" action="proses_edit_rpb.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Barang</label>
                      <div class="col-sm-2">
                       <input type="text" class="form-control" value="<?php echo $data_a['id_barang'];?>" name="nim" readonly="readonly">
                      </div>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" value="<?php echo $data['nama_barang'];?>" name="" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $data_a['satuan'];?>" id="satuan" readonly="readonly"  name="satuan">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Periode</label>
                        <div class="col-sm-2">
                            <select name="bulan" class="form-control" required="required">
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
                        <div class="col-sm-2">
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
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah Barang</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="jml" name="jml" value="<?php echo $data_a['jumlah'];?>" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Harga Satuan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $data_a['harga_satuan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Biaya Pembelian</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="pembelian" value="<?php echo $data_a['biaya_pembelian'];?>" name="pembelian" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Biaya Penyimpanan (%)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="peyimpanan" value="<?php echo $data_a['biaya_penyimpanan'];?>" name="py" required="required">
                      </div>
                      <label class="col-sm-1 col-form-label">LT/Hari</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="lt" value="<?php echo $data_a['lead_time'];?>" name="lt" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Biaya</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="ttl" name="ttl" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label">EOQ</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="eoq" name="eoq" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Frekuensi Pembelian</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="frekuensi" name="frekuensi" readonly="readonly">
                      </div>
                      <label class="col-sm-2 col-form-label">ROP</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="rop" name="rop" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="dashboard_accounting.php?p=data_pembelian_barang" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Batal</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       <script type="text/javascript" src="./query_java.js"></script>
        <script type="text/javascript">    
        $(document).ready(function() {
                        $("#jml, #stok, #pembelian, #peyimpanan, #lt").keyup(function() {
                                 var jml  = $("#jml").val();
                                 var stok = $("#stok").val();
                                 var pembelian = $("#pembelian").val();
                                 var peyimpanan = $("#peyimpanan").val();
                                  var lt = $("#lt").val();
            
                                var ttl = parseInt(jml) * parseInt(stok);
                                $("#ttl").val(ttl);

                                var eoq1 = Math.sqrt((2 * parseInt(jml) * parseInt(pembelian)) / (parseInt(stok) * parseInt(peyimpanan) / 100));
                                var eoq = Math.round(eoq1)
                                $("#eoq").val(eoq);

                                var frekuensi = Math.round(parseInt(eoq) / parseInt(jml));
                                $("#frekuensi").val(frekuensi);

                                var rop = (parseInt(lt) - parseInt(frekuensi) * parseInt(jml));
                                $("#rop").val(rop);
                              });
                            });
        
        </script> 
        <!---Container Fluid-->