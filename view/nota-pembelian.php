<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
<style type="text/css">
  table {
    margin-top: 20px;
  }

  th, td {
    border: 1px solid;
  }

  th, td {
    text-align: left;
    padding-left: 5px;
  }
</style>
    <body onload="window.print()">
        <section id="content">
          <?php include 'koneksi.php';
          $kd = $_GET['kd'];
          $sql1 = mysql_query("SELECT pb.* FROM pembelian pb WHERE id_pembelian = '$kd'");
          $row = mysql_fetch_array($sql1);
           ?>
            <div class="container">
                <header class="page-header">
                  <div class="text-center" style="border-bottom: 4px black double; margin-bottom:30px;">
                  <center><img src="img/logo.png" alt=""></center>
                  <h4><center>Jl.Bojongkoneng No.16 Kab. Bandung Barat provinsi Jawa Barat, 40552 | 0817106321</center></h4>
                </header>

                <div class="overview row">
                </div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b>NOTA PEMBELIAN BARANG</b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <table class="table" style="width:30%">
                        <tr >
                          <td style="border:none;">Kode</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['id_pembelian']; ?></td>
                        </tr>
                        <tr >
                          <td style="border:none;">Tanggal</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['tanggal_beli']; ?></td>
                        </tr>
                        <tr >
                          <td style="border:none;">Keterangan</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['keterangan']; ?></td>
                        </tr>
                      </table>
                      <table id="table" class="table table-bordered table-vmiddle" style="border-collapse: collapse; border: 1px solid; width: 100%;">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Qty Beli</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = mysql_query("SELECT * FROM detail_pembelian INNER JOIN barang ON detail_pembelian.kode_barang = barang.kode_barang WHERE id_pembelian='$kd'");
                            $i=1;
                            while ($r = mysql_fetch_array($sql)) { ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $r['kode_barang']; ?></td>
                              <td><?php echo $r['nama_barang']; ?></td>
                              <td><?php echo $r['merek']; ?></td>
                              <td><?php echo $r['tipe_barang']; ?></td>
                              <td><?php echo $r['keterangan']; ?></td>
                              <td><?php echo $r['qty']; ?></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>

                        <div class="pull-right" style="margin:40px 80px 10px 800px">
                          <h4 style="margin-bottom:10px;" align="center">Mengetahui</h4>
                          <h4 style="margin-bottom:70px;" align="center">Pimpinan</h4>
                          <h4 align="center">Trisna Ariwibowo</h4>
                        </div>

                  </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>
