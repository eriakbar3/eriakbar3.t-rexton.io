<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $kode_servis = $_GET['kd'];

    $harga_tambahan = 0;
    $status = $_POST['status'];
    $tanggal_servis = $_POST['tanggal_servis'];
    $no_polisi = $_POST['no_polisi'];

    $total_harga = 0;
    if (isset($_POST['suku_cadang'])) {
      $sk = $_POST['suku_cadang'];
      foreach ($sk as $key => $value) {
        $value = explode('@', $value);
        if (count($value) > 1){
          $total_harga += $value[1];
          $sql = mysql_query("INSERT INTO detail_barang_servis(kode_servis, kode_barang, harga_jual) VALUES('$kode_servis', '$value[0]', $value[1])");
          $sql_detail_penjualan = mysql_query("INSERT INTO detail_penjualan(kode_barang, qty, harga_satuan, total, id_penjualan) VALUES('$value[0]', 1, $value[1], $value[1], '$kode_servis')");
          $harga_tambahan += $value[1];
        }
      }

      if (count($value) > 1){
        $cek_penjualan = mysql_num_rows(mysql_query("select * from penjualan where id_penjualan = '$kode_servis'"));

        if($cek_penjualan > 0){ 
          $sql_penjualan = mysql_query("update penjualan set total_harga = total_harga + $total_harga where id_penjualan = '$kode_servis'");
        }else{
          $sql_penjualan = mysql_query("INSERT INTO penjualan (id_penjualan, tanggal_jual, no_polisi, total_harga) VALUES ('$kode_servis', $tanggal_servis, '$no_polisi', $total_harga)");
        }
      }
    }



    $arr_layanan = $_POST['jp'];
    $arr_harga = $_POST['harga'];
    $arr_jenis = $_POST['jenis'];

    $total_harga_layanan = 0;

    $sql = mysql_query("delete from detail_layanan_servis where kode_servis = '{$kode_servis}'");

    foreach ($arr_layanan as $key => $value) {
      $jenis = isset($arr_jenis[$key]) ? $arr_jenis[$key] : '';
      $harga = isset($arr_harga[$key]) ? str_replace(",","",$arr_harga[$key]) : 0;
      $total_harga_layanan += $harga;
      $sql = mysql_query("INSERT INTO detail_layanan_servis(kode_servis, kode_layanan, jenis_layanan, harga_layanan) VALUES('$kode_servis', '$value', '$jenis', $harga)");
    }
    
    $sql = mysql_query("UPDATE servis SET status = '$status', total_harga_layanan = {$total_harga_layanan}, total_harga_barang = total_harga_barang + $total_harga WHERE kode_servis = '$kode_servis'");

    $sql = mysql_query("UPDATE servis SET estimasi_biaya = total_harga_layanan + total_harga_barang  WHERE kode_servis = '$kode_servis'");


    if ($sql) {
      // code...
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'servis.php';
      </script>";

    }else {
      echo "gagal";
    }
  }
?>
