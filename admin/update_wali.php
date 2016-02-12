<?php

include "../global/config.php";

$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$id_guru = $_REQUEST['id_guru'];
$kelas_id = $_REQUEST['kelas_id'];
$id = $_REQUEST['id'];
$temp = $_REQUEST['temp'];

//QUERY UNTUK PENGECEKAN:
//WALI KELAS TIDAK BOLEH SAMA PADA KELAS DAN TAHUN AJARAN YANG SAMA
$hasil_cek = mysql_query("select id_guru,tahun_ajaran from wali_kelas where tahun_ajaran='$tahun_ajaran' and id_guru='$id_guru'");
$total_cek = mysql_num_rows($hasil_cek);

if ($temp <> $id_guru) {
    if ($total_cek > '0') {
        echo "<script>alert('NAMA GURU SUDAH ADA DIKELAS LAIN DAN DI TAHUN AJARAN YANG SAMA'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran&act=edit&id=$id';</script>\n";
        exit();
    } else {
        $strsql = "update wali_kelas set id_guru='$id_guru' where id='$id'";
        mysql_query($strsql);
        echo "<script>alert('DATA WALI KELAS BERHASIL DIPERBARUHI'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran';</script>\n";
//        header("location:wali_kelas.php?tahun_ajaran=$tahun_ajaran");
    }
} else {
    echo "<script>alert('DATA WALI KELAS BERHASIL DIPERBARUHI'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran';</script>\n";
//        header("location:wali_kelas.php?tahun_ajaran=$tahun_ajaran");
}
?>