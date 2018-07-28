<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<?php
include 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");?>
<html>
    <?php include('head.php');?>

    <body>
       <?php include('header.php');?>

        <section id="content">
            <div class="container">
                <header class="page-header"></header>
                <div class="overview row"></div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>TRANSAKSI / SERVIS</b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <?php
                      $tgl = date('Y-m-d');
                        $sql = mysql_query("SELECT max(no_urut) as no_urut, tanggal_servis FROM servis WHERE tanggal_servis = '{$tgl}' ORDER BY tanggal_servis DESC LIMIT 1");
                        $r= mysql_fetch_array($sql);
                        if ($r['tanggal_servis'] == date('Y-m-d')) {
                          $no = $r['no_urut']+1;
                        }else {
                          $no =1;
                        }
                        $sql1 = mysql_query("SELECT * FROM barang");
                        $sql2 = mysql_query("SELECT * FROM barang");
                       ?>
                    <form class="" action="proses-buat-spk.php" method="post">
                      <div class="form-group col-xs-6">
                        <label for="">No Urut</label>
                        <input type="text" name="no_urut" value="<?php echo $no; ?>" class="form-control" readonly>
                      </div>
                      
                      <div class="form-group col-xs-6">
                        <label for="">Nomor Polisi</label>
                        <select class="form-control" name="no_polisi">
                        <?php
                        $sql =  mysql_query("SELECT * FROM motor");
                        while ($motor = mysql_fetch_array($sql)) {
                        ?>
                            <option value="<?php echo $motor['no_polisi'];?>"><?php echo $motor['no_polisi'].' - '.$motor['nama_konsumen'];?></option>
                        <?php } ?>
                        </select>
                      </div>

                      <div class="form-group col-xs-3">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="tanggal" type='text' class="form-control date-picker" placeholder="Click here..." value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                      </div>
                      <div class="form-group col-xs-3">
                        <label for="">Jam</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="jam" type='text' class="form-control date-picker1" placeholder="Click here..." value="<?php echo date('H:i') ?>">
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group col-xs-12">
                          <label> Jenis Layanan</label>
                          <?php
                          $sql =  mysql_query("SELECT * FROM layanan");
                          $i = 0;
                          while ($layanan = mysql_fetch_array($sql)) {
                            $i++;
                          ?>
                          <div class="checkbox col-sm-12">
                            <label class="col-sm-12">
                              <input name="jp[<?php echo $i;?>]" type="checkbox" onclick="hitung_total_servis('<?php echo $i;?>')" id="layanan<?php echo $i;?>" value="<?php echo $layanan['kode_layanan'];?>">
                                <label class="col-sm-7"><?php echo $layanan['jenis_layanan'];?></label>
                                <label class="col-sm-1" style="text-align: right;">Rp. </label>
                                <label class="col-sm-3">
                                  <input type="text" name="harga[<?php echo $i;?>]" id="harga_jasa<?php echo $i;?>" value="<?php echo $layanan['harga_layanan'];?>" placeholder="Isi Harga" class="nominal form-control col-sm-12" readonly>
                                </label>
                            </label>
                          </div>
                          <?php } $i++; ?>
                          <div class="checkbox col-sm-12">
                            <label class="col-sm-12">
                              <input name="jp[<?php echo $i;?>]" type="checkbox" onclick="hitung_total_servis_lainnya('<?php echo $i;?>')" id="layanan<?php echo $i;?>" value="lain">
                              <label class="col-sm-7">
                                <input type="text" name="jenis[<?php echo $i;?>]" value="" placeholder="Isi Servis Lainnya" class="form-control col-sm-12">
                              </label>
                              <label class="col-sm-1" style="text-align: right;">Rp. </label>
                              <label class="col-sm-3">
                                <input type="text" name="harga[<?php echo $i;?>]" id="harga_jasa<?php echo $i;?>" value="" placeholder="Isi Harga" class="nominal form-control col-sm-12" " onchange="hitung_total_servis_lainnya('<?php echo $i;?>')">
                              </label>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group col-xs-4">
                        <label for="">Keluhan Konsumen</label>
                        <textarea name="keluhan" rows="8" cols="90" class="form-control" style="height:165px;"></textarea>
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="">Analisa SA</label>
                        <textarea name="analisa_sa" rows="8" cols="90" class="form-control" style="height:165px;"></textarea>
                      </div>
                      <div class="form-group col-xs-12">

                      </div>
                      <div class="form-group col-xs-12">
                        <label for="">Suku Cadang</label><br>
                        <button type="button" name="button" class="btn btn-success" id="tambah">Tambah Suku Cadang</button>
                        <div id="sk">
                          <select class='form-control barang selectpicker' data-live-search="true" style="margin-top:10px" onchange="estimasi_biaya()" name='suku_cadang[]'>
                            <option value=''>Pilih Barang</option>
                            <?php 
                            $dis = '';
                            while ($r2 = mysql_fetch_array($sql2)) {
                                $dis = '';
                                if($r2['stock'] < 1){
                                    $dis = "disabled";
                                }
                            ?>
                                <option value='<?php echo $r2['kode_barang'].'@'.($r2['harga_jual']); ?>' <?php echo $dis;?>> <?php echo $r2['nama_barang'] ?> / <?php echo $r2['merek']." "; ?> / <?php echo $r2['tipe_barang']." "; ?> / <?php echo $r2['keterangan']." "; ?> / <?php echo $r2['kode']." "; ?> / Rp. <?php echo number_format($r2['harga_jual']); ?>/ Stok : <?php echo number_format($r2['stock']); ?></option>
                            <?php } ?>
                        </select>
                        </div>
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Harga Jasa</label>
                        <input type="text" name="harga_jasa" value="0" id="total_harga_jasa" class="nominal form-control" readonly="">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Estimasi Biaya</label>
                        <input type="text" name="es_biaya" value="0" id="es_biaya" class="nominal form-control" readonly="">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Estimasi Jam Selesai</label>
                        <input type="time" name="es_selesai" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Nama Mekanik</label>
                        <select class="form-control" name="id_mekanik">
                            <option>Pilih...</option>
                        <?php
                        $dis = '';
                        $sql =  mysql_query("SELECT * FROM mekanik");
                            $tgl = date("Y-m-d");
                        while ($mekanik = mysql_fetch_array($sql)) {
                            $count = mysql_num_rows(mysql_query("
                                  select id_mekanik
                                  from servis where tanggal_servis = '{$tgl}' and status = 'Dikerjakan' and id_mekanik = '{$mekanik["id_mekanik"]}'
                                  group by id_mekanik
                                  having count(id_mekanik) >= 3"));
                            $dis = '';
                            if($count > 0){
                                $dis = "disabled";
                            }
                        ?>
                            <option value="<?php echo $mekanik['id_mekanik'];?>" <?php echo $dis;?>><?php echo $mekanik['nama_mekanik'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Catatan</label>
                        <input type="text" name="catatan" value="" class="form-control">
                      </div>
                      <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg form-control" value="kirim">Submit</button>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </section>

      <?php include ('scripts.php');?>

      <script type="text/javascript">
        <?php $no_brg = 1;?>
        $("#tambah").click(function(){
            <?php $no_brg++;?>
            $("<select class='form-control barang' style='margin-top:10px' name='suku_cadang[]' onchange='estimasi_biaya()'><option value=''>Pilih Barang</option><?php while ($r1 = mysql_fetch_array($sql1)) { ?> <option value='<?php echo $r1['kode_barang']."@".($r1['harga_jual']); ?>'><?php echo $r1['nama_barang'] ?> / <?php echo $r1['merek']." "; ?> / <?php echo $r1['tipe_barang']." "; ?> / <?php echo $r1['keterangan']." "; ?> / <?php echo $r1['kode']." "; ?> / Rp. <?php echo number_format($r1['harga_jual']); ?></option><?php } ?></select>").appendTo("#sk");

        });
      </script>

      <script type="text/javascript">
        function hitung_total_servis(id) {
          var total_harga_jasa = parseFloat($("#total_harga_jasa").val().replace(/\,/g, ''));
          var harga_jasa = parseFloat($("#harga_jasa"+id).val().replace(/\,/g, ''));
          if(isNaN(harga_jasa)){
            harga_jasa = 0;
          }
          console.log(total_harga_jasa);
          if(document.getElementById("layanan"+id).checked == true){
            total_harga_jasa += harga_jasa;
            console.log(total_harga_jasa);
          }else{
            total_harga_jasa -= harga_jasa;
            console.log(total_harga_jasa);
          }
          $("#total_harga_jasa").val(total_harga_jasa);
          estimasi_biaya();
        }

        function hitung_total_servis_lainnya(id) {
          var total_harga_jasa = parseFloat($("#total_harga_jasa").val().replace(/\,/g, ''));
          var harga_jasa = parseFloat($("#harga_jasa"+id).val().replace(/\,/g, ''));
          if(isNaN(harga_jasa)){
            harga_jasa = 0;
          }
          if(document.getElementById("layanan"+id).checked == true){
            total_harga_jasa += harga_jasa;
            console.log(total_harga_jasa);
          }else{
            $("#harga_jasa"+id).val(0);
            total_harga_jasa -= harga_jasa;
            console.log(total_harga_jasa);
          }
          $("#total_harga_jasa").val(total_harga_jasa);
          estimasi_biaya();
        }

        function estimasi_biaya(){
          var data;
          var harga_barang = 0;
          $( ".barang" ).each(function( index ) {
            data = $(this).val();
            data = data.split("@");
            if(isNaN(data[1])){
              data[1] = 0;
            }
            harga_barang += parseFloat(data[1]);
          });
          var total_biaya = parseFloat($("#total_harga_jasa").val().replace(/\,/g, '')) + harga_barang;
          $("#es_biaya").val(total_biaya);
        }
      </script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />

      <script type="text/javascript">
        $(function() {
          $('.selectpicker').selectpicker();
        });

      </script>

    </body>
</html>




