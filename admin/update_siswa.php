<?php

include "../global/config.php";
$nis = $_REQUEST['nis'];
$nama_lengkap = $_REQUEST['nama_lengkap'];
$nama_panggilan = $_REQUEST['nama_panggilan'];
$alamat = $_REQUEST['alamat'];
$telp_rumah = $_REQUEST['telp_rumah'];
$telp_hp = $_REQUEST['telp_hp'];
$tempat_lahir = $_REQUEST['tempat_lahir'];
$tahun = $_REQUEST['tahun'];
$bulan = $_REQUEST['bulan'];
$tgl = $_REQUEST['tgl'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];
$agama = $_REQUEST['agama'];
$anak_ke = $_REQUEST['anak_ke'];
$status = $_REQUEST['status'];
$jenis_ijazah = $_REQUEST['jenis_ijazah'];
$tahun_ijazah = $_REQUEST['tahun_ijazah'];
$nomor_ijazah = $_REQUEST['nomor_ijazah'];
$nama_ayah = $_REQUEST['nama_ayah'];
$pekerjaan_ayah = $_REQUEST['pekerjaan_ayah'];
$alamat_ayah = $_REQUEST['alamat_ayah'];
$telp_rumah_ayah = $_REQUEST['telp_rumah_ayah'];
$telp_hp_ayah = $_REQUEST['telp_hp_ayah'];
$aktif = $_REQUEST['aktif'];
$catatan_lain = $_REQUEST['catatan_lain'];
$nama_ibu = $_REQUEST['nama_ibu'];
$pekerjaan_ibu = $_REQUEST['pekerjaan_ibu'];
$alamat_ibu = $_REQUEST['alamat_ibu'];
$telp_rumah_ibu = $_REQUEST['telp_rumah_ibu'];
$telp_hp_ibu = $_REQUEST['telp_hp_ibu'];
$nama_wali = $_REQUEST['nama_wali'];
$pekerjaan_wali = $_REQUEST['pekerjaan_wali'];
$alamat_wali = $_REQUEST['alamat_wali'];
$telp_rumah_wali = $_REQUEST['telp_rumah_wali'];
$telp_hp_wali = $_REQUEST['telp_hp_wali'];
$perlihat = $_REQUEST['perlihat'];

if (strlen($bulan) == '1') {
    $bulan = "0" . $bulan;
}
if (strlen($tgl) == '1') {
    $tgl = "0" . $tgl;
}
//string tgl. lahir
$tgl_lahir = $tahun . $bulan . $tgl;

$uploaddir = 'foto/';
$uploadfile = $uploaddir . basename($_FILES['foto']['name']);

$fileName = $_FILES['foto']['name'];

$strsql = "update siswa set NAMA_LENGKAP='$nama_lengkap',NAMA_PANGGILAN='$nama_panggilan',ALAMAT='$alamat',TELP_RUMAH='$telp_rumah',
TELP_HP='$telp_hp',TEMPAT_LAHIR='$tempat_lahir',TGL_LAHIR='$tgl_lahir',SEX='$jenis_kelamin',AGAMA='$agama',
ANAK_KE='$anak_ke',STATUS='$status',JENIS_IJAZAH='$jenis_ijazah',TAHUN_IJAZAH='$tahun_ijazah',NOMOR_IJAZAH='$nomor_ijazah',
CATATAN_LAIN='$catatan_lain',AKTIF='$aktif',NAMA_AYAH='$nama_ayah',
PEKERJAAN_AYAH='$pekerjaan_ayah',ALAMAT_AYAH='$alamat_ayah',TELP_RUMAH_AYAH='$telp_rumah_ayah',TELP_HP_AYAH='$telp_hp_ayah',
NAMA_IBU='$nama_ibu',PEKERJAAN_IBU='$pekerjaan_ibu',ALAMAT_IBU='$alamat_ibu',TELP_RUMAH_IBU='$telp_rumah_ibu',
TELP_HP_IBU='$telp_hp_ibu',NAMA_WALI='$nama_wali',PEKERJAAN_WALI='$pekerjaan_wali',
ALAMAT_WALI='$alamat_wali',TELP_RUMAH_WALI='$telp_rumah_wali',TELP_HP_WALI='$telp_hp_wali',FOTO='$fileName'
where NIS='$nis'";

if (empty($nama_lengkap)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA'); document.location.href='data_siswa.php?act=edit&nis=$nis&perlihat=$perlihat';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
    echo "<script>alert('DATA SISWA BERHASIL DIRUBAH'); document.location.href='data_siswa.php';</script>\n";
//    header("location:data_siswa.php?perlihat=$perlihat");
}
?>