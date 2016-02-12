<?php

//include "global/cek_session_admin.php";

include "../global/config.php";

$tahun_kurikulum1 = $_REQUEST['tahun_kurikulum1'];
$tahun_kurikulum2 = $_REQUEST['tahun_kurikulum2'];
$id = $_REQUEST['id'];

$tahun = $tahun_kurikulum1 . "-" . $tahun_kurikulum2;

$strsql = "UPDATE tahun_ajaran set tahun_ajaran='$tahun' where id='$id'";
if (empty($tahun_kurikulum1) OR empty($tahun_kurikulum2)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA TAHUN AJARAN'); document.location.href='tahun_ajaran.php?act=edit&id=$id';</script>\n";
    exit();
} elseif ($tahun_kurikulum1 > $tahun_kurikulum2) {
    echo "<script>alert('TAMBAH TAHUN AJARAN TIDAK DAPAT DISIMPAN'); document.location.href='tahun_ajaran.php?act=edit&id=$id';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('DATA TAHUN AJARAN BERHASIL DIRUBAH'); document.location.href='tahun_ajaran.php';</script>\n";
//    header("location:tahun_ajaran.php");
} else {
    echo "<script>alert('DATA TAHUN AJARAN TIDAK DAPAT DISIMPAN'); document.location.href='tahun_ajaran.php?act=edit&id=$id';</script>\n";
    exit();
}
?>