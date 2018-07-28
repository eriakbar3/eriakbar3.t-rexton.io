<?php
  include 'koneksi.php';
  $kode = $_GET['id_user'];
  $sql = mysql_query("DELETE FROM user WHERE id_user = '$kode'");
  if ($sql) {
    echo "<script>alert('Berhasil Menghapus Data');
    window.location.href = 'data-petugas.php';
    </script>";
  } else {
    echo "gagal";
  }

?>
