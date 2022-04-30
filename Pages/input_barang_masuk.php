<!-- Container Fluid-->           
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Barang Masuk</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_barang_masuk.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ID Barang</label>
                      <div class="col-sm-4">
                       <select id="nim" name="nim" class="form-control"  autofocus="autofocus" onchange="changeValueNIM(this.value)">
                             <option value="" selected="selected">Pilih Barang</option>
                             <?php 
                               $sql=mysqli_query($connect, "SELECT * FROM tbl_barang");
                               $jsArray = "var prdName = new Array();\n";
                               while ($data=mysqli_fetch_array($sql)) {
                              
                                echo '<option value="'.$data['id_barang'].'">'.$data['id_barang'].'-'.$data['nama_barang'].'</option> ';
                                $jsArray .= "prdName['" . $data['id_barang'] . "'] = {stok_akhir:'" . addslashes($data['stok_akhir']) . "', satuan:'" . addslashes($data['satuan']) . "'};\n";
                              
                               }
                              ?>
                          </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Stok Akhir</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" id="stok_akhir" readonly="readonly"  name="stk" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tgl. Barang Masuk</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" name="tgl" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="satuan" name="satuan" readonly="readonly">
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Periode</label>
                        <div class="col-sm-8">
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
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
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
                      </div>
                    </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jml. Barang Masuk</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="stok" name="stok" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Total Stok</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="ttl" name="ttl" readonly="readonly">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a href="dashboard.php?p=data_barang_masuk" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Batal</a>
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
        <?php echo $jsArray; ?>  
        function changeValueNIM(x){ 
        document.getElementById('stok_akhir').value = prdName[x].stok_akhir;    
        document.getElementById('satuan').value = prdName[x].satuan;        
        };  

        $(document).ready(function() {
                        $("#stok_akhir, #stok").keyup(function() {
                                 var stok_akhir  = $("#stok_akhir").val();
                                 var stok = $("#stok").val();
            
                                var ttl = parseInt(stok_akhir) + parseInt(stok);
                                $("#ttl").val(ttl);
                              });
                            });
        </script> 
        <!---Container Fluid-->