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
                        <div class="th-title"><b>DATA MOTOR</b></div>
                    </div>
                    <div>
                      <form class="" action="proses-tambah-motor.php" method="post">
                        <div class="form-group col-xs-6">
                          <label for="">No. Polisi</label>
                          <input type="text" name="no_polisi" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">No. Rangka</label>
                          <input type="text" name="no_rangka" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">No. Mesin</label>
                          <input type="text" name="no_mesin" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">Tipe Motor</label>
                          <input type="text" name="tipe_motor" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">Warna</label>
                          <input type="text" name="warna" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">Tahun</label>
                          <input type="text" name="tahun" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">Nama Konsumen</label>
                          <input type="text" name="nama_konsumen" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">Alamat Konsumen</label>
                          <input type="text" name="alamat_konsumen" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">No. Telp Konsumen</label>
                          <input type="text" name="no_telp_konsumen" value="" class="form-control">
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
