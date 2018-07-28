<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $kode_suplier = $_POST['kode_suplier'];
    $nama_suplier = $_POST['nama_suplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE suplier SET nama_toko = '$nama_suplier', no_telp_suplier = '$no_telp', alamat = '$alamat' WHERE id_suplier = '$kode_suplier'";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-suplier.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
