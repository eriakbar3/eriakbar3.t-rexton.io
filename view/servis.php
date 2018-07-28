<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<?php
date_default_timezone_set("Asia/Jakarta");
?>
<html>
    <?php include('head.php');?>

    <body>
        <?php include('header.php');?>

        <section id="content">
            <div class="container">
                <header class="page-header">
                </header>

                <div class="overview row"></div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>Data Servis</b>
                          <?php
                          if ($_SESSION['role'] == "2"){
                          ?>
                          <a href="buat-spk.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Buat SPK</a>
                          <?php
                          }
                          ?>
                        </div>
                    </div>

                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                          <tr>
                              <th>Kode Servis</th>
                              <th>No. Polisi</th>
                              <th>Nama Pemilik</th>
                              <th>Tanggal / Jam</th>
                              <th><?php echo ($_SESSION['role'] == "2") ? 'Estimasi Biaya' : 'Total Biaya' ;?></th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $no = 0;
                          $sql = mysql_query("SELECT * FROM servis inner join motor on servis.no_polisi = motor.no_polisi order by tanggal_servis desc, no_urut desc");
                          while ($r = mysql_fetch_array($sql)) {
                            $no++;
                            ?>
                            <tr>
                                <td><?php echo $r['kode_servis']; ?></td>
                                <td><?php echo $r['no_polisi']; ?></td>
                                <td><?php echo $r['nama_konsumen']; ?></td>
                                <td><?php echo $r['tanggal_servis']; ?> / <?php echo $r['jam_masuk'] ?></td>
                                <td>Rp. <?php echo number_format($r['estimasi_biaya']); ?></td>
                                <td><?php echo $r['status'] ?></td>
                                <td align="left"><a target="_blank" href="spk.php?kd=<?php echo $r['kode_servis'];  ?>" class="btn btn-primary"> <i class="zmdi zmdi-file-text zmdi-hc-fw"></i> </a>
                                   <?php if($r['status'] == 'Dikerjakan') { ?> <?php if ($_SESSION['role'] == "2") { ?> | <a href="edit-servis.php?kd=<?php echo $r['kode_servis'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> <?php } ?> <?php } ?>
                                  <!--<a href="#delete-<?php echo $r['kode_servis']; ?>" data-toggle="modal"  class="bt
                                    n btn-danger" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>-->
                                    <?php 
                                    if ($r['status'] == 'Selesai' && $r['total_bayar'] == 0 && $_SESSION['role'] == "1") { ?>
                                    <a href="#bayar-<?php echo $no; ?>" data-toggle="modal"  class="btn btn-warning" id="sa-warning">Bayar</a>
                                <?php } ?>
                                </td>
                            </tr>
                            <div id="bayar-<?php echo $no; ?>" tabindex="-1" role="dialog" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                                  </div>

                                    <form class="" action="proses-bayar-servis.php" method="post">
                                  <div class="modal-body">
                                    <div class="row">
                                          <div class="col-xs-12">
                                            <label style="text-align: left;">Total Harga</label>
                                            <input type="text" class="form-control nominal col-xs-3 total_harga<?php echo $no;?>" name="total_harga" id="" readonly="" value="<?php echo $r['estimasi_biaya']; ?>">
                                          </div><br>
                                          <div class="col-xs-12">
                                            <label style="text-align: left;">Total Bayar</label>
                                            <input type="text" class="form-control nominal total_bayar<?php echo $no;?>" onkeyup="hitung('<?php echo $no;?>')" name="total_bayar" id="" value="0">
                                          </div>

                                          <div class="col-xs-12">
                                            <label style="text-align: left;">Total Kembali</label>
                                            <input type="text" class="form-control nominal total_kembali<?php echo $no;?>" name="total_kembali" id="" readonly="" value="0">
                                          </div>
                                          <input type="hidden" name="kd" value="<?php echo $r['kode_servis']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">

                                          <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                          <button type="submit" name="bayar"  class="btn btn-space btn-primary">Proceed</button>
                                  </div>
                                  </form>
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

        <script type="text/javascript">
            function hitung(id){
                var totalBayar = $(".total_bayar"+id).val();
                var totalHarga = $(".total_harga"+id).val();
                var totalKembali = parseInt(totalBayar) - parseInt(totalHarga);
                $(".total_kembali"+id).val(totalKembali);
            }

        </script>

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
            $('#table').dataTable( {
              "ordering": false
            } );
            //Command Buttons

        });


        </script>
    </body>
</html>
