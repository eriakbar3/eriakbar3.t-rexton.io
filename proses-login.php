<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = mysql_query("SELECT * FROM user WHERE username = '$username'");
$r= mysql_fetch_array($sql);
if ($password == $r['password']) {
  // code...
  $role = $r['role'];
  session_start();
  $_SESSION['id_user'] = $r['id_user'];
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $role;
  $_SESSION['nama_user'] = $r['nama_user'];
  // if ($role == '1') {
  //   header("Location:kasir/index.php");
  // }elseif ($role =='2') {
    header("Location:view/index.php");
  // }else {
  //   header("Location:owner/index.php");
  // }
} else {
    echo '<script type="text/javascript">'; 
    echo 'alert("Username atau password salah!!!");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
    //header("Location:index.php");

}

?>
