<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $kode_barang = $_POST['kd'];
    $nama = $_POST['nama'];
    $merek = $_POST['merek'];
    $tipe_barang = $_POST['tipe_barang'];
    $kode = $_POST['code'];
    $keterangan = $_POST['keterangan'];
    $stock = $_POST['stock'];
    $harga_beli = str_replace(",","",$_POST['harga_beli']);
    $harga_jual = str_replace(",","",$_POST['harga_jual']);
    $profit = str_replace(",","",$_POST['profit']);
    $stocktambah = $_POST['stocktambah'];
    $tanggungjawab = $_POST['tanggungjawab'];

    $carikode = mysql_query("SELECT max(id_update) FROM update_stok_barang");
      $datakode = mysql_fetch_array($carikode);
      if ($datakode) {
        $nilaikode = substr($datakode[0], 2);
          $kode = (int) $nilaikode;
          $kode = $kode+1;
          $hasilkode = "UP".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
          $hasilkode = "UP0001";
        }
    $tambah = $stock+$stocktambah;
    $hariini = date('Y-m-d');
    $sql = mysql_query("UPDATE barang SET nama_barang = '$nama',merek='$merek',tipe_barang='$tipe_barang',kode='$kode',
      keterangan='$keterangan',stock = '$tambah',harga_beli='$harga_beli',harga_jual='$harga_jual',profit=$profit WHERE kode_barang = '$kode_barang'");

    $sql1 = mysql_query("INSERT INTO update_stok_barang VALUES('$hasilkode', '$kode_barang', '$stocktambah', '$hariini','$tanggungjawab')");
    if ($sql || $sql1) {
      // code...
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-barang.php';
      </script>";

    }else {
      echo "gagal";
    }
  }
?>
