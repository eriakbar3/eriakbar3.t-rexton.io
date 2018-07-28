<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $kode_mekanik = $_POST['kode_mekanik'];
    $nama_mekanik = $_POST['nama_mekanik'];
    $no_telp_mekanik = $_POST['no_telp_mekanik'];

    $sql = "UPDATE mekanik SET nama_mekanik = '$nama_mekanik', no_telp_mekanik = '$no_telp_mekanik' WHERE id_mekanik = '$kode_mekanik'";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-mekanik.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
