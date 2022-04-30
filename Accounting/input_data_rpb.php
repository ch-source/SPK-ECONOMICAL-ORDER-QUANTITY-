<!-- Container Fluid-->           
        <div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Rencana Pembelian Barang</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="proses_simpan_rpb.php" enctype="multipart/form-data">
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
                                $jsArray .= "prdName['" . $data['id_barang'] . "'] = {satuan:'" . addslashes($data['satuan']) . "'};\n";
                              
                               }
                              ?>
                          </select>
                      </div>
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" id="satuan" readonly="readonly"  name="satuan" required="required">
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
                      <label class="col-sm-2 col-form-label">Jumlah P. Barang</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="jml" name="jml" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Harga Satuan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="stok" name="stok" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Biaya Pembelian</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="pembelian" name="pembelian" required="required">
                      </div>
                      <label class="col-sm-2 col-form-label">Biaya Penyimpanan (%)</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="peyimpanan" name="py" required="required">
                      </div>
                      <label class="col-sm-1 col-form-label">LT/Hari</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="lt" name="lt" required="required">
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
        <?php echo $jsArray; ?>  
        function changeValueNIM(x){   
        document.getElementById('satuan').value = prdName[x].satuan;        
        };  

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