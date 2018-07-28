<?php
  include 'koneksi.php';
  date_default_timezone_set("Asia/Jakarta");
  if (isset($_POST['kirim'])) {

    $no_urut = $_POST['no_urut'];
    $no_polisi = $_POST['no_polisi'];
    $tanggal_servis = $_POST['tanggal'];
    $jam_masuk = $_POST['jam'];
    $keluhan = $_POST['keluhan'];
    $analisa = $_POST['analisa_sa'];
    $total_harga_layanan = str_replace(",","",$_POST['harga_jasa']);
    $estimasi_biaya = str_replace(",","",$_POST['es_biaya']);
    $total_harga_barang = str_replace(",","",$_POST['es_biaya']-$_POST['harga_jasa']);
    $jam_keluar = $_POST['es_selesai'];
    $id_mekanik = $_POST['id_mekanik'];
    $catatan = $_POST['catatan'];

    $kode_servis = date("y/m-d")."/".$no_urut;

    // array layanan & suku cadang
    $arr_layanan = $_POST['jp'];
    $arr_harga = $_POST['harga'];
    $arr_jenis = $_POST['jenis'];
    $arr_barang = $_POST['suku_cadang'];

    $sql = mysql_query("INSERT INTO servis(kode_servis, no_urut, tanggal_servis, jam_masuk, keluhan, analisa, total_harga_layanan, total_harga_barang, jam_keluar, id_mekanik, catatan, estimasi_biaya, status, no_polisi )
    VALUES ('$kode_servis', '$no_urut', '$tanggal_servis', '$jam_masuk', '$keluhan', '$analisa', $total_harga_layanan, $total_harga_barang, '$jam_keluar', '$id_mekanik', '$catatan', $estimasi_biaya, 'Dikerjakan', '$no_polisi')");

    if(!$sql){
    echo "<script>alert('Gagal Menambah Data');
      window.location.href = 'buat-spk.php';
      </script>";
    }

    foreach ($arr_layanan as $key => $value) {
      $jenis = isset($arr_jenis[$key]) ? $arr_jenis[$key] : '';
      $harga = isset($arr_harga[$key]) ? str_replace(",","",$arr_harga[$key]) : 0;
      $sql = mysql_query("INSERT INTO detail_layanan_servis(kode_servis, kode_layanan, jenis_layanan, harga_layanan) VALUES('$kode_servis', '$value', '$jenis', $harga)");
    }

    $total_harga = 0;
    foreach ($arr_barang as $key => $value) {
      $value = explode('@', $value);
      if (count($value) > 1){
        $total_harga += $value[1];
        $sql = mysql_query("INSERT INTO detail_barang_servis(kode_servis, kode_barang, harga_jual) VALUES('$kode_servis', '$value[0]', $value[1])");
        $sql_detail_penjualan = mysql_query("INSERT INTO detail_penjualan(kode_barang, qty, harga_satuan, total, id_penjualan) VALUES('$value[0]', 1, $value[1], $value[1], '$kode_servis')");
      }
    }

    if (count($value) > 1){  
      $sql_penjualan = mysql_query("INSERT INTO penjualan (id_penjualan, tanggal_jual, no_polisi, total_harga) VALUES ('$kode_servis', '$tanggal_servis', '$no_polisi', $total_harga)");
    }

    if ($sql) {
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'servis.php';
      </script>";

    }else {
      echo "gagal";
    }
  }
?>
