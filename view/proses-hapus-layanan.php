<?php
  include 'koneksi.php';
  $kode = $_GET['kd'];
  $sql = mysql_query("DELETE FROM layanan WHERE kode_layanan = '$kode'");
  if ($sql) {
    echo "<script>alert('Berhasil Menghapus Data');
    window.location.href = 'data-layanan.php';
    </script>";
  } else {
    echo "gagal";
  }

?>
