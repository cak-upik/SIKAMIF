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
$waktu1 = $_REQUEST['waktu1'];
$waktu2 = $_REQUEST['waktu2'];

$waktu = $waktu1 . "-" . $waktu2;

$strsql = "insert into jadwal (TAHUN_AJARAN,ID_GURU,ID_MATPEL,ID_KELAS,HARI,JAM,WAKTU) values 
('$tahun_ajaran','$id_guru','$id_matpel','$kelas_id','$hari','$jam','$waktu')";

if (empty($id_guru)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA PENGAJAR'); document.location.href='jadwal_pelajaran.php?act=tambah&hari=$hari&jam=$jam&tahun_ajaran=$tahun_ajaran&id_matpel=$id_matpel&id_guru=$id_guru&nip=$nip&nama=$nama&matpel=$matpel&kelas_id=$kelas_id&waktu1=$waktu1&waktu2=$waktu2';</script>\n";
    exit();
} elseif (empty($id_matpel)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA MATA PELAJARAN'); document.location.href='jadwal_pelajaran.php?act=tambah&hari=$hari&jam=$jam&tahun_ajaran=$tahun_ajaran&id_matpel=$id_matpel&id_guru=$id_guru&nip=$nip&nama=$nama&matpel=$matpel&kelas_id=$kelas_id&waktu1=$waktu1&waktu2=$waktu2';</script>\n";
    exit();
} elseif (empty($jam)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA WAKTU'); document.location.href='jadwal_pelajaran.php?act=tambah&hari=$hari&jam=$jam&tahun_ajaran=$tahun_ajaran&id_matpel=$id_matpel&id_guru=$id_guru&nip=$nip&nama=$nama&matpel=$matpel&kelas_id=$kelas_id&waktu1=$waktu1&waktu2=$waktu2';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
    echo "<script>alert('DATA JADWAL PELAJARAN BARU BERHASIL DITAMBAH'); document.location.href='jadwal_pelajaran.php?tahun_ajaran=$tahun_ajaran&hari=$hari&kelas_id=$kelas_id';</script>\n";
//    header("location:jadwal_pelajaran.php?act=tambah&tahun_ajaran=$tahun_ajaran&hari=$hari&kelas_id=$kelas_id");
}
?>