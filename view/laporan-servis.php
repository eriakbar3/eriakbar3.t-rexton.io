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
                        <div class="th-title"><b>Laporan Servis</b>
                          <form class="col-sm-6 pull-right" action="print-servis.php" target="_blank" method="get">
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



                    </div>

                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                          <tr>
                              <th>Kode Servis</th>
                              <th>Nama Pemilik</th>
                              <th>Tanggal / Jam</th>
                              <th>No. Telp</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $sql = mysql_query("SELECT * FROM servis inner join motor on servis.no_polisi = motor.no_polisi");
                          while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                                <td><?php echo $r['kode_servis']; ?></td>
                                <td><?php echo $r['nama_konsumen']; ?></td>
                                <td><?php echo $r['tanggal_servis']; ?> / <?php echo $r['jam_masuk'] ?></td>
                                <td><?php echo $r['no_telp_konsumen']; ?></td>

                            </tr>

                          <?php }
                           ?>


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
             $('#table').DataTable();
            //Command Buttons

        });
        $('.date-picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        </script>
    </body>
</html>
