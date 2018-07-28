<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET nama_user = '$nama_user', role = '$role', username = '$username', password = '$password' WHERE id_user = '$id_user'";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Mengubah Data');
      window.location.href = 'data-petugas.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
