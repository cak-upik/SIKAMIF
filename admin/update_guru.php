<?php

//include "global/cek_session_admin.php";
include "../global/config.php";

$id = $_REQUEST['id'];
$nip = $_REQUEST['nip'];
$glr_depan = $_REQUEST['glr_depan'];
$nama = $_REQUEST['nama'];
$glr_blk = $_REQUEST['glr_blk'];
$tempat_lahir = $_REQUEST['tempat_lahir'];
$tahun = $_REQUEST['tahun'];
$bulan = $_REQUEST['bulan'];
$tgl = $_REQUEST['tgl'];
$agama = $_REQUEST['agama'];
$alamat_lengkap = $_REQUEST['alamat_lengkap'];
$telp_rumah = $_REQUEST['telp_rumah'];
$telp_hp = $_REQUEST['telp_hp'];
$alamat_asal = $_REQUEST['alamat_asal'];
$narasi = $_REQUEST['narasi'];
$aktif = $_REQUEST['aktif'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];

if (strlen($bulan) == '1') {
    $bulan = "0" . $bulan;
}
if (strlen($tgl) == '1') {
    $tgl = "0" . $tgl;
}
//string tgl. lahir
$tgl_lahir = $tahun . $bulan . $tgl;


if (empty($nama)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA GURU'); document.location.href='data_guru.php?act=edit&id=$id';</script>\n";
    exit();
} else {
    $strsql = "update guru set GLR_DEPAN='$glr_depan',NAMA='$nama',GLR_BLK='$glr_blk',TEMPAT_LAHIR='$tempat_lahir',
TGL_LAHIR='$tgl_lahir',ALAMAT_SKR='$alamat_lengkap',TELP_RUMAH='$telp_rumah',
TELP_HP='$telp_hp',ALAMAT_ASAL='$alamat_asal',NARASI='$narasi',
AGAMA='$agama',AKTIF='$aktif',SEX='$jenis_kelamin' where id='$id'";
    $hasil = mysql_query($strsql);
    echo "<script>alert('DATA GURU BERHASIL DIRUBAH'); document.location.href='data_guru.php';</script>\n";
//    header("location:data_guru.php");
}
?>