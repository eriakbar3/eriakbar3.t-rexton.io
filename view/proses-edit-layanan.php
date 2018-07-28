<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $id_layanan = $_POST['id_layanan'];
    $jenis_layanan = $_POST['jenis_layanan'];
    $harga_layanan = str_replace(',','',$_POST['harga_layanan']);

    $sql = "UPDATE layanan SET jenis_layanan = '$jenis_layanan', harga_layanan = $harga_layanan WHERE kode_layanan = '$id_layanan'";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-layanan.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
