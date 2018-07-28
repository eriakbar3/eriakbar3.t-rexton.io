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
    padding-right: 5px;
  }
</style>
    <body onload="window.print()">
    
        <section id="content">
          <?php include 'koneksi.php';
          $kd = $_GET['kd'];
          $sql1 = mysql_query("SELECT * FROM penjualan left outer join motor on penjualan.no_polisi = motor.no_polisi WHERE id_penjualan = '$kd'");
          $row = mysql_fetch_array($sql1);
           ?>
            <div class="container">
                <header class="page-header">
                  <div class="text-center" style="border-bottom: 4px black double; margin-bottom:30px;">
                  <center><img src="img/logo.png" alt=""></center>
                  <h4><center>Jl.Bojongkoneng No.16 Kab. Bandung Barat provinsi Jawa Barat, 40552 | 0817106321</center></h4>
                </div>
                </header>

                <div class="overview row">
                </div>

                <div class="row">
                <div class="tile">
                    <div class="t-header">
                        <div class="th-title"><b><center>NOTA PENJUALAN BARANG</center></b></div>
                    </div>
                    <div class="t-body tb-padding">
                      <table class="table" style="width:30%">
                        <tr>
                          <td style="border:none;">Kode</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['id_penjualan']; ?></td>
                        </tr>
                        <tr>
                          <td style="border:none;">Tanggal</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['tanggal_jual']; ?></td>
                        </tr>
                         <tr>
                          <td style="border:none;">Masa Garansi </td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo date('Y-m-d', strtotime("+7days", strtotime($row['tanggal_jual']))); ?></td>
                        </tr>
                        <tr>
                          <td style="border:none;">Nama Konsumen</td>
                          <td style="border:none;">:</td>
                          <td style="border:none;"><?php echo $row['nama_konsumen']; ?></td>
                        </tr>
                      </table>
                      <table id="table" class="table table-bordered table-vmiddle" style="border-collapse: collapse; border: 1px solid; width: 100%;">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th style="text-align: right;">Harga Satuan</th>
                                <th style="text-align: right;">Qty</th>
                                <th style="text-align: right;">Total Harga</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = mysql_query("SELECT detail_penjualan.*, barang.nama_barang, barang.kode_barang FROM detail_penjualan INNER JOIN barang ON detail_penjualan.kode_barang = barang.kode_barang WHERE id_penjualan = '$kd'");
                            $i=1;
                            $total_harga = 0;
                            while ($r = mysql_fetch_array($sql)) {
                              $total_harga += $r['total'];
                            ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $r['kode_barang']; ?></td>
                              <td><?php echo $r['nama_barang']; ?></td>
                              <td style="text-align: right;"><?php echo number_format($r['harga_satuan']); ?></td>
                              <td style="text-align: right;"><?php echo number_format($r['qty']); ?></td>
                              <td style="text-align: right;"><?php echo number_format($r['total']); ?></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                          <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Total Harga&nbsp;</td>
                                    <td style="text-align: right;"><?php echo number_format($total_harga); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Total Bayar&nbsp;</td>
                                    <td style="text-align: right;"><?php echo number_format($row['total_bayar']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align: right;">Total Kembali&nbsp;</td>
                                    <td style="text-align: right;"><?php echo number_format($row['total_kembali']); ?></td>
                                </tr>
                          </tfoot>
                        </table>   
                      

                  </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>