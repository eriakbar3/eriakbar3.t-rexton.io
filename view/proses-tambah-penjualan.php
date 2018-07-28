<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $no_polisi = $_POST['no_polisi'];
    $tanggal_jual = $_POST['tanggal'];
    $tgl = date('Y-m-d');
    $sql = mysql_query("SELECT * FROM penjualan where id_penjualan like 'PB%' and tanggal_jual = '$tanggal_jual' ORDER BY id_penjualan DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    if ($num == 0) {
      $kd_new = "001";
    }else {
      $kd_lama = $sql['id_penjualan'];
      $kd_new = substr($kd_lama,10,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
    }
    
    $id_penjualan = "PB".date("Ymd").$kd_new;

    $kode = $_POST['kode'];
    $qty = $_POST['qtys'];
    $total;
    $satuan;
    for ($i=0; $i <count($kode) ; $i++) {
        $sql = mysql_query("SELECT * FROM barang WHERE kode_barang = '$kode[$i]' ");
        $r  =  mysql_fetch_array($sql);
        $total[$i] = ($r['harga_jual'])*$qty[$i];
        $satuan[$i] = $r['harga_jual'];
    }

    $jumlah = array_sum($total);
    $total_harga = $_POST['total_harga'];
    $total_bayar = $_POST['total_bayar'];
    $total_kembali = $_POST['total_kembali'];

    $insert1 = mysql_query("INSERT INTO penjualan (id_penjualan, tanggal_jual, no_polisi, total_harga, total_bayar, total_kembali) VALUES('$id_penjualan', '$tanggal_jual', '$no_polisi', '$total_harga', '$total_bayar', '$total_kembali')"); 


    for ($i=0; $i <count($kode) ; $i++) {
        $insert2 = mysql_query("INSERT INTO detail_penjualan(kode_barang, qty, harga_satuan, total, id_penjualan) VALUES('$kode[$i]','$qty[$i]','$satuan[$i]','$total[$i]','$id_penjualan')");

        $stk = $r['stock'];
        $kurang = $stk-$qty[$i];
        $sql = mysql_query("UPDATE barang SET stock = '$kurang' WHERE kode_barang = '$kode[$i]' ");
    }

    echo "<script>alert('Berhasil Menambah Data');
    window.location.href = 'penjualan.php';
    </script>";
  }
?>
