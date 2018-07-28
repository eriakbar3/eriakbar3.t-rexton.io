<?php
  include 'koneksi.php';
  date_default_timezone_set("Asia/Jakarta");
  if (isset($_POST['bayar'])) {
  	$sql = mysql_query("update servis set total_bayar = '".$_POST['total_bayar']."' where kode_servis = '".$_POST['kd']."'");
  	$sql = mysql_query("update penjualan set total_bayar = total_harga where id_penjualan = '".$_POST['kd']."'");
  	echo '<script type="text/javascript">'; 
    echo 'alert("Pembayaran Berhasil");'; 
    echo 'window.location.href = "servis.php";';
    echo '</script>';
  }

?>