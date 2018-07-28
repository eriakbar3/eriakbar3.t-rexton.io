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
                            <div class="th-title"><b>DATA LAYANAN</b>
                              <a href="tambah-layanan.php" class="pull-right btn btn-primary"><i class="zmdi zmdi-plus"></i> Tambah Layanan</a>
                            </div>
                        </div>

                        <table id="table" class="table table-bordered table-vmiddle">
                            <thead>
                                <tr>
                                    <th>Kode Layanan</th>
                                    <th>Jenis Layanan</th>
                                    <th>Harga Layanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              include 'koneksi.php';
                              $sql = mysql_query("SELECT * FROM layanan order by kode_layanan desc");
                              while ($r = mysql_fetch_array($sql)) { ?>
                                <tr>
                                    <td><?php echo $r['kode_layanan']; ?></td>
                                    <td><?php echo $r['jenis_layanan']; ?></td>
                                    <td><?php echo 'Rp. '.number_format($r['harga_layanan']); ?></td>
                                    <td> <a href="edit-layanan.php?kd=<?php echo $r['kode_layanan']; ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> | <a href="proses-hapus-layanan.php?kd=<?php echo $r['kode_layanan']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')" class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>
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
