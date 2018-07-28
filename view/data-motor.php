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
                            <div class="th-title"><b>DATA MOTOR</b>
                              <a href="tambah-motor.php" class="pull-right btn btn-primary"><i class="zmdi zmdi-plus"></i> Tambah Motor</a>
                            </div>
                        </div>

                        <table id="table" class="table table-bordered table-vmiddle">
                            <thead>
                                <tr>
                                    <th>No. Polisi</th>
                                    <th>Nama Konsumen</th>
                                    <th>Alamat Konsumen</th>
                                    <th>No. Telp Konsumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              include 'koneksi.php';
                              $sql = mysql_query("SELECT * FROM motor order by `datetime` desc");
                              while ($r = mysql_fetch_array($sql)) { ?>
                                <tr>
                                    <td><?php echo $r['no_polisi']; ?></td>
                                    <td><?php echo $r['nama_konsumen']; ?></td>
                                    <td><?php echo $r['alamat_konsumen']; ?></td>
                                    <td><?php echo $r['no_telp_konsumen']; ?></td>
                                    <td> <a href="edit-motor.php?kd=<?php echo $r['no_polisi']; ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> | <a href="proses-hapus-motor.php?kd=<?php echo $r['no_polisi']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')" class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>
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
