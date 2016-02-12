<?php

//include "../global/cek_session_admin.php";
include "../global/config.php";
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$status = $_REQUEST['status'];

$strsql = "INSERT INTO usermanager (login,pwd,tipe) VALUES ('$username','$password','$status')";

if (empty($username)) {
    echo "<script>alert('Anda belum memasukkan USERNAME'); document.location.href='user_manager.php?act=tambah&username=$username&password=$password&status=$status';</script>\n";
    exit();
} elseif (empty($password)) {
    echo "<script>alert('Anda belum memasukkan PASSWORD'); document.location.href='user_manager.php?act=tambah&username=$username&password=$password&status=$status';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}
if ($hasil) {
    echo "<script>alert('USER BARU BERHASIL DITAMBAH'); document.location.href='user_manager.php?status=$status';</script>\n";
//    header("location:user_manager.php?act=tambah&status=$status");
} else {
    echo "<script>alert('Silahkan gunakan USERNAME yang lain'); document.location.href='user_manager.php?act=tambah&username=$username&password=$password&status=$status';</script>\n";
    exit();
}
?>