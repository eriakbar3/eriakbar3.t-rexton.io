<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    
    <body>

        <section id="content">
            <div class="container">
                <header class="page-header">
                </header>

                <div class="overview row">



                </div>


                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title">
                          Detail Penjualan
                        </div>
                    </div>
                    <div class="col-sm-12">
                      <?php
                        include 'koneksi.php';
                        $kd = $_GET['kd'];
                        $sql1 = mysql_query("SELECT * FROM penjualan_brg WHERE id_penjualan = '$kd'");
                        $row = mysql_fetch_array($sql1);
                       ?>
                      <table class="col-xs-6" style="margin-bottom:30px;">
                        <tr>
                          <th style="width:15%">Merek </th>
                          <td>: <?php echo $row['merek'] ?></td>
                        </tr>
                        <tr>
                          <th style="width:15%">Type  </th>
                          <td>: <?php echo $row['type'] ?></td>
                        </tr>
                      </table>
                      <table class="col-xs-6">
                        <tr>
                          <th style="width:15%">Tanggal  </th>
                          <td>: <?php echo $row['tanggal'] ?></td>
                        </tr>
                        <tr>
                          <th style="width:15%">No Polisi  </th>
                          <td>: <?php echo $row['no_polisi'] ?></td>
                        </tr>
                      </table>
                    </div>
                    <div style="margin-bottom:30px">
                      <table  class="table table-bordered table-vmiddle" >
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Qty</th>
                                  <th>Harga Satuan</th>
                                  <th>Total</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = mysql_query("SELECT detail_penjualan_brg.quantity,detail_penjualan_brg.kd_barang,detail_penjualan_brg.total,detail_penjualan_brg.harga_satuan,barang.nama_barang FROM detail_penjualan_brg INNER JOIN barang ON detail_penjualan_brg.kd_barang = barang.kd_barang WHERE detail_penjualan_brg.id_penjualan = '$kd'");
                            $n = mysql_num_rows($sql);
                            $i = 1;
                            while ($r = mysql_fetch_array($sql)) { ?>
                              <tr>
                                <td><?php echo $i++ ?></td>
                                  <td><?php echo $r['kd_barang']; ?></td>
                                  <td><?php echo $r['nama_barang']; ?></td>
                                  <td><?php echo $r['quantity']; ?></td>
                                  <td><?php echo $r['harga_satuan']; ?></td>
                                  <td><?php echo $r['total'] ?></td>
                              </tr>
                              <div id="delete-<?php echo $r['kd_barang']; ?>" tabindex="-1" role="dialog" class="modal fade">
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
                                            <input type="hidden" name="kd" value="<?php echo $r['kd_barang']; ?>">
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
                             <tr>
                               <td colspan="5" class="text-center"> Jumlah</td>
                               <td><?php echo $row['jumlah'] ?></td>
                             </tr>
                          </tbody>
                      </table>
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
