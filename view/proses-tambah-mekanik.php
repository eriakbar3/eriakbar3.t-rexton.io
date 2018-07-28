<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {
    $sql = mysql_query("SELECT * FROM mekanik ORDER BY id_mekanik DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    $nama_mekanik = $_POST['nama_mekanik'];
    $no_telp_mekanik = $_POST['no_telp_mekanik'];

    if ($num == 0) {
        $kd = "MK001";
    }else {
      $kd_lama = $sql['id_mekanik'];
      $kd_new = substr($kd_lama,2,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
      $kd = "MK".$kd_new;
    }
    $sql = mysql_query("
            INSERT INTO mekanik (id_mekanik, nama_mekanik, no_telp_mekanik)
            VALUES('$kd', '$nama_mekanik', '$no_telp_mekanik')
        ");

    if ($sql) {
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-mekanik.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
