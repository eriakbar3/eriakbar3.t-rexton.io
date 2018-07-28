<?php
  include 'koneksi.php';



    $kode = $_POST['kd'];
    $sql = mysql_query("DELETE FROM pembelian WHERE id_pembelian = '$kode'");
    $sql = mysql_query("DELETE FROM detail_pembelian WHERE id_pembelian = '$kode'");
    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Menghapus Data');
      window.location.href = 'pembelian.php';
      </script>";

    }else {
      echo "gagal";
    }

?>
