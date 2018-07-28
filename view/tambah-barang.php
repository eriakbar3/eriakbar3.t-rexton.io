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

                <div class="overview row">



                </div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>DATA BARANG</b></div>
                    </div>
                    <div class="t-body tb-padding">

                    <form class="" action="proses-tambah-barang.php" method="post">
                      <div class="form-group col-xs-6">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Merek</label>
                        <input type="text" name="merek" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Tipe Barang</label>
                        <input type="text" name="tipe_barang" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Code</label>
                        <input type="text" name="code" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-12">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Stock</label>
                        <input type="text" name="stock" value="" class="form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Harga Beli</label>
                        <input type="text" name="harga_beli" value="" id="harga_beli" onkeyup="hitung_profit()" class="nominal form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Harga Jual</label>
                        <input type="text" name="harga_jual" value="" id="harga_jual" onkeyup="hitung_profit()" class="nominal form-control">
                      </div>
                      <div class="form-group col-xs-4">
                        <label for="">Profit</label>
                        <input type="text" name="profit" value="" id="profit" readonly="" class="nominal form-control">
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
