<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//session_start();
$nameuser = $_SESSION['nameuser'];
$passuser = $_SESSION['passuser'];
$tipe = $_SESSION['tipe'];
include "./connect.php.php";

$perintah = "select login,pwd,tipe from usermanager where login='$nameuser' and pwd='$passuser' and tipe='$tipe'";
$hasil = mysql_query($perintah);
$row = mysql_fetch_array($hasil);
$cek = mysql_num_rows($hasil);

if ($cek != '1' && $row['tipe'] != '2') {
    echo "<script>alert('Silahkan Anda LOGIN terlebih dahulu.'); document.location.href='../login.php';</script>\n";
}
?>
