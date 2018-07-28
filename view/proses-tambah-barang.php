<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {
    $sql = mysql_query("SELECT * FROM barang ORDER BY kode_barang DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    $nama = $_POST['nama'];
    $merek = $_POST['merek'];
    $tipe_barang = $_POST['tipe_barang'];
    $code = $_POST['code'];
    $keterangan = $_POST['keterangan'];
    $stock = $_POST['stock'];
    $harga_beli = str_replace(",","",$_POST['harga_beli']);
    $harga_jual = str_replace(",","",$_POST['harga_jual']);
    $profit = str_replace(",","",$_POST['profit']);
    if ($num == 0) {
      $kd = "BR001";
    }else {
      $kd_lama = $sql['kode_barang'];
      $kd_new = substr($kd_lama,2,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
      $kd = "BR".$kd_new;
    }
    $sql = mysql_query("INSERT INTO barang(kode_barang,nama_barang,merek,tipe_barang,kode,keterangan,stock,harga_beli, harga_jual, profit)
    VALUES('$kd','$nama','$merek','$tipe_barang','$code','$keterangan','$stock',$harga_beli,$harga_jual,$profit)
    ");
    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-barang.php';
      </script>";

    }else {
      echo "gagal";
    }
  }
?>
