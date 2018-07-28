<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<?php include('koneksi.php');?>
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
                        <div class="th-title"><b>TRANSAKSI / PENJUALAN</b></div>
                    </div>
                    <div class="t-body tb-padding">

                    <form class="" action="proses-tambah-penjualan.php" method="post">
                      <div class="form-group col-xs-6">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="tanggal" type='text' value= "<?php echo date('Y-m-d')?>" readonly class="form-control date-picker" placeholder="Click here...">
                            </div>
                        </div>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">No Polisi</label>
                        <select class="form-control" name="no_polisi">
                            <option></option>
                            <?php
                            $a =  mysql_query("SELECT * FROM motor");
                            while ($motor = mysql_fetch_array($a)) {
                            ?>
                                <option value="<?php echo $motor['no_polisi'];?>"><?php echo $motor['no_polisi'];?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="col-xs-12" style="margin-top:10px;margin-bottom:10px;">
                        <div class="col-sm-6" style="margin-left:25%">
                          <a href="#modal1" data-toggle="modal" class="btn btn-danger  btn-lg form-control " value="kirim">Tambah Barang</a>
                        </div>

                      </div>
                      <div class="" id="barangs" >

                      </div>
                      <div class="col-xs-3" style="float: right; clear: both;">
                        <label style="text-align: left;">Total Harga</label>
                        <input type="text" class="form-control nominal col-xs-3" name="total_harga" id="total_harga" readonly="" value="0">
                      </div><br>
                      <div class="col-xs-3" style="float: right; clear: both;">
                        <label style="text-align: left;">Total Bayar</label>
                        <input type="text" class="form-control nominal" name="total_bayar" id="total_bayar" value="0">
                      </div>

                      <div class="col-xs-3" style="float: right; clear: both;">
                        <label style="text-align: left;">Total Kembali</label>
                        <input type="text" class="form-control nominal" name="total_kembali" id="total_kembali" readonly="" value="0">
                      </div>

                      <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg form-control" value="kirim">Submit</button>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </section>
        <div id="modal1" tabindex="-1" role="dialog" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Tambah Barang</h3>
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
              </div>
              <div class="modal-body">
                <div class="">
                  <div class="xs-mt-50">

                    <form class="" action="proses-hapus-barang.php" method="post">
                      <div class="form-group">
                        <label>Pilih Barang</label>
                        <select class="form-control m-b-10 selectpicker" data-live-search="true" name="barang[]" id="rg" >
                            <option>Pilih Barang...</option>
                          <?php include 'koneksi.php';
                          $dis = '';
                          $jsArray1 = "var barangArray = new Array();";
                          $sql = mysql_query("SELECT * FROM barang");
                          while ($r = mysql_fetch_array($sql)) {
                            $dis = '';
                            if($r['stock'] < 1){
                                $dis = "disabled";
                            }
                            $jsArray1 .= "barangArray['" . $r['kode_barang'] . "'] = {stock:'" . addslashes($r['stock']) . "', harga_jual:'" . addslashes($r['harga_jual']) . "'};";
                          ?>
                            <option value="<?php echo $r['kode_barang']; ?>" id="barang" <?php echo $dis;?>><?php echo $r['nama_barang']." "; ?> / <?php echo $r['merek']." "; ?> / <?php echo $r['tipe_barang']." "; ?> / <?php echo $r['kode']." "; ?> / <?php echo $r['keterangan']." / Stok : ".$r['stock']; ?> </option>
                          <?php }
                           ?>
                        </select>
                        <div class="form-group ">
                          <label for="">Qty</label>
                          <input type="text" id="qty" name="as" value="" class="form-control">
                        </div>
                      </div>
                      <input type="hidden" name="kd" value="">
                      <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                      <button type="button"  data-dismiss="modal" class="btn btn-space btn-primary" id="kirim" >Proceed</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer id="footer">
            Copyright © 2018 T-rexton Moto Modification Shop

            <ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </footer>

        <!-- Older IE Warning Message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid-override.min.js"></script>
        <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="js/functions.js"></script>


        <script type="text/javascript">
        $('.date-picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
            $("#data-table").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less',
                        iconSearch: 'zmdi-search'
                    },
                });
        </script>
        <script type="text/javascript">
        $("#kirim").click(function(){
            <?php echo $jsArray1; ?>
            rg = document.getElementById('rg');
            qty = document.getElementById('qty').value;
            rgval = rg.options[rg.selectedIndex].value;
            rgtext = rg.options[rg.selectedIndex].text;
            var harga = parseInt(qty) * parseInt(barangArray[rgval].harga_jual);
            $("<div class='col-xs-12'><div class='form-group col-xs-3'><label> Kode Barang</label><input type='text' name='kode[]' value='"+rgval+"' readonly class='form-control'></div><div class='form-group col-xs-3'><label> Nama Barang</label><input type='text' name='nama_barang[]' readonly value='"+rgtext+"' class='form-control'></div><div class='form-group col-xs-3'><label> Qty</label><input type='text' name='qtys[]' value='"+qty+"' class='form-control'></div><div class='form-group col-xs-3'><label> Harga Jual</label><input type='text' name='hargas[]' value='"+harga+"' readonly style='text-align:right;' class='form-control hargas'></div></div>").appendTo(barangs);

            var a = 0;
            $(".hargas").each(function() {
                a += parseInt(this.value);
            });
            
            $("#total_harga").val(a);

        });

        $("#total_bayar").keyup(function() {
            var totalBayar = this.value;
            var totalHarga = $("#total_harga").val();
            var totalKembali = parseInt(totalBayar) - parseInt(totalHarga);
            $("#total_kembali").val(totalKembali);
        });

        </script>
    <script type="text/javascript">
        <?php echo $jsArray1; ?>

        $(function() {
          $('.selectpicker').selectpicker();
        });

        $("#qty").keyup(function(){
            var qty = parseInt(this.value);
            var kode_barang = $("#rg").val();
            var stok = parseInt(barangArray[kode_barang].stock);
            console.log(barangArray);
            if (parseInt(qty) > parseInt(stok)) {
                alert("Jumlah beli tidak boleh > dari stok");
                $("#qty").val("");
                $("#qty").focus();
            }
        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    </body>
</html>
