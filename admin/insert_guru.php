<?php

//include "global/cek_session_admin.php";
include "../global/config.php";

$act = $_REQUEST['act'];
$nip = $_REQUEST['nip'];
$glr_depan = $_REQUEST['glr_depan'];
$nama = $_REQUEST['nama'];
$glr_blk = $_REQUEST['glr_blk'];
$golongan = $_REQUEST['golongan'];
$jabatan = $_REQUEST['jabatan'];
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
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA GURU'); document.location.href='data_guru.php?act=tambah&nip=$nip&glr_depan=$glr_depan&nama=$nama&glr_blk=$glr_blk&tempat_lahir=$tempat_lahir&agama=$agama&alamat_lengkap=$alamat_lengkap&telp_rumah=$telp_rumah&telp_hp=$telp_hp&alamat_asal=$alamat_asal&narasi=$narasi&tahun=$tahun&bulan=$bulan&tgl=$tgl';</script>\n";
    exit();
} else {
    $strsql = "insert into guru (NIP,GLR_DEPAN,NAMA,GLR_BLK,GOLONGAN,JABATAN,TEMPAT_LAHIR,TGL_LAHIR,ALAMAT_SKR,TELP_RUMAH,TELP_HP,ALAMAT_ASAL,NARASI,AGAMA,AKTIF,SEX) values 
('$nip','$glr_depan','$nama','$glr_blk','$golongan','$jabatan','$tempat_lahir','$tgl_lahir','$alamat_lengkap','$telp_rumah','$telp_hp','$alamat_asal','$narasi','$agama','$aktif','$jenis_kelamin')";
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('DATA GURU BARU BERHASIL DITAMBAH'); document.location.href='data_guru.php';</script>\n";
//    header("location:data_guru.php?act=tambah");
} else {
    echo "<script>alert('DATA GURU BARU TIDAK DAPAT DISIMPAN'); document.location.href='data_guru.php?act=tambah&nip=$nip&glr_depan=$glr_depan&nama=$nama&glr_blk=$glr_blk&tempat_lahir=$tempat_lahir&agama=$agama&alamat_lengkap=$alamat_lengkap&telp_rumah=$telp_rumah&telp_hp=$telp_hp&alamat_asal=$alamat_asal&narasi=$narasi&tahun=$tahun&bulan=$bulan&tgl=$tgl';</script>\n";
    exit();
}
?>