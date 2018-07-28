<?php
  include 'koneksi.php';
    $kode = $_POST['kd'];
    $sql = mysql_query("DELETE FROM penjualan WHERE id_penjualan = '$kode'");
    $sql = mysql_query("DELETE FROM detail_penjualan WHERE id_penjualan = '$kode'");
    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Menghapus Data');
      window.location.href = 'penjualan.php';
      </script>";

    }else {
      echo "gagal";
    }

?>
