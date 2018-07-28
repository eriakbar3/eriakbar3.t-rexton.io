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
                            <div class="th-title"><b>DATA SUPLIER</b>
                              <a href="tambah-suplier.php" class="pull-right btn btn-primary"><i class="zmdi zmdi-plus"></i> Tambah Suplier</a>
                            </div>
                        </div>

                        <table id="table" class="table table-bordered table-vmiddle">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>No. Telp</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              include 'koneksi.php';
                              $sql = mysql_query("SELECT * FROM suplier order by id_suplier desc");
                              while ($r = mysql_fetch_array($sql)) { ?>
                                <tr>
                                    <td><?php echo $r['id_suplier']; ?></td>
                                    <td><?php echo $r['nama_toko']; ?></td>
                                    <td><?php echo $r['no_telp_suplier']; ?></td>
                                    <td><?php echo $r['alamat']; ?></td>
                                    <td> <a href="edit-suplier.php?kd=<?php echo $r['id_suplier']; ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> | <a href="proses-hapus-suplier.php?kd=<?php echo $r['id_suplier']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')" class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>
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
