<?php

//include "global/cek_session_admin.php";
include "../global/config.php";

$nama_ruang = $_REQUEST['nama_ruang'];
$aktif = $_REQUEST['aktif'];

if (empty($nama_ruang)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA NAMA KELAS'); document.location.href='data_kelas.php?act=tambah';</script>\n";
    exit();
} else {
    $strsql = "insert into kelas (ruang,aktif) values ('$nama_ruang','$aktif')";
    mysql_query($strsql);
    echo "<script>alert('DATA NAMA KELAS BARU BERHASIL DITAMBAH'); document.location.href='data_kelas.php';</script>\n";
//    header("location:data_kelas.php?act=tambah");
}
?>