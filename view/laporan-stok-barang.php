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
                        <div class="th-title"><b>Laporan Stok Barang</b>
                          <a href="print-stock-barang.php" target="_blank" class="pull-right btn btn-primary"> <i class="fa fa-plus-o"></i> Print</a>
                        </div>



                    </div>

                    <table id="table" class="table table-bordered table-vmiddle">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Harga Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          include 'koneksi.php';
                          $sql = mysql_query("SELECT * FROM barang");
                          while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                                <td><?php echo $r['kode_barang']; ?></td>
                                <td><?php echo $r['nama_barang']; ?></td>
                                <td><?php echo $r['stock']; ?></td>
                                <td><?php echo $r['merek']; ?></td>
                                <td><?php echo $r['tipe_barang'] ?></td>
                                <td>Rp. <?php echo number_format($r['harga_jual']); ?></td>

                            </tr>

                          <?php }
                           ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </section>
        <?php include 'scripts.php';?>
    </body>
</html>
