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
                            <div class="th-title"><b>Edit Petugas</b></div>
                        </div>
                        <div class="t-body tb-padding">
                        <?php
                          include 'koneksi.php';
                          $kd = $_GET['id_user'];
                          $sql = mysql_query("SELECT * FROM user WHERE id_user = '$kd'");
                          $r = mysql_fetch_array($sql);
                        ?>
                            <form class="" action="proses-edit-petugas.php" method="post">
                                <input type="hidden" name="id_user" value="<?php echo $kd;?>">
                                <div class="form-group col-xs-12">
                                  <label for="">Nama</label>
                                  <input type="text" name="nama_user" value="<?php echo $r['nama_user'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-12">
                                  <label for="">Jabatan</label>
                                  <select class="form-control" name="role">
                                            
                                            <option value="1"
                                                <?php 
                                                if($r['role']==1) {
                                                    echo "selected";
                                                } 
                                                ?>
                                                >Kasir</option>
                                            <option value="2"
                                                <?php 
                                                if($r['role']==2) {
                                                    echo "selected";
                                                } 
                                                ?>
                                            >Servis Advisor</option>
                                  </select>
                                </div>
                                <div class="form-group col-xs-12">
                                  <label for="">Username</label>
                                  <input type="text" name="username" value="<?php echo $r['username'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-12">
                                  <label for="">Password</label>
                                  <input type="text" name="password" value="<?php echo $r['password'];?>" class="form-control">
                                </div>
                                <button type="submit" name="kirim" class="btn btn-primary m-t-10 btn-lg form-control" value="kirim">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('scripts.php');?>
    </body>
</html>
