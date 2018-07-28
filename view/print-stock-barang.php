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
        <link href="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.override.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

        <link href="css/app.min.css" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
    </head>

    <body>



        <section id="">
          <?php include 'koneksi.php';?>
            <div class="container" >
              <div class="">
                <div class="text-center" style="border-bottom: 4px black double; margin-bottom:30px;">
                  <img src="img/logo.png" alt="" width="500px;">
                  <h4>Jl.Bojongkoneng No.16 Kab. Bandung Barat provinsi Jawa Barat, 40552 | 0817106321</h4>
                </div>
                  <div class="text-center" style="margin-bottom:50px;">
                    <h3>Laporan Stok Barang</h3>
                  </div>
                      <table class="col-xs-4" style="float:right;margin-right:20px;margin-bottom:30px; width:200px">
                        <tr>
                          <th >Tanggal  </th>
                          <td>: <?php echo date("d-m-Y") ?></td>
                        </tr>
                      </table>
                      <table id="table" class="table table-bordered table-vmiddle">
                          <thead>
                              <tr>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Stok</th>
                                  <th>Merek</th>
                                  <th>Tipe</th>
                                  <th style="text-align: right;">Harga Barang</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include 'koneksi.php';
                            $segment = explode('/',$_SERVER['REQUEST_URI']);
                            $menu = explode('-',$segment[3]);
                            session_start();
                            $nama_user = $_SESSION['nama_user'];
                            $sql = mysql_query("SELECT * FROM barang");
                            while ($r = mysql_fetch_array($sql)) { ?>
                              <tr>
                                <td><?php echo $r['kode_barang']; ?></td>
                                <td><?php echo $r['nama_barang']; ?></td>
                                <td><?php echo $r['stock']; ?></td>
                                <td><?php echo $r['merek']; ?></td>
                                <td><?php echo $r['tipe_barang'] ?></td>
                                <td style="text-align: right;">Rp. <?php echo number_format($r['harga_jual']); ?></td>


                              </tr>

                            <?php }
                             ?>


                          </tbody>
                      </table>
                        <div class="pull-right" style="margin:40px 80px 10px 10px">
                          <h4 style="margin-bottom:50px;">Yang Bertanggung Jawab</h4>
                          <h4 align="center"> <?php echo $nama_user; ?></h4>
                        </div>



                    </div>
                  </div>
                </div>
                </div>
            </div>
        </section>


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
                window.print();
        </script>
    </body>
</html>
