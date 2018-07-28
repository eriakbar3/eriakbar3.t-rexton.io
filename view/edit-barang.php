<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
   <?php include('head.php');
   
   ?>

    <body>
        <?php include('header.php');?>
        <section id="content">
            <div class="container">
                <header class="page-header">
                </header>

                <div class="overview row"></div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>DATA BARANG</b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <?php
                      include 'koneksi.php';
                      $kd = $_GET['kd'];
                      $sql = mysql_query("SELECT * FROM barang WHERE kode_barang = '$kd'");
                      $r = mysql_fetch_array($sql);
                       ?>
                    <form class="" action="proses-edit-barang.php" method="post">
                      <input type="hidden" name="kd" value="<?php echo $r['kode_barang'] ?>">
                      <div class="form-group col-xs-6">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" value="<?php echo $r['nama_barang']; ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Merek</label>
                        <input type="text" name="merek" value="<?php echo $r['merek']; ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Tipe</label>
                        <input type="text" name="tipe_barang" value="<?php echo $r['tipe_barang'] ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Kode</label>
                        <input type="text" name="code" value="<?php echo $r['kode'] ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" value="<?php echo $r['keterangan'] ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-2">
                        <label for="">Stock</label>
                        <input type="text" name="stock" readonly value="<?php echo $r['stock'] ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-2">
                        <label for="">Stock Tambahan</label>
                        <input type="text" name="stocktambah" class="form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Harga Beli</label>
                        <input type="text" name="harga_beli" value="<?php echo $r['harga_beli'] ?>" onkeyup="hitung_profit()"  class="nominal form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Harga Jual</label>
                        <input type="text" name="harga_jual" value="<?php echo $r['harga_jual'] ?>" onkeyup="hitung_profit()"  class="nominal form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Profit</label>
                        <input type="text" name="profit" value="<?php echo $r['profit'] ?>" class="nominal form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <input type="hidden" name="tanggungjawab" value="<?php echo $_SESSION['id_user']; ?>" readonly="on" class=" form-control">
                      </div>
                      <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg form-control" value="kirim">Submit</button>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </section>
         <script type="text/javascript">
            function hitung_profit(){
                var harga_beli = parseFloat($("#harga_beli").val().replace(/\,/g, ''));
                var harga_jual = parseFloat($("#harga_jual").val().replace(/\,/g, ''));
                var profit = harga_jual - harga_beli;
                if(isNaN(profit)){
                    profit = 0;
                }
                $("#profit").val(profit);
            }
        </script>
        <?php include 'scripts.php';?>
    </body>
</html>
