../<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <?php include('head.php');?>

    <body>
        <?php include('header.php');?>

        <section id="content">
          <?php include 'koneksi.php';
          $kd = $_GET['kd'];
          $sql1 = mysql_query("SELECT * FROM pembelian_brg WHERE id_pembelian = '$kd'");
          $row = mysql_fetch_array($sql1);
           ?>
            <div class="container">
                <header class="page-header">
                </header>

                <div class="overview row">
                </div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>DATA BARANG</b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <table class="table" style="width:30%">
                        <tr >
                          <td style="border:none;">Tanggal</td>
                          <td style="border:none;">: <?php echo $row['tanggal_pembelian']; ?></td>
                        </tr>
                      </table>
                      <table id="table" class="table table-bordered table-vmiddle">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>ID Suplier</th>
                                <th>Stok</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = mysql_query("SELECT * FROM detail_pembelian_brg INNER JOIN barang ON detail_pembelian_brg.kd_barang = barang.kd_barang WHERE id_pembelian='$kd'");
                            $i=1;
                            while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $r['kd_barang']; ?></td>
                              <td><?php echo $r['nama_barang']; ?></td>
                              <td><?php echo $r['kode_suplier'] ?></td>
                              <td><?php echo $r['stock']; ?></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      

                  </div>
                </div>
                </div>
            </div>
        </section>

        <?php include ('scripts.php');?>
    </body>
</html>
