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
                            <div class="th-title"><b>DATA PETUGAS</b>
                              <a href="tambah-petugas.php" class="pull-right btn btn-primary"><i class="zmdi zmdi-plus"></i> Tambah Petugas</a>
                            </div>
                        </div>

                        <table id="table" class="table table-bordered table-vmiddle">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              include 'koneksi.php';
                              $sql = mysql_query("SELECT * FROM user order by id_user desc");
                              while ($r = mysql_fetch_array($sql)) { 
                                    if($r['role']=="1") {
                                        $jabatan = "Kasir";
                                    } else {
                                        $jabatan = "Servis Advisor";
                                    }
                                ?>
                                <tr>
                                    <td><?php echo $r['nama_user']; ?></td>
                                    <td><?php echo $jabatan; ?></td>
                                    <td><?php echo $r['username']; ?></td>
                                    <td><?php echo $r['password']; ?></td>
                                    <td> <a href="edit-petugas.php?id_user=<?php echo $r['id_user']; ?>" class="btn btn-success"> <i class="zmdi zmdi-edit zmdi-hc-fw"></i> </a> | 
                                    <a href="proses-hapus-petugas.php?id_user=<?php echo $r['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')" class="btn btn-primary" id="sa-warning"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button> </td>
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
