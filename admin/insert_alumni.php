<?php

//include "global/cek_session_admin.php";
include "../global/config.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$jurusan = $_REQUEST['jurusan'];
$nis = $_REQUEST['nis'];
$uan = $_REQUEST['uan'];
$motto = $_REQUEST['motto'];
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];

$strsql_insert = "insert into alumni (nis,tahun_ajaran,jurusan,uan,motto) values ('$nis','$tahun_ajaran','$jurusan','$uan','$motto')";
$strsql_update = "update siswa set aktif='0' where nis='$nis'";

if (empty($nis)) {
    echo "<script>alert('Anda belum memasukkan SISWA'); document.location.href='alumni.php?act=tambah&tahun_ajaran=$tahun_ajaran&jurusan=$jurusan&kategori=$kategori&key=$key&uan=$uan&motto=$motto';</script>\n";
    exit();
} else {
    mysql_query($strsql_insert);
    mysql_query($strsql_update);
    header("location:alumni.php?act=tambah&tahun_ajaran=$tahun_ajaran&jurusan=$jurusan&kategori=$kategori&key=$key");
}
?>