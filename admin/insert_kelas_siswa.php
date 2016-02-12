<?php

//include "global/cek_session_admin.php";
include "../global/config.php";
$nis = $_REQUEST['nis'];
$nama = $_REQUEST['nama'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$kelas_id = $_REQUEST['kelas_id'];

$kelas = mysql_query("select id,ruang from kelas where id='$kelas_id'");
$row_kelas = mysql_fetch_array($kelas);

$hasil_cek = mysql_query("select tahun_ajaran,id_kelas,nis from nilai where nis='$nis'");
$cek = mysql_num_rows($hasil_cek);

if ($cek > '0') {
    echo "<script>alert('SISWA SUDAH TERDAFTAR PADA KELAS $row_kelas[ruang]'); document.location.href='penempatan_kelas.php?act=tambah&kelas_id=$kelas_id&tahun_ajaran=$tahun_ajaran&nis=$nis&nama=$nama';</script>\n";
    exit();
}

if (empty($nis)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN DATA SISWA'); document.location.href='penempatan_kelas.php?act=tambah&kelas_id=$kelas_id&tahun_ajaran=$tahun_ajaran';</script>\n";
    exit();
} else {
    mysql_query("insert into nilai (nis,tahun_ajaran,id_kelas) values ('$nis','$tahun_ajaran','$kelas_id')");
//    $id_insert_nilai = mysql_insert_id();
//    $matpel = mysql_query("select * from master_matpel");
//    while($matpels=mysql_fetch_array($matpel)){
//        $id_matpel = $matpels['ID'];
//        mysql_query("insert into nilai_detil(id_nilai,id_matpel,semester,nilai_kd1,nilai_kd2,nilai_kd3,nilai_kd4,nilai_rata2,nilai_sikap,nilai_uts,nilai_uas,nilai_raport,value_uts,value_uas,keterangan) values('". $id_insert_nilai ."','". $id_matpel ."','0','0','0','0','0','0','0','0','0','0','0','0','TIDAK LULUS')");
//    }
//    
    echo "<script>alert('DATA SISWA BARU BERHASIL DITAMBAH'); document.location.href='penempatan_kelas.php?kelas_id=$kelas_id&tahun_ajaran=$tahun_ajaran';</script>\n";
//    header("location:penempatan_kelas.php?act=tambah&kelas_id=$kelas_id&tahun_ajaran=$tahun_ajaran");
}
?>