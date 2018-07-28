<?php
  include 'koneksi.php';

  if (isset($_POST['kirim'])) {

    $nama_user = $_POST['nama_user'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user VALUES (NULL, '$username', '$password', '$nama_user', '$role')";
    $execute = mysql_query($sql);

    if ($execute) {
      echo "<script>alert('Berhasil Menambah Data');
      window.location.href = 'data-petugas.php';
      </script>";
    }else {
      echo "gagal";
    }
  }
?>
