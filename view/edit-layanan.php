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
                            <div class="th-title"><b>DATA LAYANAN</b></div>
                        </div>
                        <div class="t-body tb-padding">
                        <?php
                          include 'koneksi.php';
                          $kd = $_GET['kd'];
                          $sql = mysql_query("SELECT * FROM layanan WHERE kode_layanan = '$kd'");
                          $r = mysql_fetch_array($sql);
                        ?>
                            <form class="" action="proses-edit-layanan.php" method="post">
                                <input type="hidden" name="id_layanan" value="<?php echo $kd;?>">
                                <div class="form-group col-xs-6">
                                  <label for="">Jenis Layanan</label>
                                  <input type="text" name="jenis_layanan" value="<?php echo $r['jenis_layanan'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Harga Layanan</label>
                                  <input type="text" name="harga_layanan" value="<?php echo $r['harga_layanan'];?>" class="nominal form-control">
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
