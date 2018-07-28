<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<?php
include 'koneksi.php';
?>
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
                        <div class="th-title"><b>Data Update Stok Barang</b></div>
                    </div>
                    <div class="t-body tb-padding">

                    <form class="" action="proses-tambah-pembelian.php" method="post">

                      <table id="table" class="table table-bordered table-vmiddle col-xs-12">
                          <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Stok Update</th>
                                <th>Tanggal Update</th>
                                <th>Yang Bertanggung Jawab</th>
                                <!--<th style="width: 30%;">Keterangan</th>-->
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = mysql_query("SELECT * FROM update_stok inner join barang on update_stok.kode_barang=barang.kode_barang inner join user on update_stok.id_user=user.id_user");
                            while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                              <td><?php echo $r['kode_barang']; ?></td>
                              <td><?php echo $r['nama_barang']; ?></td>
                              <td><?php echo $r['jumlah_stok_update']; ?></td>
                              <td><?php echo $r['tanggal_update']; ?></td>
                              <td><?php echo $r['username']; ?></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg form-control" value="kirim">Submit</button>
                    </form>
                  </div>
                </div>
                </div>
            </div>
        </section>

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
    </body>
</html>
