<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {
    $sql = mysql_query("SELECT * FROM layanan ORDER BY kode_layanan DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    $jenis_layanan = $_POST['jenis_layanan'];
    $harga_layanan = str_replace(',','',$_POST['harga_layanan']);
    if ($num == 0) {
        $kd = "L001";
    }else {
      $kd_lama = $sql['kode_layanan'];
      $kd_new = substr($kd_lama,1,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
      $kd = "L".$kd_new;
    }
    $sql = mysql_query("
            INSERT INTO layanan (kode_layanan, jenis_layanan, harga_layanan)
            VALUES('$kd','$jenis_layanan','$harga_layanan')
        ");

    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-layanan.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
