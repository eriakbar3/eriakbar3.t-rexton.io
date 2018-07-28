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

                <div class="overview row"></div>


                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>Data Pembelian</b>
                          <a href="tambah-pembelian.php" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Buat Pembelian Barang</a>
                        </div>
                    </div>

                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                          <tr>
                              <th>Kode Pembelian</th>
                              <th>Tanggal</th>
                              <th>User Input</th>
                              <th>Keterangan</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $sql = mysql_query("SELECT pb.*, user.nama_user FROM pembelian pb left outer join user on pb.id_user = user.id_user order by pb.id_pembelian desc");
                          while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                                <td><?php echo $r['id_pembelian'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($r['tanggal_beli'])); ?></td>
                                <td><?php echo $r['nama_user'] ?></td>
                                <td><?php echo $r['keterangan'] ?></td>
                                <td><a target="_blank" href="nota-pembelian.php?kd=<?php echo $r['id_pembelian'];  ?>" class="btn btn-success"> <i class="zmdi zmdi-file-text zmdi-hc-fw"></i> </a>
                                   
                                  <!--<a href="#delete-<?php echo $r['id_pembelian']; ?>" data-toggle="modal"  class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>-->
                            </tr>
                            <div id="delete-<?php echo $r['id_pembelian']; ?>" tabindex="-1" role="dialog" class="modal fade">
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

                                        <form class="" action="proses-hapus-pembelian.php" method="post">
                                          <input type="hidden" name="kd" value="<?php echo $r['id_pembelian']; ?>">
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
        <?php include ('scripts.php');?>
    </body>
</html>
