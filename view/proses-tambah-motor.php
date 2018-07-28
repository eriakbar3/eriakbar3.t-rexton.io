<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $no_polisi = $_POST['no_polisi'];
    $no_rangka = $_POST['no_rangka'];
    $no_mesin = $_POST['no_mesin'];
    $tipe_motor = $_POST['tipe_motor'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $alamat_konsumen = $_POST['alamat_konsumen'];
    $no_telp_konsumen = $_POST['no_telp_konsumen'];

    $sql = mysql_query("
            INSERT INTO motor (no_polisi, no_rangka, no_mesin, tipe_motor, warna, tahun, nama_konsumen, alamat_konsumen, no_telp_konsumen)
            VALUES('$no_polisi', '$no_rangka', '$no_mesin', '$tipe_motor', '$warna', '$tahun', '$nama_konsumen', '$alamat_konsumen', '$no_telp_konsumen')
        ");

    if ($sql) {
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-motor.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
