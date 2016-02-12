<?php

//include "global/cek_session_admin.php";
include "../global/config.php";
$kelas_id = $_REQUEST['kelas_id'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$id_guru = $_REQUEST['id_guru'];
$id_matpel = $_REQUEST['id_matpel'];
$hari = $_REQUEST['hari'];
$jam = $_REQUEST['jam'];
$nip = $_REQUEST['nip'];
$nama = $_REQUEST['nama'];
$matpel = $_REQUEST['matpel'];
$id_jadwal = $_REQUEST['id_jadwal'];
$waktu1 = $_REQUEST['waktu1'];
$waktu2 = $_REQUEST['waktu2'];

$waktu = $waktu1 . "-" . $waktu2;

$strsql = "update jadwal set ID_GURU='$id_guru',ID_MATPEL='$id_matpel',JAM='$jam',WAKTU='$waktu' where id_jadwal='$id_jadwal'";

if (empty($jam)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA WAKTU'); document.location.href='jadwal_pelajaran.php?act=edit&hari=$hari&jam=$jam&tahun_ajaran=$tahun_ajaran&id_matpel=$id_matpel&id_guru=$id_guru&nip=$nip&nama=$nama&matpel=$matpel&kelas_id=$kelas_id&id_jadwal=$id_jadwal';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
    echo "<script>alert('DATA JADWAL PELAJARAN BERHASIL DIPERBARUHI'); document.location.href='jadwal_pelajaran.php?tahun_ajaran=$tahun_ajaran&hari=$hari&kelas_id=$kelas_id';</script>\n";
//    header("location:jadwal_pelajaran.php?tahun_ajaran=$tahun_ajaran&hari=$hari&kelas_id=$kelas_id");
}
?>