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
                        <div class="th-title"><b>DATA SUPLIER</b></div>
                    </div>
                    <div>
                      <form class="" action="proses-tambah-suplier.php" method="post">
                        <div class="form-group col-xs-6">
                          <label for="">Nama</label>
                          <input type="text" name="nama_suplier" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                          <label for="">No. Telp</label>
                          <input type="text" name="no_telp" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-12">
                          <label for="">Alamat</label>
                          <input type="text" name="alamat" value="" class="form-control">
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
