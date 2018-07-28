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
                            <div class="th-title"><b>Edit Motor</b></div>
                        </div>
                        <div class="t-body tb-padding">
                        <?php
                          include 'koneksi.php';
                          $kd = $_GET['kd'];
                          $sql = mysql_query("SELECT * FROM motor WHERE no_polisi = '$kd'");
                          $r = mysql_fetch_array($sql);
                        ?>
                            <form class="" action="proses-edit-motor.php" method="post">
                                <input type="hidden" name="no_polisi" value="<?php echo $kd;?>">
                                <div class="form-group col-xs-6">
                                  <label for="">No. Polisi</label>
                                  <input type="text" name="no_polisi_baru" value="<?php echo $r['no_polisi'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">No. Rangka</label>
                                  <input type="text" name="no_rangka" value="<?php echo $r['no_rangka'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">No. Mesin</label>
                                  <input type="text" name="no_mesin" value="<?php echo $r['no_mesin'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Tipe Motor</label>
                                  <input type="text" name="tipe_motor" value="<?php echo $r['tipe_motor'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Warna</label>
                                  <input type="text" name="warna" value="<?php echo $r['warna'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Tahun</label>
                                  <input type="text" name="tahun" value="<?php echo $r['tahun'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Nama Konsumen</label>
                                  <input type="text" name="nama_konsumen" value="<?php echo $r['nama_konsumen'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">Alamat Konsumen</label>
                                  <input type="text" name="alamat_konsumen" value="<?php echo $r['alamat_konsumen'];?>" class="form-control">
                                </div>
                                <div class="form-group col-xs-6">
                                  <label for="">No. Telp Konsumen</label>
                                  <input type="text" name="no_telp_konsumen" value="<?php echo $r['no_telp_konsumen'];?>" class="form-control">
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
