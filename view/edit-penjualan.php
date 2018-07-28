<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="SuperFlat Responsive Admin Template">
        <meta name="keywords" content="SuperFlat Admin, Admin, Template, Bootstrap">

        <title>T-rexton Moto Modification Shop</title>

        <link href="../vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.override.min.css" rel="stylesheet">
          <link href="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <link href="css/app.min.css" rel="stylesheet">
    </head>

    <body>
        <header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
            <ul class="header-inner">

                <!-- Logo -->
                <li class="logo">
                    <a href=""><img src="img/logo.png" alt=""></a>
                    <div id="menu-trigger"><i class="zmdi zmdi-menu"></i></div>
                </li>

                <!-- Notifications -->


                <!-- Settings -->
                <li class="pull-right dropdown hidden-xs">
                    <a href="" data-toggle="dropdown">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="fullscreen" href="">Toggle Fullscreen</a></li>
                        <li><a data-toggle="localStorage" href="">Clear Local Storage</a></li>
                        <li><a href="">Account Settings</a></li>
                        <li><a href="">Other Settings</a></li>
                    </ul>
                </li>


                <!-- Time -->

            </ul>
        </header>

        <aside id="sidebar">

            <!--| MAIN MENU |-->
            <ul class="side-menu">
                <li class="sm-sub sms-profile">
                    <a class="clearfix" href="">
                        <img src="img/profile-pic.jpg" alt="">

                        <span class="f-11">
                            <span class="d-block">Mallinda Hollaway</span>
                            <small class="text-lowercase">@mallinda-h</small>
                        </span>
                    </a>

                    <ul>
                        <li><a href="">View Profile</a></li>
                        <li><a href="">Privacy Settings</a></li>
                        <li><a href="">Settings</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index.php">
                        <i class="zmdi zmdi-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                 <li class="active">
                    <a href="data-barang.php">
                        <i class="zmdi zmdi-collection-item"></i>
                        <span>Data Barang</span>
                    </a>
                </li>

                <li>

                    <li class="sm-sub sms-bottom">
                    <a href="">
                        <i class="zmdi zmdi-spellcheck"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul>
                        <li><a href="servis.php">Servis</a></li>
                        <li><a href="pembelian.php">Pembelian</a></li>
                    </ul>
                </li>
                </li>

                <li class="sm-sub sms-bottom">
                    <a href="">
                        <i class="zmdi zmdi-receipt"></i>
                        <span>Laporan</span>
                    </a>
                    <ul>
                        <li><a href="laporan-servis.php">Laporan Servis</a></li>
                        <li><a href="laporan-pembelian.php">Laporan Pembelian</a></li>
                        <li><a href="laporan-stok-barang.php">Laporan Stok Barang</a></li>
                    </ul>
                </li>

            </ul>
        </aside>


        <section id="content">
          <?php include 'koneksi.php';
          $id = $_GET['kd'];
            $sql = mysql_query("SELECT * FROM penjualan_brg WHERE id_penjualan='$id'");
            $row = mysql_fetch_array($sql);
           ?>
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

                    <form class="" action="proses-edit-penjualan.php?kd=<?php echo $id ?>" method="post">
                      <div class="form-group col-xs-6">
                        <label for="">Merek</label>
                        <input type="text" name="merek" value="<?php echo $row['merek']; ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Type</label>
                        <input type="text" name="type" value="<?php echo $row['type']; ?>" class="form-control">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <div class="dtp-container">
                                <input name="tanggal" type='text' class="form-control date-picker" placeholder="Click here..." value="<?php echo $row['tanggal'] ?>">
                            </div>
                        </div>
                      </div>

                      <div class="form-group col-xs-6">
                        <label for="">No Polisi</label>
                        <input type="text" name="no_polisi" value="<?php echo $row['no_polisi'] ?>" class="form-control" >
                      </div>
                      <div class="col-xs-12" style="margin-top:10px;margin-bottom:10px;">
                        <div class="col-sm-6" style="margin-left:25%">
                          <a href="#modal1" data-toggle="modal" class="btn btn-danger  btn-lg form-control " value="kirim">Tambah Barang</a>
                        </div>

                      </div>
                      <div class="" id="barangs" >
                        <?php

                          $sql = mysql_query("SELECT * FROM detail_penjualan_brg INNER JOIN barang ON detail_penjualan_brg.kd_barang = barang.kd_barang WHERE id_penjualan ='$id'");
                          while ($r = mysql_fetch_array($sql)) {
                            ?>
                        <div class="col-xs-12">
                          <div class="form-group col-xs-4">
                            <label>Kode Barang</label>
                            <input type="text" name="kode[]" class="form-control" value="<?php echo $r['kd_barang']; ?>">
                          </div>
                          <div class="form-group col-xs-4">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang[]" class="form-control" value="<?php echo $r['nama_barang'] ?>">
                          </div>
                          <div class="form-group col-xs-4">
                            <label>Qty</label>
                            <input type="text" name="qtys[]" class="form-control"  value="<?php echo $r['quantity'] ?>">
                          </div>
                        </div>
                      <?php }
                     ?>
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
                        <select class="form-control m-b-10" name="barang[]" id="rg">
                          <?php
                          $sql = mysql_query("SELECT * FROM barang");
                          while ($r = mysql_fetch_array($sql)) {?>
                            <option value="<?php echo $r['kd_barang']; ?>"><?php echo $r['nama_barang']." "; ?></option>
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
          rg = document.getElementById('rg');
          qty = document.getElementById('qty').value;
          rgval = rg.options[rg.selectedIndex].value;
          rgtext = rg.options[rg.selectedIndex].text;
            $("<div class='col-xs-12'><div class='form-group col-xs-4'><label> Kode Barang</label><input type='text' name='kode[]' value='"+rgval+"' class='form-control'></div><div class='form-group col-xs-4'><label> Nama Barang</label><input type='text' name='nama_barang[]' value='"+rgtext+"' class='form-control'></div><div class='form-group col-xs-4'><label> Qty</label><input type='text' name='qtys[]' value='"+qty+"' class='form-control'></div></div>").appendTo(barangs);

        });
        </script>
    </body>
</html>
