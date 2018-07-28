<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
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
                        <div class="th-title"><b>DATA PENJUALAN</b></div>
                        <a href="tambah-penjualan.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Tambah baru</a>
                    </div>

                    <table id="table" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th data-column-id="id">Kode Penjualan</th>
                                <th data-column-id="nama">Tanggal Jual</th>
                                <th data-column-id="merek">No Polisi</th>
                                <th data-column-id="merek">Total Harga</th>
                                <th data-column-id="tipe">Aksi</th>
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
                                <td><?php echo $r['no_polisi'] ?></td>
                                <td><?php echo number_format($sql_detail['total_harga']) ?></td>
                                <td><a target="_blank" href="nota-penjualan.php?kd=<?php echo $r['id_penjualan'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-file-text zmdi-hc-fw"></i> </a>
                                  <!-- | <a href="edit-penjualan.php?kd=<?php echo $r['id_penjualan'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> -->
                                  <!--| <a href="#delete-<?php echo $r['id_penjualan']; ?>" data-toggle="modal"  class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button>-->

                                  </td>

                            </tr>
                            <div id="delete-<?php echo $r['id_penjualan']; ?>" tabindex="-1" role="dialog" class="modal fade">
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

                                        <form class="" action="proses-hapus-penjualan.php" method="post">
                                          <input type="hidden" name="kd" value="<?php echo $r['id_penjualan']; ?>">
                                          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                          <button type="submit"  class="btn btn-space btn-primary">Proceed</button>
                                        </form>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
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
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->

        <script src="js/functions.js"></script>

        <script type="text/javascript">

        $(document).ready(function(){
            $('#table').dataTable( {
              "ordering": false
            } );

        });
        </script>
    </body>
</html>
