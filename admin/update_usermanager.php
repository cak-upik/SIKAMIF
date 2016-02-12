<?php

//include "../global/cek_session_admin.php";
include "../global/config.php";
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$status = $_REQUEST['status'];
$key = $_REQUEST['key'];
$id = $_REQUEST['id'];

$strsql = "UPDATE usermanager SET login='$username',pwd='$password' WHERE id='$id'";

if (empty($username)) {
    echo "<script>alert('Anda belum memasukkan USERNAME'); document.location.href='user_manager.php?act=edit&username=$username&password=$password&status=$status&key=$key&id=$id';</script>\n";
    exit();
} elseif (empty($password)) {
    echo "<script>alert('Anda belum memasukkan PASSWORD'); document.location.href='user_manager.php?act=edit&username=$username&password=$password&status=$status&key=$key&id=$id';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}
if ($hasil) {
    echo "<script>alert('USER BARU TELAH DIPERBARUHI'); document.location.href='user_manager.php?status=$status';</script>\n";
//    header("location:user_manager.php?status=$status&key=$key&id=$id");
} else {
    echo "<script>alert('Silahkan gunakan USERNAME yang lain'); document.location.href='user_manager.php?act=edit&username=$username&password=$password&status=$status&key=$key&id=$id';</script>\n";
    exit();
}
?>