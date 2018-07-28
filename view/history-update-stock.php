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
                            <div class="th-title"><b>HISTORY UPDATE STOCK</b>
                              
                            </div>
                        </div>

                        <table id="table" class="table table-bordered table-vmiddle">
                            <thead>
                                <tr>
                                    <th>Id Update</th>
                                    <th>Kode Barang</th>
                                    <th>Barang</th>
                                    <th>Jumlah Stok Update</th>
                                    <th>Tanggal Update</th>
                                    <th>Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              include 'koneksi.php';
                              $sql = mysql_query("SELECT * FROM update_stok_barang a INNER JOIN barang b ON a.kode_barang=b.kode_barang INNER JOIN user c ON a.id_user=c.id_user");
                              while ($r = mysql_fetch_array($sql)) { ?>
                                <tr>
                                    <td><?php echo $r['id_update']; ?></td>
                                    <td><?php echo $r['kode_barang']; ?></td>
                                    <td><?php echo $r['nama_barang']." / ".$r['merek']." / ".$r['tipe_barang']; ?></td>
                                    <td><?php echo $r['jumlah_stok_update']; ?></td>
                                    <td> <?php echo date('d / m / Y', strtotime($r['tanggal_update'])); ?> </td>
                                    <td> <?php echo $r['nama_user']; ?> </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <?php include('scripts.php');?>
    </body>
</html>
