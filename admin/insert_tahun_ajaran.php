<?php

//include "global/cek_session_admin.php";

include "../global/config.php";

$tahun_kurikulum1 = $_REQUEST['tahun_kurikulum1'];
$tahun_kurikulum2 = $_REQUEST['tahun_kurikulum2'];

$tahun = $tahun_kurikulum1 . "-" . $tahun_kurikulum2;

$strsql = "INSERT INTO tahun_ajaran (tahun_ajaran) VALUES ('$tahun')";
if (empty($tahun_kurikulum1) OR empty($tahun_kurikulum2)) {
    echo "<script>alert('Anda belum memasukkan TAHUN AJARAN'); document.location.href='tahun_ajaran.php?act=tambah&tahun_kurikulum1=$tahun_kurikulum1&tahun_kurikulum2=$tahun_kurikulum2';</script>\n";
    exit();
} elseif ($tahun_kurikulum1 > $tahun_kurikulum2) {
    echo "<script>alert('Proses Tambah TAHUN AJARAN baru Gagal'); document.location.href='tahun_ajaran.php?act=tambah&tahun_kurikulum1=$tahun_kurikulum1&tahun_kurikulum2=$tahun_kurikulum2';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('DATA TAHUN AJARAN BARU TELAH DITAMBAH'); document.location.href='tahun_ajaran.php';</script>\n";
//    header("location:tahun_ajaran.php?act=tambah");
} else {
    echo "<script>alert('DATA TAHUN AJARAN BARU TIDAK DAPAT DITAMBAH'); document.location.href='tahun_ajaran.php?act=tambah&tahun_kurikulum1=$tahun_kurikulum1&tahun_kurikulum2=$tahun_kurikulum2';</script>\n";
    exit();
}
?>