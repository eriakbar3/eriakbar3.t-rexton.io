<?php
  include 'koneksi.php';
  $kode = $_GET['kd'];
  $sql = mysql_query("DELETE FROM suplier WHERE id_suplier = '$kode'");
  if ($sql) {
    echo "<script>alert('Berhasil Menghapus Data');
    window.location.href = 'data-suplier.php';
    </script>";
  } else {
    echo "gagal";
  }

?>
