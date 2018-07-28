<?php
  include 'koneksi.php';



    $kode = $_POST['kd'];
    $sql = mysql_query("DELETE FROM barang WHERE kode_barang = '$kode'");
    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Menghapus Data');
      window.location.href = 'data-barang.php';
      </script>";

    }else {
      echo "gagal";
    }

?>
