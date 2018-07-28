<!DOCTYPE>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="SuperFlat Responsive Admin Template">
        <meta name="keywords" content="SuperFlat Admin, Admin, Template, Bootstrap">

        <title>T-rexton Moto</title>
    </head>

    <body onload="window.print();">

        <section id="content">
          <?php include 'koneksi.php';
          $kd = $_GET['kd'];
          $sql1 = mysql_query("SELECT * FROM servis inner join motor on servis.no_polisi = motor.no_polisi left outer join mekanik on servis.id_mekanik = mekanik.id_mekanik WHERE kode_servis = '$kd'");
          $sql2 = mysql_query("SELECT IF(jp.jenis_layanan = '', l.jenis_layanan, jp.jenis_layanan) nama_pekerjaan, jp.harga_layanan FROM detail_layanan_servis jp left outer join layanan l on jp.kode_layanan = l.kode_layanan WHERE kode_servis = '$kd'");
          $sql3 = mysql_query("SELECT * FROM detail_barang_servis INNER JOIN barang ON barang.kode_barang=detail_barang_servis.kode_barang WHERE kode_servis = '$kd'");
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
                    <div class="t-header" style="margin: 20px 0px;">
                        <?php if($row['total_bayar'] > 0){ ?>
                          <div class="th-title"><center><b>Kwitansi Pembayaran Servis & Suku Cadang</b></center></div>
                        <?php }else{ ?>
                          <div class="th-title"><center><b>Surat Perintah Kerja</b></center></div>
                      <?php } ?>
                    </div>
                    <div class="t-body tb-padding">
                      <div class="row">
                        <div class="col-sm-4 pull-right ">
                          <table class="table" style="width:100%;">
                            <tr>
                              <td style="border:none;width:34%;">Kode</td>
                              <td style="border:none;">: <?php echo $row['kode_servis']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Tanggal / Jam</td>
                              <td style="border:none;">: <?php echo $row['tanggal_servis']; ?> / <?php echo $row['jam_masuk'] ?></td>
                            </tr>
                            <?php if($row['total_bayar'] > 0){?>
                            <tr>
                              <td style="border:none;">Masa Garansi</td>
                              <td style="border:none;">: <?php echo date('Y-m-d', strtotime("+7days", strtotime($row['tanggal_servis']))); ?> (7 Hari)</td>
                            </tr>
                          <?php } ?>
                          </table>
                        </div>
                        <div class="col-sm-8"  style="border-top:1px solid black">
                          <table class="table" style="width:100%">
                            <tr>
                              <td style="border:none;">Nomor Urut</td>
                              <td style="border:none;">: <?php echo $row['no_urut']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;width:40%;">Nama Pemilik / Pembawa Kendaraan</td>
                              <td style="border:none;">: <?php echo $row['nama_konsumen']; ?></td>
                            </tr>
                            <tr >
                              <td style="border:none;">Telp/Hp</td>
                              <td style="border:none;">: <?php echo $row['no_telp_konsumen']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Alamat</td>
                              <td style="border:none;">: <?php echo $row['alamat_konsumen']; ?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-12" style="border-top:1px solid black">
                          <table class="table" style="width:100%">
                            <tr>
                              <td style="border:none;">No. Polisi</td>
                              <td style="border:none;">: <?php echo $row['no_polisi']; ?></td>
                            </tr>
                            <!-- <tr>
                              <td style="border:none;">KM</td>
                              <td style="border:none;">: <?php echo $row['km']; ?> KM</td>
                            </tr> -->
                            <tr>
                              <td style="border:none;">No Rangka / No Mesin</td>
                              <td style="border:none;">: <?php echo $row['no_rangka']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Tipe/Warna/Tahun</td>
                              <td style="border:none;">: <?php echo $row['tipe_motor']; ?>/<?php echo $row['warna'] ?>/<?php echo $row['tahun'] ?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-12" style="border-top:1px solid black">
                          <table class="table" style="width:100%;">
                              <tr>
                                <th style="text-align: left;">Jenis Pekerjaan</th>
                                <th style="text-align: left;">Keluhan Konsumen</th>
                                <th style="text-align: left;">Analisa SA</th>
                                <th style="text-align: left;">Suku Cadang</th>
                              </tr>
                            <tr>
                              <td valign="top" style="width: 300px;">
                                <ul>
                                  <?php while ($row2 = mysql_fetch_array($sql2)) {?>
                                    <li><label style="float: left; width: 150px; display: block;"><?php echo $row2['nama_pekerjaan'] ?></label><label style="float: left; width: 30px; display: block;">Rp.</label><label style="float: left; width: 70px; display: block; text-align: right;"><?php echo number_format($row2['harga_layanan']); ?></label></li>
                                  <?php } ?>

                                </ul>
                              </td>
                              <td valign="top"><?php echo $row['keluhan'] ?></td>
                              <td valign="top"><?php echo $row['analisa'] ?></td>
                              <td valign="top" style="width: 300px;">
                                <ul>
                                  <?php
                                    $total_harga_barang=0;
                                   while ($row3 = mysql_fetch_array($sql3)) {
                                        $total_harga_barang+=$row3['harga_jual'];
                                    ?>
                                    <li><label style="float: left; width: 150px; display: block;"><?php echo $row3['nama_barang'] ?></label><label style="float: left; width: 30px; display: block;">Rp.</label><label style="float: left; width: 70px; display: block; text-align: right;"><?php echo number_format($row3['harga_jual']); ?></label></li>
                                  <?php } ?>

                                </ul>
                              </td>
                            </tr>

                          </table>
                        </div>
                        <div class="col-sm-6" style="border-top:1px solid black">
                          <table class="table">
                            <tr>
                              <td style="border:none;">Harga Jasa</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($row['total_harga_layanan']); ?></td>
                            </tr>
                             <tr>
                              <td style="border:none;">Harga Suku cadang</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($total_harga_barang); ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Estimasi Biaya</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($row['total_harga_layanan']+$total_harga_barang )?></td>
                            </tr>
                           <!--  <tr>
                              <td style="border:none;">Kilo Meter</td>
                              <td>:</td>
                              <td style="border:none;"><?php echo number_format($row['km']); ?> Km</td>
                            </tr> -->
                            <tr>
                              <td style="border:none;">Estimasi Jam Selesai&nbsp;&nbsp;&nbsp;</td>
                              <td>:</td>
                              <td style="border:none;"><?php echo $row['jam_keluar']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Nama Mekanik</td>
                              <td>:</td>
                              <td style="border:none;"><?php echo $row['nama_mekanik']; ?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Catatan</td>
                              <td>:</td>
                              <td style="border:none;"><?php echo $row['catatan']; ?></td>
                            </tr>
                          </table>
                        </div>

                        <?php if($row['total_bayar'] > 0){ ?>
                        <div class="col-sm-6" style="border-top:1px solid black">
                          <table class="table">
                            <tr>
                              <td style="border:none;">Total Bayar</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($row['total_bayar'])?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Total Biaya</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($row['total_harga_layanan']+$total_harga_barang )?></td>
                            </tr>
                            <tr>
                              <td style="border:none;">Total Kembali</td>
                              <td>:</td>
                              <td style="border:none;">Rp. <?php echo number_format($row['total_bayar'] - ($row['total_harga_layanan']+$total_harga_barang))?></td>
                            </tr>
                          </table>
                        </div>
                      <?php } ?>
                      </div>



                  </div>
                </div>
                </div>
            </div>
        </section>
    </body>
</html>
