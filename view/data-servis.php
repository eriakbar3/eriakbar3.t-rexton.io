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
          width: 40px;
          height: 40px;
        <link href="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid.override.min.css" rel="stylesheet">
        <link href="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <link href="../vendors/datatables/baru/datatables.min.css" rel="stylesheet">
        <link href="css/app.min.css" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style-eri.css">
        <style media="screen">
        .btn-icon {
          border-radius: 50%;
          padding: 10;
          text-align: center;
        }
        </style>
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
            <div class="container">
                <header class="page-header">
                </header>

                <div class="overview row">



                </div>


                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>DATA BARANG</b>
                          <a href="tambah-barang.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Tambah Barang</a>
                        </div>



                    </div>

                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                          <tr>
                              <th>Kode Servis</th>
                              <th>Nama Pemilik</th>
                              <th>Tanggal / Jam</th>
                              <th>No. Telp</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $sql = mysql_query("SELECT * FROM servis");
                          while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                                <td><?php echo $r['kode_servis']; ?></td>
                                <td><?php echo $r['pemilik_kendaraan']; ?></td>
                                <td><?php echo $r['tanggal_jam']; ?></td>
                                <td><?php echo $r['no_telp']; ?></td>
                                <td><a href="detail-penjualan.php?kd=<?php echo $r['kode_servis'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-file-text zmdi-hc-fw"></i> </a>
                                   |<a href="edit-barang.php?kd=<?php echo $r['kode_servis'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> |
                                  <a href="#delete-<?php echo $r['kode_servis']; ?>" data-toggle="modal"  class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>
                            </tr>
                            <div id="delete-<?php echo $r['kode_servis']; ?>" tabindex="-1" role="dialog" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="text-center">
                                      <div class="text-warning" style="color:#FFB752"><span class="modal-main-icon zmdi zmdi-alert-triangle zmdi-hc-fwe" style="font-size: 80px;"></span></div>
                                      <h3>Warning!</h3>
                                      <p>Yakin Data Akan Di Hapus?</p>
                                      <div class="xs-mt-50">

                                        <form class="" action="proses-hapus-barang.php" method="post">
                                          <input type="hidden" name="kd" value="<?php echo $r['kode_servis']; ?>">
                                          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                          <button type="submit"  class="btn btn-space btn-primary">Proceed</button>
                                        </form>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
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
        </script>
    </body>
</html>
