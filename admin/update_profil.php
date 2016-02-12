<?php

include "../global/cek_session_admin.php";
//include file koneksi databasse
//include "../global/config.php";
$id = $_REQUEST['id'];
$nama = $_REQUEST['nama'];
$status = $_REQUEST['status'];
$nss = $_REQUEST['nss'];
$nds = $_REQUEST['nds'];
$alamat = $_REQUEST['alamat'];
$kecamatan = $_REQUEST['kecamatan'];
$kabupaten = $_REQUEST['kabupaten'];
$propinsi = $_REQUEST['propinsi'];
$website = $_REQUEST['website'];
$email = $_REQUEST['email'];
$about = $_REQUEST['about'];

$strsql = "update profil set NAMA='$nama',STATUS='$status',NSS='$nss',NDS='$nds',ALAMAT='$alamat',KECAMATAN='$kecamatan',
KABUPATEN='$kabupaten',PROPINSI='$propinsi',WEBSITE='$website',EMAIL='$email',ABOUT='$about' where ID='$id'";

if (empty($nama)) {
    echo "<script>alert('DATA NAMA SEKOLAH TIDAK BOLEH KOSONG'); document.location.href='profil_sekolah.php?act=edit&id=$id';</script>\n";
} else {
    mysql_query($strsql);
    echo "<script>alert('DATA PROFIL SEKOLAH TELAH DIRUBAH'); document.location.href='profil_sekolah.php';</script>\n";
//    header("location:profil_sekolah.php");
}
?>
