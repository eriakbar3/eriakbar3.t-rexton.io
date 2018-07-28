<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {
    $id = $_GET['kd'];
    $no_polisi = $_POST['no_polisi'];
    $merek = $_POST['merek'];
    $type = $_POST['type'];
    $tanggal = $_POST['tanggal'];
    $kode = $_POST['kode'];
    $qty = $_POST['qtys'];
    for ($i=0; $i <count($kode) ; $i++) {
      // code...
      $sql = mysql_query("SELECT * FROM barang WHERE kd_barang = '$kode[$i]' ");
      $r  =  mysql_fetch_array($sql);
      $total[] = ($r['nilai_brg']+$r['profit'])*$qty[$i];
      $satuan[] = $r['nilai_brg']+$r['profit'];
    }
    $jumlah = array_sum($total);

     $insert1 = mysql_query("UPDATE penjualan_brg SET merek = '$merek',type ='$type',tanggal= '$tanggal',no_polisi = '$no_polisi',jumlah = '$jumlah' WHERE id_penjualan = $id ");
     $del = mysql_query("DELETE FROM detail_penjualan_brg WHERE id_penjualan='$id'");
      for ($i=0; $i <count($kode) ; $i++) {
       // code...
        $insert2 = mysql_query("INSERT INTO detail_penjualan_brg(kd_barang,quantity,harga_satuan,total,id_penjualan) VALUES('$kode[$i]','$qty[$i]','$satuan[$i]','$total[$i]','$id')");
        echo "1";
      }

           echo "<script>alert('Berhasil Mengubah Data');
           window.location.href = 'penjualan.php';
           </script>";
  }
?>
