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
                        <div class="th-title"><b>DATA PENJUALAN</b></div>
                        <form class="col-sm-6 pull-right" action="print-penjualan.php" target="_blank" method="get">
                          <div class="col-xs-5 input-group " style="float:left">
                              <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                  <div class="dtp-container">
                                  <input name="awal" type='text' class="form-control date-picker" placeholder="Tanggal Awal">
                              </div>
                          </div>

                          <div class="col-xs-5 input-group " style="float:left">
                              <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                  <div class="dtp-container">
                                  <input name="akhir" type='text' class="form-control date-picker" placeholder="Tanggal Akhir">
                              </div>
                          </div>
                          <button type="submit" name="button" class="pull-right btn btn-primary ">  Print</button>
                        </form>
                    </div>

                    <table id="table" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th data-column-id="id">Kode Penjualan</th>
                                <th data-column-id="nama">Tanggal Jual</th>
                                <!-- <th data-column-id="merek">No Polisi</th> -->
                                <th data-column-id="merek">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $sql = mysql_query("SELECT * FROM penjualan order by tanggal_jual desc, id_penjualan desc");
                          while ($r = mysql_fetch_array($sql)) {
                                $sql_detail = mysql_fetch_array(mysql_query("SELECT sum(total) total_harga FROM detail_penjualan where id_penjualan = '".$r['id_penjualan']."' "));
                        ?>
                            <tr>
                                <td><?php echo $r['id_penjualan'] ?></td>
                                <td><?php echo $r['tanggal_jual'] ?></td>
                                <!-- <td><?php echo $r['no_polisi'] ?></td> -->
                                <td><?php echo number_format($sql_detail['total_harga']) ?></td>
                            </tr>

                          <?php } ?>
                        </tbody>
                    </table>
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
        <script type="text/javascript" src="../vendors/datatables/baru/datatables.min.js"></script>
        <script src="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid-override.min.js"></script>
        <script src="../vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="../vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="js/functions.js"></script>

        <script type="text/javascript">

        $(document).ready(function(){
            //Basic Example
            $('#table').dataTable( {
              "ordering": false
            } );
            //Command Buttons

        });
        $('.date-picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        </script>
    </body>
</html>
