<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {
    $sql = mysql_query("SELECT * FROM suplier ORDER BY id_suplier DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    $nama_suplier = $_POST['nama_suplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    if ($num == 0) {
        $kd = "KS001";
    }else {
      $kd_lama = $sql['id_suplier'];
      $kd_new = substr($kd_lama,2,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
      $kd = "SP".$kd_new;
    }
    $sql = mysql_query("
            INSERT INTO suplier (id_suplier, nama_toko, no_telp_suplier, alamat)
            VALUES('$kd', '$nama_suplier', '$no_telp', '$alamat')
        ");

    if ($sql) {
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-suplier.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
