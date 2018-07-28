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
                        <div class="th-title"><b>DATA PETUGAS</b></div>
                    </div>
                    <div>
                      <form class="" action="proses-tambah-petugas.php" method="post">
                        <div class="form-group col-xs-12">
                          <label for="">Nama</label>
                          <input type="text" name="nama_user" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-12">
                          <label for="">Jabatan</label>
                            <select class="form-control" name="role">
                              <option value="">Pilih Jabatan</option>
                              <option value="1">Kasir</option>
                              <option value="2">Servis Advisor</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                          <label for="">Username</label>
                          <input type="text" name="username" value="" class="form-control">
                        </div>
                        <div class="form-group col-xs-12">
                          <label for="">Password</label>
                          <input type="password" name="password" value="" class="form-control">
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
