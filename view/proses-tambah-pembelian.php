<?php
  include 'koneksi.php';
  session_start();
  if (isset($_POST['kirim'])) {
    $sql = mysql_query("SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 1 ");
    $num =  mysql_num_rows($sql);
    $sql = mysql_fetch_array($sql);
    if ($num == 0) {
      $kode = "PB001";
    }else {
      $kd_lama = $sql['id_pembelian'];
      $kd_new = substr($kd_lama,2,3);
      $kd_new = $kd_new+1;
      $kd_new = str_pad($kd_new,3,"00",STR_PAD_LEFT);
      $kode = "PB".$kd_new;
    }
    $tanggal_beli = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $kd = $_POST['kd'];
    $id_user = $_SESSION['id_user'];

    //$arr_ket = $_POST['keterangan'];
    $arr_jumlah = $_POST['jumlah'];
    $insert1 = mysql_query("INSERT INTO pembelian (id_pembelian,tanggal_beli,keterangan,id_user) VALUES('$kode','$tanggal_beli','$keterangan','$id_user')");

    foreach ($kd as $key => $value) {
       // $ket = isset($arr_ket[$key]) ? $arr_ket[$key] : '';
        $jumlah = $arr_jumlah[$key];
        $insert2 = mysql_query("INSERT INTO detail_pembelian(id_pembelian, kode_barang, qty) VALUES('$kode', '$value', '$jumlah')");
        $update_stok = mysql_query("update barang set stock = stock + $jumlah where kode_barang = '$value'");
    }

     echo "<script>alert('Berhasil Menambah Data');
     window.location.href = 'pembelian.php';
     </script>";
  }
?>
