<?php

//include "global/cek_session_admin.php";
include "../global/config.php";

$nama_ruang = $_REQUEST['nama_ruang'];
$aktif = $_REQUEST['aktif'];
$id = $_REQUEST['id'];

if (empty($nama_ruang)) {
    echo "<script>alert('ANDA BELUM MENGISI DATA RUANG'); document.location.href='data_kelas.php?act=edit&id=$id';</script>\n";
    exit();
} else {
    $strsql = "update kelas set aktif='$aktif',ruang='$nama_ruang' where id='$id'";
    mysql_query($strsql);
    echo "<script>alert('DATA NAMA KELAS BERHASIL DIRUBAH'); document.location.href='data_kelas.php';</script>\n";
//    header("location:data_kelas.php");
}
?>