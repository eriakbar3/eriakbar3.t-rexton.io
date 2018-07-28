<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <?php include('head.php');?>

    <body>
        <?php include('header.php');?>
        <section id="content">
            <div class="container">

                <header class="page-header">
                </header>

                <div >
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>Data Servis</b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <?php
                        include 'koneksi.php';
                       
                        $sql1 = mysql_query("SELECT * FROM barang");
                        $sql2 = mysql_query("SELECT * FROM barang");

                        $sql_servis = mysql_fetch_assoc(mysql_query("select * from servis where kode_servis = '{$_GET['kd']}' "));
                       ?>
                    <form class="" action="proses-edit-servis.php?kd=<?php echo $_GET['kd'] ?>" method="post">
                        <div class="form-group col-xs-12">
                          <label for="">Tanggal</label>
                          <div class="input-group  col-xs-3">
                              <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="tanggal_servis" type='text' class="form-control date-picker" placeholder="Click here..." value="<?php echo date('Y-m-d',strtotime($sql_servis['tanggal_servis'])); ?>" readonly>
                                </div>
                          </div>

                        </div>
                         <div class="form-group col-xs-12">
                          <label for="">No. Polisi</label>
                          <div class="input-group  col-xs-3">
                              <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="no_polisi" type='text' class="form-control" value="<?php echo $sql_servis['no_polisi']; ?>" readonly>
                                </div>
                          </div>
                          
                        </div>
                        <div class="form-group col-xs-12">
                          <label> Jenis Layanan</label><br>
                          <?php
                          $arr_layanan_servis = mysql_query("select * from detail_layanan_servis where kode_servis = '{$_GET['kd']}'");
                          $layanan_servis_lookup = array();
                          while ($layanan_servis = mysql_fetch_array($arr_layanan_servis)) {
                            $layanan_servis_lookup[$layanan_servis['kode_layanan']] = [
                                'jenis_layanan' => $layanan_servis['jenis_layanan'],
                                'harga_layanan' => $layanan_servis['harga_layanan'],
                            ];
                          }

                          $sql =  mysql_query("SELECT * FROM layanan");
                          $i = 0;
                          while ($layanan = mysql_fetch_array($sql)) {
                            $i++;
                          ?>
                          <div class="checkbox col-sm-7">
                            <label class="col-sm-12">
                              <input name="jp[<?php echo $i;?>]" <?php echo isset($layanan_servis_lookup[$layanan['kode_layanan']]) ? 'checked' : ''; ?> type="checkbox"  id="layanan<?php echo $i;?>" value="<?php echo $layanan['kode_layanan'];?>">
                                <label class="col-sm-6"><?php echo $layanan['jenis_layanan'];?></label>
                                <label class="col-sm-1" style="text-align: right;">Rp. </label>
                                <label class="col-sm-4">
                                  <input type="text" name="harga[<?php echo $i;?>]" id="harga_jasa<?php echo $i;?>" value="<?php echo $layanan['harga_layanan'];?>" placeholder="Isi Harga" class="nominal form-control col-sm-12" readonly>
                                </label>
                            </label>
                          </div>
                          <?php } $i++; ?>
                        <div class="checkbox col-sm-7">
                            <label class="col-sm-12">
                              <input name="jp[<?php echo $i;?>]" type="checkbox" <?php echo isset($layanan_servis_lookup['lain']) ? 'checked' : ''; ?> id="layanan<?php echo $i;?>" value="lain">
                              <label class="col-sm-6">
                                <input type="text" name="jenis[<?php echo $i;?>]" value="<?php echo isset($layanan_servis_lookup['lain']) ? $layanan_servis_lookup['lain']['jenis_layanan'] : ''; ?>" placeholder="Isi Servis Lainnya" class="form-control col-sm-12">
                              </label>
                              <label class="col-sm-1" style="text-align: right;">Rp. </label>
                              <label class="col-sm-4">
                                <input type="text" name="harga[<?php echo $i;?>]" id="harga_jasa<?php echo $i;?>" value="<?php echo isset($layanan_servis_lookup['lain']) ? $layanan_servis_lookup['lain']['harga_layanan'] : ''; ?>" placeholder="Isi Harga" class="nominal form-control col-sm-12">
                              </label>
                            </label>
                        </div>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="">Suku Cadang</label><br>
                        <button type="button" name="button" class="btn btn-success" id="tambah">Tambah Suku Cadang</button>
                        <div id="sk">

                        </div>
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Status Pekerjaan</label>
                        <select class="form-control" name="status">
                          <option value="Dikerjakan">Dikerjakan</option>
                          <option value="Selesai">Selesai</option>
                        </select>
                      </div>
                        <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg" value="kirim">Submit</button>
                        <a href="servis.php">
                        <button type="button" name="kembali" class="btn btn-danger m-t-10 btn-lg" value="Batal">Batal</button></a>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </section>

        <?php include ('scripts.php');?>

        <script type="text/javascript">
        $("#tambah").click(function(){
            $("<select class='form-control' style='margin-top:10px' name='suku_cadang[]'><?php while ($r1 = mysql_fetch_array($sql1)) { ?> <option value='<?php echo $r1['kode_barang']."@".($r1['harga_jual']) ?>'><?php echo $r1['nama_barang'] ?> / <?php echo $r1['merek'] ?> / <?php echo $r1['tipe_barang'] ?> / <?php echo $r1['keterangan'] ?> / Rp. <?php echo $r1['harga_jual'] ?></option><?php } ?></select>").appendTo(sk);

        });
        </script>
    </body>
</html>
