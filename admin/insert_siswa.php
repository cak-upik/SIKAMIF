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

/*
  $strsql="insert into siswa (NIS,NAMA_LENGKAP,NAMA_PANGGILAN,ALAMAT,TELP_RUMAH,TELP_HP,TEMPAT_LAHIR,TGL_LAHIR,SEX,AGAMA,ANAK_KE,STATUS,
  JENIS_IJAZAH,TAHUN_IJAZAH,NOMOR_IJAZAH,CATATAN_LAIN,AKTIF,NAMA_AYAH,PEKERJAAN_AYAH,ALAMAT_AYAH,TELP_RUMAH_AYAH,TELP_HP_AYAH,
  NAMA_IBU,PEKERJAAN_IBU,ALAMAT_IBU,TELP_RUMAH_IBU,TELP_HP_IBU,
  NAMA_WALI,PEKERJAAN_WALI,ALAMAT_WALI,TELP_RUMAH_WALI,TELP_HP_WALI)
  values ('$nis','$nama_lengkap','$nama_panggilan','$alamat','$telp_rumah','$telp_hp','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$agama','$anak_ke','$status',
  '$jenis_ijazah','$tahun_ijazah','$nomor_ijazah','$catatan_lain','$aktif','$nama_ayah','$pekerjaan_ayah','$alamat_ayah','$telp_rumah_ayah','$telp_hp_ayah',
  '$nama_ibu','$pekerjaan_ibu','$alamat_ibu','$telp_rumah_ibu','$telp_hp_ibu,
  '$nama_wali','$pekerjaan_wali','$alamat_wali','$telp_rumah_wali','$telp_hp_wali')";
 */
$strsql = "insert into siswa (NIS,NAMA_LENGKAP,NAMA_PANGGILAN,ALAMAT,TELP_RUMAH,TELP_HP,TEMPAT_LAHIR,TGL_LAHIR,SEX,AGAMA,ANAK_KE,STATUS,
JENIS_IJAZAH,TAHUN_IJAZAH,NOMOR_IJAZAH,CATATAN_LAIN,AKTIF,NAMA_AYAH,PEKERJAAN_AYAH,ALAMAT_AYAH,TELP_RUMAH_AYAH,TELP_HP_AYAH,
NAMA_IBU,PEKERJAAN_IBU,ALAMAT_IBU,TELP_RUMAH_IBU,TELP_HP_IBU,NAMA_WALI,PEKERJAAN_WALI,ALAMAT_WALI,TELP_RUMAH_WALI,TELP_HP_WALI,FOTO) 
values ('$nis','$nama_lengkap','$nama_panggilan','$alamat','$telp_rumah','$telp_hp','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$agama','$anak_ke','$status',
'$jenis_ijazah','$tahun_ijazah','$nomor_ijazah','$catatan_lain','$aktif','$nama_ayah','$pekerjaan_ayah','$alamat_ayah','$telp_rumah_ayah','$telp_hp_ayah',
'$nama_ibu','$pekerjaan_ibu','$alamat_ibu','$telp_rumah_ibu','$telp_hp_ibu','$nama_wali','$pekerjaan_wali','$alamat_wali','$telp_rumah_wali','$telp_hp_wali','$fileName')";

if (empty($nis)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NIS'); document.location.href='data_siswa.php?act=tambah&nis=$nis&nama_lengkap=$nama_lengkap&nama_panggilan=$nama_panggilan&alamat=$alamat&telp_rumah=$telp_rumah&telp_hp=$telp_hp&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&jenis_kelamin=$jenis_kelamin&anak_ke=$anak_ke&tahun_ijazah=$tahun_ijazah&nomor_ijazah=$nomor_ijazah&catatan_lain=$catatan_lain&nama_ayah=$nama_ayah&alamat_ayah=$alamat_ayah&telp_rumah_ayah=$telp_rumah_ayah&telp_hp_ayah=$telp_hp_ayah&nama_ibu=$nama_ibu&alamat_ibu=$alamat_ibu&telp_hp_ibu=$telp_hp_ibu&telp_rumah_ibu=$telp_rumah_ibu&nama_wali=$nama_wali&alamat_wali=$alamat_wali&telp_rumah_wali=$telp_rumah_wali&telp_hp_wali=$telp_hp_wali&tahun=$tahun&bulan=$bulan&tgl=$tgl';</script>\n";
    exit();
} elseif (empty($nama_lengkap)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA'); document.location.href='data_siswa.php?act=tambah&nis=$nis&nama_lengkap=$nama_lengkap&nama_panggilan=$nama_panggilan&alamat=$alamat&telp_rumah=$telp_rumah&telp_hp=$telp_hp&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&jenis_kelamin=$jenis_kelamin&anak_ke=$anak_ke&tahun_ijazah=$tahun_ijazah&nomor_ijazah=$nomor_ijazah&catatan_lain=$catatan_lain&nama_ayah=$nama_ayah&alamat_ayah=$alamat_ayah&telp_rumah_ayah=$telp_rumah_ayah&telp_hp_ayah=$telp_hp_ayah&nama_ibu=$nama_ibu&alamat_ibu=$alamat_ibu&telp_hp_ibu=$telp_hp_ibu&telp_rumah_ibu=$telp_rumah_ibu&nama_wali=$nama_wali&alamat_wali=$alamat_wali&telp_rumah_wali=$telp_rumah_wali&telp_hp_wali=$telp_hp_wali&tahun=$tahun&bulan=$bulan&tgl=$tgl';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile);
}

if ($hasil) {
    echo "<script>alert('DATA SISWA BARU BERHASIL DITAMBAH'); document.location.href='data_siswa.php';</script>\n";
//    header("location:data_siswa.php?act=tambah");
} else {
    echo "<script>alert('NIS SUDAH ADA. SILAHKAN MENGGUNAKAN NIS LAIN'); document.location.href='data_siswa.php?act=tambah&nis=$nis&nama_lengkap=$nama_lengkap&nama_panggilan=$nama_panggilan&alamat=$alamat&telp_rumah=$telp_rumah&telp_hp=$telp_hp&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&jenis_kelamin=$jenis_kelamin&anak_ke=$anak_ke&tahun_ijazah=$tahun_ijazah&nomor_ijazah=$nomor_ijazah&catatan_lain=$catatan_lain&nama_ayah=$nama_ayah&alamat_ayah=$alamat_ayah&telp_rumah_ayah=$telp_rumah_ayah&telp_hp_ayah=$telp_hp_ayah&nama_ibu=$nama_ibu&alamat_ibu=$alamat_ibu&telp_hp_ibu=$telp_hp_ibu&telp_rumah_ibu=$telp_rumah_ibu&nama_wali=$nama_wali&alamat_wali=$alamat_wali&telp_rumah_wali=$telp_rumah_wali&telp_hp_wali=$telp_hp_wali&tahun=$tahun&bulan=$bulan&tgl=$tgl';</script>\n";
    exit();
}
?>