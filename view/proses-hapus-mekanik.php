<?php
  include 'koneksi.php';
  $kode = $_GET['kd'];
  $sql = mysql_query("DELETE FROM mekanik WHERE id_mekanik = '$kode'");
  if ($sql) {
    echo "<script>alert('Berhasil Menghapus Data');
    window.location.href = 'data-mekanik.php';
    </script>";
  } else {
    echo "gagal";
  }

?>
