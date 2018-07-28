<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $no_polisi = $_POST['no_polisi'];
    $no_polisi_baru = $_POST['no_polisi_baru'];
    $no_rangka = $_POST['no_rangka'];
    $no_mesin = $_POST['no_mesin'];
    $tipe_motor = $_POST['tipe_motor'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $alamat_konsumen = $_POST['alamat_konsumen'];
    $no_telp_konsumen = $_POST['no_telp_konsumen'];

    $sql = "UPDATE motor SET no_polisi = '$no_polisi_baru', no_rangka = '$no_rangka', no_mesin = '$no_mesin', tipe_motor = '$tipe_motor', warna = '$warna', tahun = '$tahun', nama_konsumen = '$nama_konsumen', alamat_konsumen = '$alamat_konsumen', no_telp_konsumen = '$no_telp_konsumen' WHERE no_polisi = '$no_polisi'";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-motor.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
