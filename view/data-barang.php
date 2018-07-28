<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
   <?php
   include('head.php');
   include 'koneksi.php';
   ?>

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
                        <div class="th-title"><b>DATA BARANG</b>
                          <!--<a href="tambah-barang.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Tambah Barang</a>-->
                        </div>
                    </div>

                    <div class="col-xs-12" style="margin-top:10px;margin-bottom:10px;">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success col-sm-12" data-toggle="modal" data-target="#exampleModal">
                                <span style="font-size:12pt;">Lihat Barang Terfavorit</span>
                            </button>
                        </div>
                      </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">#10 Barang Terfavofit</h5>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $sql_2 = mysql_query("
                                            select dp.kode_barang, nama_barang, merek, tipe_barang, sum(dp.qty) penjualan 
                                            from detail_penjualan dp inner join barang b on dp.kode_barang = b.kode_barang
                                            group by dp.kode_barang
                                            order by penjualan DESC
                                            limit 10
                                        ");
                                while ($rc = mysql_fetch_array($sql_2)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $rc['kode_barang'];?></td>
                                    <td><?php echo $rc['nama_barang'];?></td>
                                    <td><?php echo $rc['merek'];?></td>
                                    <td><?php echo $rc['tipe_barang'];?></td>
                                    <td><?php echo $rc['penjualan'];?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <a href="history-update-stock.php" class="pull-left btn btn-primary"> <i class="fa fa-plus-o"></i>History Update Stok</a>
                        
                    </div>
                    <div class="col-sm-6">
                        <a href="tambah-barang.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Tambah Barang</a>
                    </div>


                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Profit</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = mysql_query("SELECT * FROM barang order by kode_barang desc");
                          while ($r = mysql_fetch_array($sql)) { 
                                if ($r['stock']<=0) {
                                    $stock = "Tidak Ada Stok";
                                } else {
                                    $stock = $r['stock'];
                                }
                            ?>
                            <tr>
                                <td><?php echo $r['kode_barang']; ?></td>
                                <td><?php echo $r['nama_barang']; ?></td>
                                <td><?php echo $r['merek']; ?></td>
                                <td><?php echo $r['tipe_barang'] ?></td>
                                <td><?php echo $r['keterangan'] ?></td>
                                <td><?php echo $stock; ?></td>
                                <td>Rp. <?php echo number_format($r['harga_beli']); ?></td>
                                <td>Rp. <?php echo number_format($r['harga_jual']); ?></td>
                                <td>Rp. <?php echo number_format($r['profit']); ?></td>
                                <td> <a href="edit-barang.php?kd=<?php echo $r['kode_barang'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a></td>
                            </tr>
                            <div id="delete-<?php echo $r['kode_barang']; ?>" tabindex="-1" role="dialog" class="modal fade">
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
                                          <input type="hidden" name="kd" value="<?php echo $r['kode_barang']; ?>">
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
           $('#table').dataTable({
              "ordering": false
            });

        });
        </script>
        
    </body>
</html>
