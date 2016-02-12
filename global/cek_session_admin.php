<?php

session_start();
include "config.php";

$username = $_SESSION['username'];
$passuser = $_SESSION['password'];
$tipe = $_SESSION['tipe'];

$perintah = "SELECT login,pwd,tipe FROM usermanager WHERE login='$username' AND pwd='$passuser' AND tipe='$tipe'";
$hasil = mysql_query($perintah);
$row = mysql_fetch_array($hasil);
$cek = mysql_num_rows($hasil);

//if ($cek != '1' && $row['tipe'] != '1') {
//    echo "<script>alert('Silahkan Anda LOGIN terlebih dahulu.');document.location.href='../login.php';</script>\n";
//}
?>
