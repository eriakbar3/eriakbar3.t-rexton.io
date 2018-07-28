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
                            <div class="th-title"><b>Edit Mekanik</b></div>
                        </div>
                        <div class="t-body tb-padding">
                        <?php
                          include 'koneksi.php';
                          $kd = $_GET['kd'];
                          $sql = mysql_query("SELECT * FROM mekanik WHERE id_mekanik = '$kd'");
                          $r = mysql_fetch_array($sql);
                        ?>
                            <form class="" action="proses-edit-mekanik.php" method="post">
                                <input type="hidden" name="kode_mekanik" value="<?php echo $kd;?>">
                                <div class="form-group col-xs-6">
                                  <label for="">Nama</label>
                                  <input type="text" name="nama_mekanik" value="<?php echo $r['nama_mekanik'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">No. Telp Mekanik</label>
                                  <input type="text" name="no_telp_mekanik" value="<?php echo $r['no_telp_mekanik'];?>" class="form-control">
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
