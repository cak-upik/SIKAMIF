<?php

include "../global/config.php";

$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$id_guru = $_REQUEST['id_guru'];
$kelas_id = $_REQUEST['kelas_id'];

//QUERY UNTUK PENGECEKAN:
//WALI KELAS TIDAK BOLEH SAMA PADA KELAS DAN TAHUN AJARAN YANG SAMA
$hasil_cek = mysql_query("select id_guru,tahun_ajaran from wali_kelas where tahun_ajaran='$tahun_ajaran' and id_guru='$id_guru'");
$total_cek = mysql_num_rows($hasil_cek);

if (empty($kelas_id)) {
    header("location:wali_kelas.php?tahun_ajaran=$tahun_ajaran");
}

if ($total_cek > '0') {
    echo "<script>alert('NAMA GURU SUDAH DIPAKAI DI KELASI LAIN DI TAHUN AJARAN YANG SAMA'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran&act=tambah';</script>\n";
    exit();
}

if (empty($id_guru)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA GURU'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran&act=tambah';</script>\n";
    exit();
} else {
    $strsql = "insert into wali_kelas (id_guru,tahun_ajaran,id_kelas) values ('$id_guru','$tahun_ajaran','$kelas_id')";
    mysql_query($strsql);
    echo "<script>alert('DATA WALI KELAS BARU BERHASIL DITAMBAH'); document.location.href='wali_kelas.php?tahun_ajaran=$tahun_ajaran';</script>\n";
//    header("location:wali_kelas.php?act=tambah&tahun_ajaran=$tahun_ajaran");
}
?>