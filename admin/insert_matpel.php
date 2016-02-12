<?php

//include "global/cek_session_admin.php";
include "../global/config.php";

$kelas = $_REQUEST['kelas'];
$skm = $_REQUEST['skm'];
$nama_matpel = $_REQUEST['nama_matpel'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];

$hasil_cek = mysql_query("select nama_matpel,tahun_ajaran from matpel where tahun_ajaran='$tahun_ajaran' and nama_matpel='$nama_matpel'");
$cek = mysql_num_rows($hasil_cek);

if (empty($nama_matpel)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA MATA PELAJARAN'); document.location.href='data_matpel.php?act=tambah&kelas=$kelas&skm=$skm&tahun_ajaran=$tahun_ajaran&nama_matpel=$nama_matpel';</script>\n";
    exit();
} elseif (empty($skm)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA SKBM'); document.location.href='data_matpel.php?act=tambah&kelas=$kelas&skm=$skm&tahun_ajaran=$tahun_ajaran&nama_matpel=$nama_matpel';</script>\n";
    exit();
} elseif ($cek > '0') {
    echo "<script>alert('DATA PADA TAHUN AJARAN: $tahun_ajaran SUDAH ADA'); document.location.href='data_matpel.php?act=tambah&kelas=$kelas&skm=$skm&tahun_ajaran=$tahun_ajaran&nama_matpel=$nama_matpel';</script>\n";
    exit();
} else {
    $strsql = "insert into matpel (nama_matpel,skm,kelas,tahun_ajaran) values ('$nama_matpel','$skm','$kelas','$tahun_ajaran')";
    mysql_query($strsql);
    echo "<script>alert('DATA SKBM BARU BERHASIL DITAMBAH'); document.location.href='data_matpel.php';</script>\n";
//    header("location:data_matpel.php?act=tambah&kelas=$kelas&tahun_ajaran=$tahun_ajaran");
}
?>